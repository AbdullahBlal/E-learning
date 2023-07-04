<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Course extends Model
{
    use HasFactory;

    protected $table = 'courses';
    protected $fillable = ['teacher_id','title','description','duration','slug','educational_level','image','meta_title','meta_description','meta_keywords','status','popular'];

    public function teacher(): BelongsTo
    {
        return $this->belongsTo(Teacher::class);
    }
    public function student(): BelongsToMany
    {
        return $this->belongsToMany(Student::class);
    }
    public function course_coupon(): HasMany
    {
        return $this->hasMany(Coupon::class);
    }
    public function course_video(): HasMany
    {
        return $this->hasMany(Video::class);
    }
    public function course_quiz(): HasMany
    {
        return $this->hasMany(Quiz::class);
    }
    public function course_assistant(): HasMany
    {
        return $this->hasMany(Assistant::class);
    }
}
