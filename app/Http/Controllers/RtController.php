<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelRt;
use Illuminate\Support\Facades\Crypt;

class RtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Rts = ModelRt::all();

        $let = ModelRt::first();
        $breadcrumb = "Data Rukun Tetangga";
        $title = "APP";
        $user = Auth()->User();
        return view('pages.Datart.index',compact('breadcrumb','user','Rts','let'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $breadcrumb = "Tambah Data RT";
        $user = Auth()->User();
        return view('pages.Datart.create',compact('breadcrumb','user'));
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
            'no_rt' => 'required|numeric'
        ]);

        $user = Auth()->User();
        ModelRt::create([
            'no_rt' => $request->no_rt
        ]);

        return redirect()->route('manage.data-rt.index')->with('success','Berhasi Menambah Data');
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
        $breadcrumb = "Update No RT";
        $user = Auth()->User();
        $data = ModelRt::find($url);
        return view('pages.Datart.update',compact('breadcrumb','user','data'));   
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
        $url = Decrypt($id);
        $data = ModelRt::find($url);

        $request->validate([
            'no_rt' => 'required|numeric'
        ]);
        $data->update([
            'no_rt' => $request->no_rt,
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
        $data = ModelRt::find($url);

        $data->delete();
        
        return redirect()->route('manage.data-rt.index')->with('success','Data Berhasil Dihapus');

    }
}
