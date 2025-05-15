<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;

    // 指定該模型所對應的資料表
    protected $table = 'announcement';
    
    protected $primaryKey = 'announcementID';

    // 定義該模型可批量賦值的屬性
    protected $fillable = [
        'courseID', // 課程ID
        'title',    // 公告標題
        'content',  // 公告內容
        'timestamp' // 發佈時間
    ];

    // 設定時間戳欄位的格式
    public $timestamps = false; // 如果你使用了 `timestamp` 欄位，Laravel 會自動為你填充 `created_at` 和 `updated_at`，如果你不想使用可以關閉

    // 關聯到 Course 模型
    public function course()
    {
        return $this->belongsTo(Course::class, 'courseID', 'courseID');
    }
}
