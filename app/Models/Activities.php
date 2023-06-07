<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activities extends Model
{
    use HasFactory;


    protected $table = 'activities';
    protected $fillable =[
        'name',
        'description',
        'filepath',
        'teatcher_id',
        'discipline_id',
    ];



    public function teatcher()
    {
        return $this->belongsTo(Teatchers::class, 'teatcher_id', 'id');
    }
    public function discipline()
    {
        return $this->belongsTo(Disciplines::class, 'discipline_id', 'id');
    }
    public function activitieresponse()
    {
        return $this->hasMany(Activities_responses::class);
    }
}
