<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductTable extends Model
{
    use HasFactory;
    protected $primaryKey = 'product_id';
    protected $table = 'product';

    protected $fillable = [
        'nama_product',
        'toko_id',
        'jenis'
    ];

    public function toko(){
        return $this->belongsTo(TokoModel::class, 'toko_id', 'toko_id');
    }

    public function detail_product()
    {
        return $this->hasOne(ProductDetailTable::class, 'product_id', 'product_id');
    }

    public function wishlists(){
        return $this->belongsToMany(WishlistTable::class, 'product_wishlist', 'product_id', 'wishlist_id');
    }

    public function orders()
    {
        return $this->hasMany(OrderTable::class, 'product_id', 'product_id');
    }

    public function ratings()
    {
        return $this->hasManyThrough(RatingProductModel::class, OrderTable::class, 'product_id', 'order_id', 'product_id', 'order_id');
    }
}
