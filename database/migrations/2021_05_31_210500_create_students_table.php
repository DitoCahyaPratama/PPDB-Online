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
            $table->char('village_id', 10);
            $table->foreign('village_id')->references('id')->on('villages');
            $table->char('district_id', 7);
            $table->foreign('district_id')->references('id')->on('districts');
            $table->char('regency_id', 4);
            $table->foreign('regency_id')->references('id')->on('regencies');
            $table->char('province_id', 2);
            $table->foreign('province_id')->references('id')->on('provinces');
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
