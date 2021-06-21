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
            $table->char('nisn', 10);
            $table->string('name');
            $table->string('email')->unique();
            $table->text('address');
            $table->string('nik');
            $table->string('place_born');
            $table->date('date_born');
            $table->enum('gender',['L', 'P']);
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
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
            $table->string('photo')->nullable();
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
