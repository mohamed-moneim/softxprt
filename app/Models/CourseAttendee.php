<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseAttendee extends Model
{
    use HasFactory;
    public function students(): BelongsToMany
    {
        return $this->belongsToMany(Student::class);
    }
    public function instructor(): BelongsToMany
    {
        return $this->belongsToMany(Instructor::class);
    }
    

}
