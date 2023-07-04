<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use mysql_xdevapi\Table;

class Teacher extends Model
{
    use HasFactory;
    protected $table = ('teachers');
    protected $fillable = ['user_id'];

    public function courses(): HasMany
    {
        return $this->hasMany(Course::class);
    }
}


