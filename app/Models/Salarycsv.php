<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salarycsv extends Model
{
    use HasFactory;

     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'salary_survey';

    protected $fillable = ['timestamp','permission','gender','postal_code','education','edu_insti','years_of_exp','emp_comm_id','emp_type_id','job_cat_id','monthly_salary','job_title_id'];
}
