<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfigs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configs', function (Blueprint $table) {
            $table->id();
            $table->string('name_school');
            $table->text('address_school');
            $table->date('date_registration_selection_achievement_start');
            $table->date('date_registration_selection_achievement_end');
            $table->date('date_registration_selection_report_start');
            $table->date('date_registration_selection_report_end');
            $table->date('date_announcement_start');
            $table->date('date_announcement_end');
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
        Schema::dropIfExists('configs');
    }
}
