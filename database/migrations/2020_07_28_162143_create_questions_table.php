<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->integer('course_id')->unsigned();
            $table->string('title');
            $table->string('slug');
            $table->text('content');
            $table->integer('published')->default('1')->unsigned()->nullable();
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
        Schema::dropIfExists('questions');
    }
}
