<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stocks extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'quantite',
        'expiration',
        'ajout',
        'manufactured',
        'purchased',
        'medicaments_id',
    ];
}
