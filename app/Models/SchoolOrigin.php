<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolOrigin extends Model
{
    use HasFactory;
    protected $table='schoolorigins';
    protected $fillable = [
        'student_id',
        'name',
        'address',
        'graduation_year',
        'village_id',
        'district_id',
        'regency_id',
        'province_id',
        'type',
        'created_at',
        'updated_at'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
