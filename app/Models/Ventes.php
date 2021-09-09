<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ventes extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'code',
        'nom',
        'marque',
        'taux',
        'type',
        'quantite',
        'price',
        'date_vente',
    ];
}
