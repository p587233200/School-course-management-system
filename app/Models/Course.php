<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Course extends Model
{
    // 資料表名稱
    protected $table = 'course';

    // 主鍵名稱
    protected $primaryKey = 'courseID';

    // 主鍵型別是 bigint（預設就是整數型，可省略）
    protected $keyType = 'int';

    // 不使用 Laravel 預設的 created_at / updated_at 欄位
    public $timestamps = false;

    // 可批量賦值欄位
    protected $fillable = ['teacherID','name','taID'];

    /**
     * 關聯：這門課的授課老師
     */
    public function teacher(): BelongsTo
    {
        return $this->belongsTo(Teacher::class, 'teacherID', 'teacherID');
    }
    // TA（單一）
    public function ta()
    {
        return $this->belongsTo(Student::class, 'taID', 'studentID');
    }

    /**
     * 關聯：這門課的公告（若你有 announcement 資料表）
     */
    public function announcements(): HasMany
    {
        return $this->hasMany(Announcement::class, 'courseID', 'courseID');
    }

    /**
     * 關聯：這門課的作業（若你有 assignment 資料表）
     */
    public function assignments(): HasMany
    {
        return $this->hasMany(Assignment::class, 'courseID', 'courseID');
    }

    /**
     * 關聯：選修這門課的學生（透過 student_select_course 資料表）
     */
    public function students()
    {
        return $this->belongsToMany(Student::class, 'student_select_course', 'courseID', 'studentID');
    }
}
