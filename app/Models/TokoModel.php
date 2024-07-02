<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TokoModel extends Model
{
    use HasFactory;

    protected $table = 'toko';
    protected $primaryKey = 'toko_id';

    protected $fillable = [
        'nama_toko',
        'deskripsi',
        'alamat_toko',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function products()
    {
        return $this->hasMany(ProductTable::class, 'toko_id', 'toko_id');
    }

}
