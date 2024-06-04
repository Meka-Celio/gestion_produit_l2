<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categorie;

class Produit extends Model
{
    use HasFactory;
    protected $table = "produits";

    protected $fillable = [
        'designation',
        'description',
        'prix',
        'categorie_id'
    ];

    public function categorie(): HasOne
    {
        return $this->hasOne(Categorie::class, 'id', 'categorie_id');
    }
}
