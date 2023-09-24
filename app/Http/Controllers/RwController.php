<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelRw;

class RwController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Rws =ModelRw::all();

        $let =ModelRw::first();
        $breadcrumb = "Data Rukun Warga";
        $title = "APP";
        $user = Auth()->User();
        return view('pages.Datarw.index',compact('breadcrumb','user','Rws','let'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $breadcrumb = "Tambah Data RW";
        $user = Auth()->User();
        return view('pages.Datarw.create',compact('breadcrumb','user'));
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
            'no_rw' => 'required|numeric'
        ]);

        $user = Auth()->User();
        ModelRw::create([
            'no_rw' => $request->no_rw
        ]);

        return redirect()->route('manage.data-rw.index')->with('success','Berhasi Menambah Data');
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
        $breadcrumb = "Update No RW";
        $user = Auth()->User();
        $data = ModelRw::find($url);
        //dd($data);
        return view('pages.Datarw.update',compact('breadcrumb','user','data')); 
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
        $data = ModelRw::find($url);

        $request->validate([
            'no_rw' => 'required|numeric'
        ]);
        $data->update([
            'no_rw' => $request->no_rw,
        ]);
        return redirect()->route('manage.data-rt.index')->with('success','Data Berhasil Diupdate');
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
        $data = ModelRw::find($url);

        $data->delete();
        
        return redirect()->route('manage.data-rt.index')->with('success','Data Berhasil Dihapus');
    }
}
