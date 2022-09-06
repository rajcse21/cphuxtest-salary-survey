<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salary_survey', function (Blueprint $table) {
            $table->id();
            $table->timestamp('timestamp', $precision = 0);
            $table->enum('permission', ['yes', 'no']);
            $table->string('gender',20);
            $table->string('postal_code',100);
            $table->string('education');
            $table->string('edu_insti');
            $table->float('years_of_exp');
            $table->integer('emp_comm_id');
            $table->integer('emp_type_id');
            $table->integer('job_cat_id');
            $table->decimal('monthly_salary',10, 2);
            $table->integer('job_title_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('salary_survey');
    }
};
