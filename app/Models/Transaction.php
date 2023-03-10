<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'idPeminjam',
        'idProduct',
        'dateIn',
        'dateOut',
        'status',
        'priceRent',
        'itsDelete',
        'nEmply',
        'created_at',
        'updated_at',
    ];
}
