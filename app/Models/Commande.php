<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Commande extends Model
{
    use HasFactory;
    protected $table = "commandes";

    public function produitCommande(): HasMany
    {
        return $this->hasMany(ProduitCommande::class);
    }
}
