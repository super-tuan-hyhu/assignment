<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'order';
    protected $primaryKey = 'id_order';

    protected $fillable = [
        'accepter',
        'email',
        'address',
        'phone',
        'payment_methods',
        'account',
        'total_price',
    ];
}
