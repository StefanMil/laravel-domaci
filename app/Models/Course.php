<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Course extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public static function courses()
    {
        return Course::all();
    }
}
