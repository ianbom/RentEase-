<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WishlistTable extends Model
{
    use HasFactory;

    protected $primaryKey = 'wishlist_id';
    protected $table = 'wishlist';

    protected $fillable = ['user_id'];

    public function products()
    {
        return $this->belongsToMany(ProductTable::class, 'product_wishlist', 'wishlist_id', 'product_id');
    }

}
