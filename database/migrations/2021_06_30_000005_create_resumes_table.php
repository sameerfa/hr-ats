<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResumesTable extends Migration
{
    public function up()
    {
        Schema::create('resumes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('name');
            $table->longText('address')->nullable();
            $table->string('city');
            $table->string('mobile');
            $table->string('email');
            $table->string('experience');
            $table->string('education');
            $table->string('skills')->nullable();
            $table->string('current_employer')->nullable();
            $table->string('current_position')->nullable();
            $table->string('status');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
