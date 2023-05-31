<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Students extends Authenticatable
{
    use HasFactory;
    protected $table = 'students';

    protected $fillable = [
        'name',
        'email',
        'password',
        'status',
        'user_type',
    ];

    protected $hidden = [
        'password',
    
    ];


    public static function boot()
    {
        parent::boot();

        static::creating(function ($student) {
            $student->user_type = 'student';
        });
    }
    public function activitie_response()
    {
        return $this->hasMany(Activities_responses::class);
    }
}

   
