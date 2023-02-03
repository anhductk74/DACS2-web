<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    use HasFactory;
    protected $fillable = [
        'idProduct',
        'nameProduct',
        'category',
        'imgProduct',
        'img1',
        'img2',
        'img3',
        'price',
        'quantitySum',
        'detail'
    ];
    protected $table = 'products';

}