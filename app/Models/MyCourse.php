<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MyCourse extends Model
{
    use HasFactory;

    protected $table = 'my_courses';
    protected $fillable = [
        'course_id', 'user_id',
    ];

    /**
     * Get the course that owns the MyCourse
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }
}
