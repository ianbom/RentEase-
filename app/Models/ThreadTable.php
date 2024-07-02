<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThreadTable extends Model
{
    use HasFactory;
    protected $table = 'thread';
    protected $primaryKey = 'thread_id';
    protected $fillable = [
        'title',
        'konten',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function komentars()
    {
        return $this->hasMany(KomentarTable::class, 'thread_id', 'thread_id');
    }

    public function likes()
    {
        return $this->hasMany(LikeTable::class, 'thread_id', 'thread_id');
    }
}
