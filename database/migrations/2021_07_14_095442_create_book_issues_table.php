<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookIssuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_issues', function (Blueprint $table) {
            $table->id();
             $table->unsignedBigInteger('bookId');
            $table->foreign('bookId')->references('id')->on('books');
            $table->unsignedBigInteger('issuedById');
            $table->foreign('issuedById')->references('id')->on('students'); 
            $table->date('issuesFrom');
            $table->date('issuedTo');
            $table->string('staffDetail');
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
        Schema::dropIfExists('book_issues');
    }
}
