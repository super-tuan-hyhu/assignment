<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    protected $table = 'order_detail';
    protected $primaryKey = 'id_detail';

    protected $fillable = [
        'product_id',
        'order_id',
        'name_product',
        'price_product',
        'number_product',
        'color',
        'size',
    ];

    public function orderr() {
        return $this->belongsTo(Order::class, 'order_id');
    }

    public function product() {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
