<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSelectionAchievements extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('selection_achievements', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('achievement_id_1');
            $table->foreign('achievement_id_1')->references('id')->on('achievements');
            $table->unsignedBigInteger('achievement_id_2');
            $table->foreign('achievement_id_2')->references('id')->on('achievements');
            $table->unsignedBigInteger('achievement_id_3');
            $table->foreign('achievement_id_3')->references('id')->on('achievements');
            $table->unsignedBigInteger('department_id');
            $table->foreign('department_id')->references('id')->on('departments');
            // $table->unsignedBigInteger('department_id_2');
            // $table->foreign('department_id_2')->references('id')->on('departments');
            $table->integer('status');
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
        Schema::dropIfExists('selection_achievements');
    }
}
