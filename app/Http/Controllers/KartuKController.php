<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelKk;
use App\Models\ModelRt;
use Illuminate\Support\Facades\Crypt;
use App\Models\ModelDesa;
use App\Models\ModelRw;
use App\Models\ModelFamily;
use Illuminate\Support\Facades\Validator;
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
            ->join('rukun_warga','rukun_warga.id','=','card_family.id_rw')
            ->select('card_family.*','vilages.name_desa','rukun_warga.no_rw','rukun_tetangga.no_rt')
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
        $rw = ModelRw::all();
        $desa = ModelDesa::all();
        return view('pages.kartu-keluarga.create',compact('breadcrumb','user','rt','desa','rw'));
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
            'id_rw'     => $request->rw,
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
        $data = ModelKk::find($url);

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
                    ->join('rukun_warga','rukun_warga.id','=','card_family.id_rw')
                    ->select('members_card_family.name','members_card_family.no_nik as nik','users.created_at as dibuat','vilages.name_desa','rukun_tetangga.no_rt','rukun_warga.no_rw','users.phone' , 'members_card_family.user_id')
                    ->get();
            // dd($data);
        }else{

             $data = ModelFamily::join('card_family','card_family.id','members_card_family.no_kk')
                ->join('rukun_tetangga','rukun_tetangga.id','=','card_family.id_rt')
                ->join('rukun_warga','rukun_warga.id','=','card_family.id_rw')
                ->join('vilages','vilages.id','=','card_family.id_desa')
                ->select('members_card_family.name','members_card_family.id as id_nik','members_card_family.no_nik as nik','members_card_family.created_at as dibuat','vilages.name_desa','rukun_tetangga.no_rt','rukun_warga.no_rw', 'members_card_family.user_id')
                ->get();
                           
        }

        return view('pages.datawarga.index',compact('breadcrumb','user','data'));
    }

    public function WargaCreate(){
        $breadcrumb = "Create Warga";
        $no_kk = ModelkK::all();

        return view('pages.datawarga.create',compact('breadcrumb','no_kk'));
    }

    public function wargastore(Request $request){
        $validator = $request->validate([
            'id_kk' => 'required',
            'no_nik' => 'required|max:16',
            'name' => 'required|string',
            'agama' => 'required|string',
            'birt_place' => 'required|string',
            'birth_day' => 'required|date',
            'jenis_kelamin' => 'required|string',
            'pendidikan' => 'required|string',
            'pekerjaan' => 'required|string',
            'status' => 'required|string',
        ]);

        $family = ModelFamily::create([
            'no_kk' => $request->input('id_kk'),
            'no_nik' => $request->input('no_nik'),
            'name' => $request->input('name'),
            'agama' => $request->input('agama'),
            'tempat_lahir' => $request->input('birt_place'),
            'tanggal_lahir' => $request->input('birth_day'),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
            'pendidikan' => $request->input('pendidikan'),
            'pekerjaan' => $request->input('pekerjaan'),
            'status' => $request->input('status'),
        ]);

        // Redirect to a success page or wherever you need
        return redirect()->route('manage.data.warga')->with('success', 'Data saved successfully!');

    }

    public function wargaedit($id){
        $url = decrypt($id);

        $data = ModelFamily::find($url);
        $no_kk = ModelKk::all();
        $breadcrumb = "Update Data Warga";

        return view('pages.datawarga.update',compact('breadcrumb','data','no_kk'));
    }

    public function wargaupdate(Request $request,$id){

        $validator = $request->validate([
            'id_kk' => 'required',
            'name' => 'required|string',
            'agama' => 'required|string',
            'pendidikan' => 'required|string',
            'pekerjaan' => 'required|string',
            'status' => 'required|string',
        ]);

        $url = decrypt($id);

        $family= ModelFamily::find($url);
        $family->update([
            'no_kk' => $request->input('id_kk'),
            'name'  =>$request->input('name'),
            'agama' => $request->input('agama'),
            'pendidikan' => $request->input('pendidikan'),
            'pekerjaan' => $request->input('pekerjaan'),
            'status' => $request->input('status'),
        ]);

        return redirect()->route('manage.data.warga')->with('success', 'Data saved successfully!');

    }
}
