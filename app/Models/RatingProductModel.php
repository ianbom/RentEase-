<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RatingProductModel extends Model
{
    use HasFactory;

    protected $primaryKey = 'rating_product_id';
    protected $table = 'rating_product';

    protected $fillable = [
        'order_id',
        'review',
        'rating'
    ];

    public function order()
    {
        return $this->belongsTo(OrderTable::class, 'order_id', 'order_id');
    }
    
}
