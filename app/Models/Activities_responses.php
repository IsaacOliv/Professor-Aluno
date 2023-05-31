<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activities_responses extends Model
{
    use HasFactory;


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
        return $this->belongsTo(Activities::class);
    }
    public function student()
    {
        return $this->hasMany(Students::class);
    }
}
