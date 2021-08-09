<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookreturnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookreturns', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('book_Id');
            $table->foreign('book_Id')->references('id')->on('books');
            $table->unsignedBigInteger('issuedBy_Id');
            $table->foreign('issued_ById')->references('id')->on('students'); 
            $table->unsignedBigInteger('user_Id');
            $table->foreign('user_Id')->references('id')->on('users'); 
            $table->string('staffDetail');
             $table->date('issuesFrom');
            $table->date('issuedTo');
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
        Schema::dropIfExists('bookreturns');
    }
}
