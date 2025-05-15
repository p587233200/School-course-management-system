<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;

    protected $table = 'assignment';

    // 指定主鍵欄位名稱（預設為 'id'，這裡用 'assignmentID'）
    protected $primaryKey = 'assignmentID';

    // 設定主鍵是否自增
    public $incrementing = true;

    // 設定主鍵的類型
    protected $keyType = 'int';

    // 設定可批量賦值的欄位
    protected $fillable = [
        'courseID', 'title', 'content', 'deadline',
    ];

    // 不自動處理 created_at 和 updated_at 時間戳，若不需要的話可以關閉
    public $timestamps = false;

    /**
     * 關聯到課程 (Course)
     */
    public function course()
    {
        return $this->belongsTo(Course::class, 'courseID', 'courseID');
    }

    /**
     * 關聯到作業的繳交紀錄 (StudentSubmitAssignment)
     */
    public function submissions()
    {
        return $this->hasMany(StudentSubmitAssignment::class, 'assignmentID', 'assignmentID');
    }
}
