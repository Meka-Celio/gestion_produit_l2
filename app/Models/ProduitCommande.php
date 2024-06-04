<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProduitCommande extends Model
{
    use HasFactory;
    protected $table = "produit_commande";

    public function commande(): BelongsTo
    {
        return $this->belongsTo(commande::class);
    }
}
