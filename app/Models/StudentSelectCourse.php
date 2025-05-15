<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentSelectCourse extends Model
{
    use HasFactory;

    // 指定資料表名稱
    protected $table = 'student_select_course';

    // 禁用自動時間戳（如果不使用時間戳，這一行可以移除）
    public $timestamps = false;

    // 設定主鍵
    protected $primaryKey = ['studentID', 'courseID'];

    // 設定是否使用自增主鍵
    public $incrementing = false;

    // 設定主鍵的類型
    protected $keyType = 'string'; // 由於使用了複合主鍵，這裡使用 string 或適當的型別

    // 填充的屬性
    protected $fillable = [
        'studentID',
        'courseID',
    ];

    /**
     * 關聯到學生 (Student)
     */
    public function student()
    {
        return $this->belongsTo(Student::class, 'studentID', 'studentID');
    }

    /**
     * 關聯到課程 (Course)
     */
    public function course()
    {
        return $this->belongsTo(Course::class, 'courseID', 'courseID');
    }
}
