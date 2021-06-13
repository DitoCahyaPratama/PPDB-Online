<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    // use HasFactory;
    protected $table='students';
    protected $fillable = [
        'name',
        'address',
        'nik',
        'place_born',
        'date_born',
        'gender',
        'user_id',
        'religion_id',
        'village_id ',
        'district_id',
        'regency_id',
        'province_id',
        'phone_number',
        'photo',
    ];
}
