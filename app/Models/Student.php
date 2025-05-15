<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    // 指定資料表名稱
    protected $table = 'student';

    // 主鍵欄位
    protected $primaryKey = 'studentID';

    public $incrementing = false;
    protected $keyType = 'string';

    // 這個模型不會自動管理 created_at 和 updated_at 欄位
    public $timestamps = false;

    // 可批量賦值的欄位
    protected $fillable = [
        'studentID',
        'name',
        'email',
        'password',
    ];

    // 也可以選擇防止批量賦值（為了安全性）
    // protected $guarded = [];

    // 隱藏的欄位（不會被轉換到陣列或 JSON）
    protected $hidden = [
        'password',
    ];

    // 你可以定義一些與學生相關的關聯，如學生所屬課程、作業等
    public function courses()
    {
        return $this->belongsToMany(Course::class, 'student_select_course', 'studentID', 'courseID');
    }

    // 你也可以定義一些方法來處理學生相關的邏輯
    public function getProfile()
    {
        return $this->name . ' (' . $this->studentID . ')';
    }
}
