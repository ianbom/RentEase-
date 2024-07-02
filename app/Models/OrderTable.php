<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderTable extends Model
{
    use HasFactory;

    protected $table = 'order';
    protected $primaryKey = 'order_id';
    protected $fillable = [
        'user_id', 'product_id', 'deskripsi', 'tanggal_mulai_sewa','tanggal_selesai_sewa', 'total_harga', 'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function product()
    {
        return $this->belongsTo(ProductTable::class, 'product_id', 'product_id');
    }

    public function ratings()
    {
        return $this->hasOne(RatingProductModel::class, 'order_id', 'order_id');
    }
}
