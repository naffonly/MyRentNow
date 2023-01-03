<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'nameProduct',
        'spekProduct',
        'imgProduct',
        'priceProduct',
        'itsDelete',
        'stockProduct',
        'categoryId',
        'created_at',
        'updated_at',
    ];
}
