<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelLetter;
use App\Models\User;    
use App\Models\ModelPengajuan;
use Illuminate\Support\Facades\Crypt;
use PDF;

class PengajuanSuratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $breadcrumb = "Pengajuan";
        $data = Auth()->User();
        $user = User::where('users.id',$data->id)
            ->join('members_card_family','members_card_family.user_id','=','users.id')
            ->first();

        $roles = $user->getRoleNames();
        if($user->phone != null){
            if($roles['0'] == 'user'){
                $dump = ModelPengajuan::where('id_user',$data->id)->first();
                if($dump == null){
                    $pengajuan = null;
                }else{
                    $pengajuan = ModelPengajuan::where('pengajuan_surat.id_user',$data->id)
                        ->join('users','users.id','=','pengajuan_surat.id_user')
                        ->join('members_card_family','members_card_family.user_id','users.id')
                        ->join('typeletter','typeletter.id','pengajuan_surat.id_jenis_surat')
                        ->select('members_card_family.name','pengajuan_surat.status_surat','pengajuan_surat.created_at','typeletter.name as nama_surat')
                        ->get();
                }

            }else{
                $pengajuan = ModelPengajuan::join('users','users.id','=','pengajuan_surat.id_user')
                ->join('typeletter','typeletter.id','=','pengajuan_surat.id_jenis_surat')
                ->join('members_card_family','members_card_family.user_id','users.id')
                ->join('card_family','card_family.id','=','members_card_family.no_kk')
                ->join('vilages','vilages.id','=','card_family.id_desa')
                ->join('rukun_tetangga','rukun_tetangga.id','=','card_family.id_rt')
                ->select('pengajuan_surat.*','members_card_family.name','members_card_family.no_nik','typeletter.name as nama_surat','vilages.name_desa','rukun_tetangga.no_rt')
                ->get();           
            }
            return view('pages.pengajuan.index',compact('breadcrumb','user','pengajuan'));

        }else{
            return redirect()->route('profile');
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $breadcrumb = "Tambah Pengajuan";
        $user = Auth()->User();
        $jenis_surat = ModelLetter::all();
        return view('pages.pengajuan.create',compact('breadcrumb','user','jenis_surat'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'jenis_surat' => 'required',
            'keterangan' => 'required'
        ]);

        $user = Auth()->User();
        ModelPengajuan::create([
            'id_user'   => $user->id,
            'id_jenis_surat' => $request->jenis_surat,
            'pesan'     => $request->keterangan,
            'status_surat'  => 'Menunggu Persetujuan'
        ]);

        return redirect()->route('manage.pengajuan.index')->with('success','Berhasi Menambah Data');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $url = decrypt($id);
        $breadcrumb = "Verifikasi Pengajuan";
        $user = Auth()->User();
        $data = ModelPengajuan::where('pengajuan_surat.id',$url)
            ->join('users','users.id','=','pengajuan_surat.id_user')
            ->join('members_card_family','members_card_family.user_id','users.id')
            ->join('card_family','card_family.id','=','members_card_family.no_kk')
            ->join('vilages','vilages.id','=','card_family.id_desa')
            ->join('rukun_tetangga','rukun_tetangga.id','=','card_family.id_rt')
            ->select('members_card_family.name','card_family.no_kk as kk','vilages.*','rukun_tetangga.*','members_card_family.*','pengajuan_surat.*')
            ->first();
            
        $admin = ModelPengajuan::where('pengajuan_surat.id',$url)
            ->join('users','users.id','=','pengajuan_surat.id_admin')
            ->join('members_card_family','members_card_family.user_id','=','users.id')
            ->select('members_card_family.name as admin')
            ->first();

        $letter = ModelLetter::all();
        return view('pages.pengajuan.update',compact('breadcrumb','user','data','letter','admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $url = decrypt($id);
        $data = ModelPengajuan::find($url);
        $data->update([
            'id_admin'     => Auth()->User()->id,
            'status_surat' => $request->status,
        ]);

        return redirect()->route('manage.pengajuan.index')->with('success','Pengajuan Berhasil Di Verifikasi!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function CetakSurat($id){

        $url = decrypt($id);
        
        $data = ModelPengajuan::where('pengajuan_surat.id',$url)
        ->join('users','users.id','=','pengajuan_surat.id_user')
        ->join('members_card_family','members_card_family.user_id','users.id')
        ->join('card_family','card_family.id','=','members_card_family.no_kk')
        ->join('vilages','vilages.id','=','card_family.id_desa')
        ->join('rukun_tetangga','rukun_tetangga.id','=','card_family.id_rt')
        ->join('typeletter','typeletter.id','=','pengajuan_surat.id_jenis_surat')
        ->select('members_card_family.*','typeletter.name as jenis_surat','pengajuan_surat.created_at as dibuat','card_family.alamat_kk','pengajuan_surat.pesan')
        ->first();
        
        $admin = ModelPengajuan::where('pengajuan_surat.id',$url)
        ->join('users','users.id','=','pengajuan_surat.id_admin')
        ->join('members_card_family','members_card_family.user_id','users.id')
        ->join('card_family','card_family.id','=','members_card_family.no_kk')
        ->join('vilages','vilages.id','=','card_family.id_desa')
        ->join('rukun_tetangga','rukun_tetangga.id','=','card_family.id_rt')
        ->select('members_card_family.name as admin','rukun_tetangga.no_rt','vilages.name_desa','users.digital_signature as signature')
        ->first();

        // return view('surat_pengantar',compact('data','admin'));
        $pdf = PDF::loadView('surat_pengantar', compact('data','admin'));
        $pdf->setPaper('A4');

        return $pdf->stream('surat_pengantar.pdf');

        // return view('P/')
    }
}
