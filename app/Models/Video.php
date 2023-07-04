<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Video extends Model
{
    use HasFactory;
    protected $table = 'course_videos';
    protected $fillable = ['course_id','video_url','description'];

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }
}
