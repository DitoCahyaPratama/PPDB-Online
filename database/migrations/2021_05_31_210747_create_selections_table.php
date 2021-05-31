<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSelectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('selections', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');
            $table->foreign('student_id')->references('id')->on('students');
            $table->unsignedBigInteger('achievement_id_1');
            $table->foreign('achievement_id_1')->references('id')->on('achievements');
            $table->unsignedBigInteger('achievement_id_2');
            $table->foreign('achievement_id_2')->references('id')->on('achievements');
            $table->unsignedBigInteger('achievement_id_3');
            $table->foreign('achievement_id_3')->references('id')->on('achievements');
            $table->unsignedBigInteger('department_id_1');
            $table->foreign('department_id_1')->references('id')->on('departments');
            $table->unsignedBigInteger('department_id_2');
            $table->foreign('department_id_2')->references('id')->on('departments');
            $table->string('status');
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
        Schema::dropIfExists('selections');
    }
}
