<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToJobsTable extends Migration
{
    public function up()
    {
        Schema::table('jobs', function (Blueprint $table) {
            $table->unsignedBigInteger('company_id')->nullable();
            $table->foreign('company_id', 'company_fk_4285856')->references('id')->on('companies');
            $table->unsignedBigInteger('owner_id');
            $table->foreign('owner_id', 'owner_fk_4286038')->references('id')->on('users');
        });
    }
}
