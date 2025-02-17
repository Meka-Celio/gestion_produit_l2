<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('deleted_produits', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('produit_id');
            $table->string('deleted_by', 255)->nullable(false);
            $table->timestamps();

            $table->foreign('produit_id')->references('id')->on('produits');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deleted_produits');
    }
};
