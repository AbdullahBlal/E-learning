<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations;
use Illuminate\Database\Eloquent\Relations\HasOne;

class EducationalLevel extends Model
{
    use HasFactory;
    protected $table = 'educational_levels';
    protected $fillable = ['name'];

    public function students(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Student::class);
    }
    public function courses(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Course::class);
    }
}
