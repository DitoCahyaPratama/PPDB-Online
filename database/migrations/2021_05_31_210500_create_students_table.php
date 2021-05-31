<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('address');
            $table->string('nik');
            $table->string('place_born');
            $table->string('date_born');
            $table->enum('gender',['laki-laki', 'perempuan']);
            $table->unsignedBigInteger('religion_id');
            $table->foreign('religion_id')->references('id')->on('religions');
            $table->unsignedBigInteger('village_id');
            $table->foreign('village_id')->references('id')->on('villages');
            $table->unsignedBigInteger('district_id');
            $table->foreign('district_id')->references('id')->on('districts');
            $table->unsignedBigInteger('regency_id');
            $table->foreign('regency_id')->references('id')->on('regencies');
            $table->unsignedBigInteger('province_id');
            $table->foreign('province_id')->references('id')->on('provincies');
            $table->string('phone_number');
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
        Schema::dropIfExists('students');
    }
}
