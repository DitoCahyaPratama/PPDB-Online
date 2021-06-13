<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    // use HasFactory;
    protected $table='configs';
    protected $fillable = [
        'name_school',
        'address_school',
        'date_registration_selection_health_start',
        'date_registration_selection_health_end',
        'date_registration_selection_achievement_start',
        'date_registration_selection_achievement_end',
        'date_registration_selection_report_start',
        'date_registration_selection_report_end',
        'date_announcement_achievement_start',
        'date_announcement_achievement_end',
        'date_announcement_report_start',
        'date_announcement_report_end',
    ];
}
