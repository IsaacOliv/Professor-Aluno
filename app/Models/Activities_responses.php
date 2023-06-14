<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activities_responses extends Model
{
    use HasFactory;

    protected $table = 'activities_responses';
    protected $fillable = [

        'check',
        'note',

        'filepath',
        'description',
        
        'activity_id',
        'student_id',
        
    ];


    public function activity()
    {
        return $this->belongsTo(Activities::class, 'activity_id', 'id');
    }
    public function student()
    {
        return $this->belongsTo(Students::class, 'student_id', 'id');
    }
}
