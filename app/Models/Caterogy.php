<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Caterogy extends Model
{
    use HasFactory;
    protected $table = 'category';
    protected $primaryKey = 'id';
    protected $fillable= [
        'name_cate',
        'img',
        'status'
    ];
}
