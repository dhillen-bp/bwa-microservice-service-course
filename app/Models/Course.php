<?php

namespace App\Models;

use App\Models\Mentor;
use App\Models\Chapter;
use App\Models\ImageCourse;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory;
    protected $table = 'courses';

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:m:s',
        'updated_at' => 'datetime:Y-m-d H:m:s',
    ];

    protected $fillable = [
        'name', 'certificate', 'thumbnail', 'type', 'status', 'price', 'level', 'description', 'mentor_id'
    ];

    /**
     * Get the mentor that owns the Course
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function mentor(): BelongsTo
    {
        return $this->belongsTo(Mentor::class, 'mentori_id', 'id');
    }

    /**
     * Get all of the chapters for the Course
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function chapters(): HasMany
    {
        return $this->hasMany(Chapter::class)->orderBy('id', 'ASC');
    }
    public function images(): HasMany
    {
        return $this->hasMany(ImageCourse::class)->orderBy('id', 'DESC');
    }
}
