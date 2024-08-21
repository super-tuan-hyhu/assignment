<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductComment extends Model
{
    use HasFactory;
    protected $table = 'product_comment';
    protected $fillable = [
        'product_id',
        'vote_star',
        'comment',
        'users_id'
    ];

    public function user() {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function pro() {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
