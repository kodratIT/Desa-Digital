<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelKk;
use App\Models\ModelRt;
use Illuminate\Support\Facades\Crypt;
use App\Models\ModelDesa;
use App\Models\ModelFamily;

class KartuKController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Kk = ModelKk::join('rukun_tetangga','rukun_tetangga.id','=','card_family.id_rt')
            ->join('vilages','vilages.id','=','card_family.id_desa')
            ->get();
        $let = ModelKk::first();
        $breadcrumb = "Kartu Keluarga";
        $user = Auth()->User();
        return view('pages.Kartu-keluarga.index',compact('breadcrumb','user','Kk','let'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $breadcrumb = "Tambah Kartu Keluarga";
        $user = Auth()->User();
        $rt = ModelRt::all();
        $desa = ModelDesa::all();
        return view('pages.kartu-keluarga.create',compact('breadcrumb','user','rt','desa'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = ModelKk::where('no_kk',$request->no_kk)->first();
        if($data == null){

            $request->validate([
                'no_kk' => 'required|numeric|min:16',
                'alamat'    => 'required|max:254'
            ]);

        ModelKk::create([
            'id_rt'     => $request->rt,
            'id_desa'     => $request->desa,
            'no_kk'   => $request->no_kk,
            'alamat_kk' => $request->alamat
        ]);
            return redirect()->route('manage.kartukeluarga.index')->with('success','Berhasi Menambah Data');
        }else{
            return redirect()->route('manage.kartukeluarga.create')->with('error','No KK sudah Terdaftar');
        }

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
        
        $url = Decrypt($id);
        $breadcrumb = "Update Data KK";
        $user = Auth()->User();
        $data = ModelKk::where('no_kk',$url)->first();
        $rt = ModelRt::all();
        $desa = ModelDesa::all();
        return view('pages.kartu-keluarga.update',compact('breadcrumb','user','data','rt','desa')); 
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
        $url = Decrypt($id);
        $data = ModelKk::where('no_kk',$url)->first();
        
        $i= null;

        if($request->no_kk != $url){
            $i = ModelKk::where('no_kk',$request->no_kk)->first();
            if($i != null){
                return back()->with('error','No KK sudah Terdafar');
            }else{
                $data->update([
                    'no_kk'     => $request->no_kk,
                    'alamat_kk' => $request->alamat,
                    'id_rt'     => $request->rt,
                    'id_desa'     => $request->desa,
                ]);
            }
        }else{
            $data->update([
                'no_kk'     => $request->no_kk,
                'alamat_kk' => $request->alamat,
                'id_rt'     => $request->rt,
                'id_desa'     => $request->desa,
            ]);
        }
        
        return redirect()->route('manage.kartukeluarga.index')->with('success','Data Berhasil Diupdate');
       
    } 

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $url = Decrypt($id);
        $data = ModelKk::where('no_kk',$url);

        $data->delete();
        
        return redirect()->route('manage.kartukeluarga.index')->with('success','Data Berhasil Dihapus');
    }

    public function DataWarga(){
        $breadcrumb = "Data Warga";
        $user = Auth()->User();
        $roles = $user->getRoleNames();
        $data = null;
        if($roles[0] == 'admin'){
            $dump = ModelFamily::where('members_card_family.user_id',$user->id)
                    ->join('card_family','card_family.id','=','members_card_family.no_kk')
                    ->join('rukun_tetangga','rukun_tetangga.id','=','card_family.id_rt')
                    ->join('vilages','vilages.id','=','card_family.id_desa')
                    ->select('rukun_tetangga.Id as no_rt','vilages.id')
                    ->first();
                    
            $data = ModelKk::where('card_family.id_rt',$dump->no_rt,true)
                    ->where('card_family.id_desa',$dump->id,true)
                    ->join('rukun_tetangga','rukun_tetangga.id','=','card_family.id_rt')
                    ->join('vilages','vilages.id','=','card_family.id_desa')
                    ->join('members_card_family','members_card_family.id','card_family.id')
                    ->join('users','users.id','=','members_card_family.user_id')
                    ->select('users.name','users.nik','users.created_at as dibuat','vilages.name_desa','rukun_tetangga.no_rt')
                    ->get();
            // dd($data);
        }else{
            
        }

        return view('pages.datawarga.index',compact('breadcrumb','user','data'));
    }
}
