<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lessons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('course_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->string('title')->nullable()->unique();
            $table->string('slug')->nullable()->unique();
            $table->string('video_episode')->nullable();
            $table->integer('section_id')->nullable()->unsigned();
            $table->string('section_title');
            $table->boolean('free_episode')->default('0');
            $table->boolean('published')->default('1');
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
        Schema::dropIfExists('lessons');
    }
}
