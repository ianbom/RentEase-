<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KomentarTable extends Model
{
    use HasFactory;

    protected $table = 'komentar';
    protected $primaryKey = 'komentar_id';
    protected $fillable = [
        'thread_id',
        'user_id',
        'komentar'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function thread()
    {
        return $this->belongsTo(ThreadTable::class, 'thread_id', 'thread_id');
    }

    public function replies()
    {
        return $this->hasMany(ReplyKomentarTable::class, 'komentar_id', 'komentar_id');
    }

}
