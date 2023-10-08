<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelLaporan;
use App\Models\User;  
use Illuminate\Support\Facades\Crypt;


class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $breadcrumb = "Laporan";
        $users = Auth()->User();
        // qeury ambil user
        $user = User::where('users.id',$users->id)
            ->join('members_card_family','members_card_family.user_id','users.id')
            ->join('card_family','card_family.id','members_card_family.no_kk')
            ->select('users.*','members_card_family.name','card_family.id_rt','card_family.id_desa')
            ->first();

            // dd($user);

        $role = $users->getRoleNames();
        if($users->phone != null){
            if($role[0] == 'admin'){
                // ambil data laporan untuk admin
                $data = ModelLaporan::join('members_card_family', 'members_card_family.user_id', '=', 'laporan_warga.id_user')
                    ->join('card_family','card_family.id','members_card_family.no_kk')
                    ->where('card_family.id_desa',$user->id_desa)
                    ->where('card_family.id_rt',$user->id_rt)
                    ->select('members_card_family.name','members_card_family.no_nik','laporan_warga.*','card_family.id_rt','card_family.id_desa')
                    ->get();
      
                return view('pages.Laporan.index',compact('breadcrumb','user','data'));   
            }elseif($role[0] == 'supe-admin'){
                // ambil data laporan untuk super admin
                $data = ModelLaporan::join('members_card_family', 'members_card_family.user_id', '=', 'laporan_warga.id_user')
                    ->join('card_family','card_family.id','members_card_family.no_kk')
                    ->select('members_card_family.name','members_card_family.no_nik','laporan_warga.*','card_family.id_rt','card_family.id_desa')
                    ->get();
                
                return view('pages.Laporan.index',compact('breadcrumb','user','data'));   
            }else{
                // ambil data laporan untuk user
                $data = ModelLaporan::where('id_user',$user->id)
                    ->join('members_card_family','members_card_family.user_id','=','laporan_warga.id_user')
                    ->select('members_card_family.name','members_card_family.no_nik','laporan_warga.*')
                    ->get();
                return view('pages.Laporan.index',compact('breadcrumb','user','data'));   
            }
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
        $breadcrumb = 'Buat Laporan';
        return view('pages.Laporan.create',compact('breadcrumb'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth()->User();
        $data = $request->validate([
            'title' => 'required|min:5|max:100',
            'pesan' => 'required|min:5|max:254',
            'bukti' =>'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
      
        $gambar = $request->file('bukti');
        $namaFile = 'bukti_laporan_'.time() . '.' . $gambar->getClientOriginalExtension();
        // dd($namaFile);
        $gambar->move(public_path('uploads'), $namaFile);

        ModelLaporan::create([
            'id_user'   => $user->id,
            'title'     => $request->title,
            'bukti'     => $namaFile,
            'pesan'     => $request->pesan
        ]);      

        return redirect()->route('manage.laporan.index')->with('success','Berhasil Membuat Laporan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $url = decrypt($id);
        $data = ModelLaporan::find($url);
        $breadcrumb = 'Detail';
        return view('pages.laporan.show',compact('breadcrumb','data'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
}
