<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('job_title');
            $table->string('expected_experience');
            $table->decimal('ctc', 15, 2);
            $table->string('city');
            $table->longText('job_description');
            $table->longText('responsibilities');
            $table->longText('skills');
            $table->string('priority');
            $table->string('status');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
