<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Salarycsv;
use App\Imports\ImportCsv;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;

class UploadForm extends Component
{
    use WithFileUploads;
    public $file;
    public function render()
    {
        return view('livewire.upload-form');
    }
    public function importdata()
    {        
        $this->validate([
            'file' => 'required|mimes:csv' 
        ]);
        //Truncate table before import data
        Salarycsv::truncate();    
        
        $import = new ImportCsv();

        Excel::import($import,$this->file->store('files'));
       
        session()->flash('message', 'File successfully Uploaded.');
        $this->file = null;
       // return redirect()->back();
    }
}
