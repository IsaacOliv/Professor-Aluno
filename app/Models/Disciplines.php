<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disciplines extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function activitie()
    {
        return $this->hasMany(Activities::class);
    }
}
