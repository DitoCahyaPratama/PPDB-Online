<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SelectionReport extends Model
{
    use HasFactory;
    protected $table='selection_reports';
    protected $fillable = [
        'student_id',
        'report_id',
        'department_id',
        'avg',
        'status',
    ];

    // public function selectionReportsRelation()
    // {
    //     return $this->belongsToMany('App\Report','report_id','id');
    // }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
