<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use mysql_xdevapi\Table;

class Teacher extends Model
{
    use HasFactory;
    protected $table = ('teachers');
    protected $fillable = ['name','email','password','address','mobile'];

    public function courses(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Course::class);
    }
}


