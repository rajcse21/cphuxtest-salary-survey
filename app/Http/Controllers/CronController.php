<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\ImportCsv;
use App\Models\Salarycsv;
use App\Models\importsurvey;

use Maatwebsite\Excel\Facades\Excel;
use Livewire\WithFileUploads;
class CronController extends Controller
{
    use WithFileUploads;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public $file;
    public function index(Request $request)
    {
           return view('import');
    }

    /**
     
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request)
    {        
        //Truncate table before import data
        Salarycsv::truncate();    
        
        $import = new ImportCsv();

        Excel::import($import , request()->file('file')->store('files'));

        //Excel::import($import, $request->file('file')->store('files'));
        return redirect()->back();
    }

}
