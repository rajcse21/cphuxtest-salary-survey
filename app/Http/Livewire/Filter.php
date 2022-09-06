<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Salarycsv;


class Filter extends Component
{
    use WithPagination;
    public $years_of_exp;
    public $total_record=10;

    
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        
        $years_of_exp_dd=Salarycsv::select('years_of_exp')
        ->distinct()
        ->orderBy('years_of_exp','ASC')
        ->get();
        
        $survey_report=Salarycsv::where(function($subquery){
           
            if($this->years_of_exp=='0'){
                $subquery->where('years_of_exp',"0"); 
            }else if(!empty($this->years_of_exp)){   
                $subquery->where('years_of_exp',"{$this->years_of_exp}");                   
                }
    })
    ->join('emp_commitment', 'emp_commitment.id', '=', 'salary_survey.emp_comm_id')
    ->join('emp_type', 'emp_type.id', '=', 'salary_survey.emp_type_id')
    ->join('job_cat', 'job_cat.id', '=', 'salary_survey.job_cat_id')
    ->join('job_title', 'job_title.id', '=', 'salary_survey.job_title_id')
    ->orderBy('salary_survey.created_at', 'desc')
    ->select(['salary_survey.*', 'emp_commitment.emp_commitment','emp_type.emp_type','job_title.job_title','job_cat.job_cat_name'])
    ->paginate($this->total_record);

    if($this->total_record< $survey_report->total()){
        $this->resetPage();
    }
                 
        return view('livewire.filter',[
            'survey_data'=>$survey_report,'years_of_exp_dd'=>$years_of_exp_dd      
        ]);
    }
}
