<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $table = 'student';
    protected $fillable = ['name','email','address','password','mobile'];

    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }
}
