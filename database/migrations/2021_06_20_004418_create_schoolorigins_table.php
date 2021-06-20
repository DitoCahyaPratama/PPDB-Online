<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchooloriginsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schoolorigins', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade')->onUpdate('cascade');
            $table->string('name');
            $table->string('address');
            $table->integer('graduation_year');
            $table->char('village_id', 10);
            $table->foreign('village_id')->references('id')->on('villages');
            $table->char('district_id', 7);
            $table->foreign('district_id')->references('id')->on('districts');
            $table->char('regency_id', 4);
            $table->foreign('regency_id')->references('id')->on('regencies');
            $table->char('province_id', 2);
            $table->foreign('province_id')->references('id')->on('provinces');
            $table->string('type');
            $table->string('photo');
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
        Schema::dropIfExists('schoolorigins');
    }
}
