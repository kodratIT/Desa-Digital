<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelFamily;
use App\Models\ModelWebgisPbb;
use Illuminate\Support\Facades\File;
use App\Models\User;

class WebGisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $breadcrumb = "WEB GIS";
        $niks = ModelFamily::select('members_card_family.id','members_card_family.no_nik','members_card_family.name')
            ->get();

        $role = Auth()->User()->getRoleNames()->first();
    
        return view('pages.WebGis.index',compact('breadcrumb','niks','role'));
    }

    public function json(){

        $user = Auth()->User();
        $roles = $user->getRoleNames();

        if($roles[0] == 'user'){
            $dump = User::where('users.id',$user->id)
                ->join('members_card_family','members_card_family.id','=','users.id')
                ->select('members_card_family.id as id_kk')
                ->first();

            $result = ModelWebgisPbb::join('members_card_family','members_card_family.id','webgis_pbb.id_nik')
            ->where('members_card_family.id',$dump->id_kk)
            ->select('members_card_family.name','members_card_family.no_nik','webgis_pbb.*')
            ->get();
            return json_encode($result);
        }else{
            $result = ModelWebgisPbb::join('members_card_family','members_card_family.id','webgis_pbb.id_nik')
            ->select('members_card_family.name','members_card_family.no_nik','webgis_pbb.*')
            ->get();
            return json_encode($result);
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $geoJSON = $request->geojsondata;
        // Generate nama file dengan timestamp
        $timestamp = time();
        $fileName = "geojson_$timestamp.geojson";
        $file_path = public_path('geojson/' . $fileName);

        // Simpan GeoJSON ke file
        File::put($file_path, $geoJSON);

        ModelWebgisPbb::create([
            'id_nik'    => $request->no_nik,
            'no_sertifikat' => $request->sertifikat,
            'luas_tanah'    => $request->luas,
            'tahun_terbit'  => $request->tahun,
            'status'        => $request->status,
            'geojson'       => $fileName,
        ]);

        return to_route('manage.webgis.index');
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data = ModelWebgisPbb::find($request->id);
        $data->update([
            'status' => $request->status,
        ]); 

        return redirect()->route('manage.webgis.index')->with('success', 'Data saved successfully!');

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
