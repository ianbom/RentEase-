<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReplyKomentarTable extends Model
{
    use HasFactory;
    protected $primaryKey = 'reply_komentar_id';
    protected $table = 'reply_komentar';
    protected $fillable = ['komentar_id', 'user_id','reply'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function komentar()
    {
        return $this->belongsTo(KomentarTable::class, 'komentar_id', 'komentar_id');
    }
}
