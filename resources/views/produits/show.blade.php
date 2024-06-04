@extends('layouts/layout')

@section('content')
<h1>Voir un produit</h1>

<div class="w-50 mg-2 table-box ">
    <div class="table-box-content">
        <div class="table-box-title">
            <h2>Produit n° {{ $produit->id }}</h2>
        </div>
        <div class="table-box-container">
            <div class="aff-block">
                <p>Désignation : <b>{{ $produit->designation }}</b></p>
                <p>Catégorie : <b>{{ $produit->categorie->designation }}</b></p>
                <p>Description : <b>{{ $produit->description }}</b></p>
                <p>Prix : <b>{{ $produit->prix }}</b></p>
                <div class="aff-footer">
                    <a class="mark mark-warning" href="{{ route('produits.edit', $produit->id) }}">
                        <img src="{{ asset('img/pen-svgrepo-com.svg') }}" alt="">
                    </a>
                    <a class="mark mark-danger" href="{{ route('produits.delete', $produit->id) }}">
                        <img src="{{ asset('img/trash-svgrepo-com.svg') }}" alt="">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection