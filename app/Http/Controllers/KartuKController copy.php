<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelKk;
use Illuminate\Support\Facades\Crypt;

class KartuKController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Kk = ModelKk::all();
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
        return view('pages.kartu-keluarga.create',compact('breadcrumb','user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

    public function DataWarga(){
        $breadcrumb = "Data Warga";
        $user = Auth()->User();
        return view('pages.datawarga.index',compact('breadcrumb','user'));
    }
}
