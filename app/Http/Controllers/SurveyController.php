<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Salarycsv;

class SurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $survey = Salarycsv::all();

        return view('welcome', compact('survey'));
    }

    public function importcsv()
    {
        return view('import');
    }

}
