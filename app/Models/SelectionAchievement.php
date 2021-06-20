<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SelectionAchievement extends Model
{
    // use HasFactory;
    protected $table='selection_achievements';
    protected $fillable = [
        'student_id ',
        'achievement_id_1',
        'achievement_id_2',
        'achievement_id_3',
        'department_id',
        'status'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
