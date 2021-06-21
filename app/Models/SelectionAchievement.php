<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SelectionAchievement extends Model
{
    // use HasFactory;
    protected $table='selection_achievements';
    protected $fillable = [
        'student_id',
        'achievement_id_1',
        'achievement_id_2',
        'achievement_id_3',
        'department_id',
        'status'
    ];

    public function student(){
        return $this->belongsTo(Student::class,'student_id','id');
    }
    public function achievement1(){
        return $this->belongsTo(Achievement::class,'achievement_id_1','id');
    }
    public function achievement2(){
        return $this->belongsTo(Achievement::class,'achievement_id_2','id');
    }
    public function achievement3()
    {
        return $this->belongsTo(Achievement::class, 'achievement_id_3', 'id');
    }
}
