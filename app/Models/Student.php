<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'course_id',
        'year_level'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
