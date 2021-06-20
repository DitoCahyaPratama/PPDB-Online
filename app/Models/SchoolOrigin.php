<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolOrigin extends Model
{
    use HasFactory;
    protected $table='schoolorigins';
    protected $fillable = [
        'name',
        'address',
        'graduation_year',
        'created_at',
        'updated_at'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
