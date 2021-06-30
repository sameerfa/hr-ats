<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToInterviewsTable extends Migration
{
    public function up()
    {
        Schema::table('interviews', function (Blueprint $table) {
            $table->unsignedBigInteger('job_id');
            $table->foreign('job_id', 'job_fk_4285868')->references('id')->on('jobs');
            $table->unsignedBigInteger('resume_id');
            $table->foreign('resume_id', 'resume_fk_4285869')->references('id')->on('resumes');
            $table->unsignedBigInteger('owner_id');
            $table->foreign('owner_id', 'owner_fk_4286039')->references('id')->on('users');
        });
    }
}
