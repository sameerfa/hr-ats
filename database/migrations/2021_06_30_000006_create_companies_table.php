<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('company_name');
            $table->longText('address')->nullable();
            $table->string('city');
            $table->string('contact_name');
            $table->string('contact_email');
            $table->string('contact_mobile');
            $table->string('contact_designation')->nullable();
            $table->string('company_website')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
