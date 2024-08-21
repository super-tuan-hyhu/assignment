<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'product';
    protected $primaryKey = 'id';
    // fillable dùng để tương tác với các trường trong bảng 
    protected $fillable = [
        'name',
        'image',
        'price_old',
        'price_new',
        'description',
        'category_id'
    ];

    public function cate() {
        return $this->belongsTo(Caterogy::class, 'category_id');
    }
}
