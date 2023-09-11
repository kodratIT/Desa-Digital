<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelDesa;
use Illuminate\Support\Facades\Crypt;

class DesaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vilages = ModelDesa::all();
        $let = ModelDesa::first();
        $breadcrumb = "Data Desa";
        $title = "APP";
        $user = Auth()->User();
        return view('pages.datadesa.index',compact('breadcrumb','user','vilages','let'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $breadcrumb = "Tambah Desa";
        $user = Auth()->User();
        return view('pages.datadesa.create',compact('breadcrumb','user'));
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
            'nama' => 'required'
        ]);
        ModelDesa::create([
            'name_desa' => $request->nama
        ]);

        return redirect()->route('manage.data-desa.index')->with('success','Berhasi Menambah Data');
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
        $breadcrumb = "Update  Desa";
        $data = ModelDesa::find($url);
        $user = Auth()->User();
        return view('pages.datadesa.update',compact('breadcrumb','data','user'));   
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
        $data = ModelDesa::find($url);
        $data->update([
            'name_desa' => $request->nama,
        ]);
        return redirect()->route('manage.data-desa.index')->with('success','Data Berhasil Diupdate');
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
        $data = ModelDesa::find($url);

        $data->delete();
        
        return redirect()->route('manage.data-desa.index')->with('success','Data Berhasil Dihapus');
    }
}
