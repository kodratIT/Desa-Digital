<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

use App\Imports\ImportMembersController;

class ImportController extends Controller
{
    public function index(){
        $breadcrumb="Import Excel";

        return view('pages.datawarga.import',compact('breadcrumb'));
    }

    public function store(Request $request){
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        try {
            $file = $request->file('file');

            // Read the Excel file and import data
            Excel::import(new ImportMembersController, $file);

            return redirect()->route('manage.data.warga')->with('success', 'Data imported successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error importing data: ' . $e->getMessage());
        }
    }
}
