<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Model;
use App\Models\Produit;

class deletedProduits extends Model
{
    use HasFactory;

    public function produit(): HasOne
    {
        return $this->hasOne(Produit::class);
    }

    protected $fillable = [
        'deleted_at',
        'deleted_by'
    ];
}
