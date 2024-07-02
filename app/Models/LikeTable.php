<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LikeTable extends Model
{
    use HasFactory;
    protected $table = 'like';
    protected $primaryKey = 'like_id';
    protected $fillable = [
        'thread_id',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function thread()
    {
        return $this->belongsTo(ThreadTable::class, 'thread_id', 'thread_id');
    }
}
