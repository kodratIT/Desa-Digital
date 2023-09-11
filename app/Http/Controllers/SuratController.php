<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelLetter;
use Illuminate\Support\Facades\Crypt;
class SuratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $latters = ModelLetter::join('users','users.id','=','typeletter.user_id')
            ->Select('typeletter.*','users.name as username')
            ->get();

        $let = ModelLetter::first();
        $breadcrumb = "Jenis Surat";
        $title = "APP";
        $user = Auth()->User();
        return view('pages.Surat.index',compact('breadcrumb','user','latters','let'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $breadcrumb = "Tambah Jenis Surat";
        $user = Auth()->User();
        return view('pages.Surat.create',compact('breadcrumb','user'));
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

        $user = Auth()->User();
        ModelLetter::create([
            'user_id'   => $user->id,
            'name' => $request->nama
        ]);

        return redirect()->route('manage.jenis-surat.index')->with('success','Berhasi Menambah Data');
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
        $breadcrumb = "Update Jenis Surat";
        $user = Auth()->User();
        $data = ModelLetter::find($url);
        return view('pages.Surat.update',compact('breadcrumb','user','data'));   
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
        $data = ModelLetter::find($url);
        $data->update([
            'name' => $request->nama,
        ]);
        return redirect()->route('manage.jenis-surat.index')->with('success','Data Berhasil Diupdate');
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
        $data = ModelLetter::find($url);

        $data->delete();
        
        return redirect()->route('manage.jenis-surat.index')->with('success','Data Berhasil Dihapus');

    }
}
