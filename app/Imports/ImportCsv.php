<?php

namespace App\Imports;

use Carbon\Carbon;
use DateTimeImmutable;
use DateTime;
use App\Models\Salarycsv;
use App\Models\Empcommitment;
use App\Models\Emptype;
use App\Models\Jobcategory;
use App\Models\Jobtitle;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class ImportCsv implements ToModel, WithStartRow
{
    public function startRow(): int
    {
        return 2;
    }

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {      
        if($row[10]==''){
            return [];
        }        
        //Convert Datetime Format
        $d = DateTime::createFromFormat('d/m/Y H:i:s', $row[0]);
         $survey_timestamp=$d->format('Y-m-d H:i:s');
        $salary_survey_data=[
        'timestamp' => $survey_timestamp,
        'permission' => $row[1],
        'gender' => $row[2],
        'postal_code' => $row[3],
        'education' => $row[4],
        'edu_insti' => $row[5],            
        'years_of_exp' => $row[6],
        'emp_comm_id'=>$this->check_emp_commitment($row[7]),
        'emp_type_id'=>$this->check_emp_type($row[8]),
        'job_cat_id'=>$this->check_job_cat($row[9]),
        'monthly_salary'=>$row[10], 
        'job_title_id'=>$this->check_job_title($row[11]),
       ];
      
        $salary_survey=new Salarycsv($salary_survey_data);
        
        return $salary_survey;
    }

    //Check Employement Commitment Record
    function check_emp_commitment($emp_commitment){     
        if($emp_commitment==='' || is_null($emp_commitment)){
            return 0;
    }
        
        $emp_comm_record =  Empcommitment::where('emp_commitment',$emp_commitment)->first();   
        if($emp_comm_record){
            return $emp_comm_record->id;
        }
        //Add new record
        $emp_commit_data = new Empcommitment; 
        $emp_commit_data->emp_commitment = $emp_commitment;
        $emp_commit_data->emp_commitment_alias = strtolower(str_replace(' ','-',$emp_commitment)); 
        if(!is_null($emp_commit_data->emp_commitment))
        {
        return $emp_commit_data->save();
        }
    }

    //Check Employement type Record
    function check_emp_type($emp_type){  
        
        if($emp_type==='' || is_null($emp_type)){
                return 0;
        }
                
        $emp_type_record =  Emptype::where('emp_type',$emp_type)->first();   
       
        if($emp_type_record || !is_null($emp_type_record)){
            return $emp_type_record->id;
        }
                  
        //Add new record
        $emp_type_data = new Emptype; 
        $emp_type_data->emp_type = $emp_type;
        $emp_type_data->emp_type_alias = strtolower(str_replace(' ','-',$emp_type)); 
        
       if(!is_null($emp_type_data->emp_type))
        {
            return $emp_type_data->save();
        }       
    }

     //Check Job Category Record
     function check_job_cat($job_cat){     
        if($job_cat==='' || is_null($job_cat)){
            return 0;
    }   
        
        $job_cat_record =  Jobcategory::where('job_cat_name',$job_cat)->first();   
        if($job_cat_record){
            return $job_cat_record->id;
        }
        
        //Add new record
        $job_cat_data = new Jobcategory; 
        $job_cat_data->job_cat_name = $job_cat;
        $job_cat_data->job_cat_alias = strtolower(str_replace(' ','-',$job_cat)); 
       
        if(!is_null($job_cat_data->job_cat_name))
        {        
        return $job_cat_data->save();
        }
    }

    //Check Job Title Record
    function check_job_title($job_titledt){ 
        
        if($job_titledt==='' || is_null($job_titledt)){
            return 0;
        }
        //Special case
        $job_title=$job_titledt;
        $job_title_arr=explode(' - ',$job_titledt);
        if(isset($job_title_arr[0]) && $job_title_arr[0]!=''){
            $job_title=$job_title_arr[0];
        }
            
        $job_title_record =  Jobtitle::where('job_title',$job_title)->first();   
        if($job_title_record){
            return $job_title_record->id;
        }
        //Add new record
        $job_title_data = new Jobtitle; 
        $job_title_data->job_title = $job_title;
        $job_title_data->job_title_alias = strtolower(str_replace(' ','-',$job_title)); 
        if(!is_null($job_title_data->job_title))
        {
        return $job_title_data->save();
        }
    }
}
