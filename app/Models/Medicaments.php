<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Categorie;

class Medicaments extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'cod_Medoc',
        'nom',
        'prix',
        'marque',
        'dosage',
        'categories_id',
    ];


    public function categories(){
        return $this->belongsToMany(Categorie::class);
    }
}
