<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDetailTable extends Model
{
    use HasFactory;
    protected $primaryKey = 'detail_product_id';
    protected $table = 'detail_product';

    protected $fillable = [
        'product_id',
        'harga',
        'deposito',
        'denda',
        'deskripsi',
        'kondisi',
        'brand'
    ];

    public function product(){
        return $this->belongsTo(ProductTable::class, 'product_id', 'product_id');
    }
}
