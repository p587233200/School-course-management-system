<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $table = 'teacher';
    protected $primaryKey = 'teacherID';
    public $incrementing = false;
    public $timestamps = false;

    // 如果需要，可以加上對 course 的反向關聯
    public function courses()
    {
        return $this->hasMany(Course::class, 'teacherID', 'teacherID');
    }
}

