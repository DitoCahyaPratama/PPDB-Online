<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    // use HasFactory;
    protected $table='students';
    protected $fillable = [
        'nisn',
        'name',
        'email',
        'address',
        'nik',
        'place_born',
        'date_born',
        'gender',
        'user_id',
        'religion_id',
        'village_id',
        'district_id',
        'regency_id',
        'province_id',
        'phone_number',
        'photo',
    ];

    public function regencies()
    {
        return $this->hasOne(SchoolOrigin::class);
    }

    public function selectionAchievement()
    {
        return $this->hasOne(SelectionAchievement::class);
    }

    public function selectionReport()
    {
        return $this->hasOne(SelectionReport::class);
    }
}
