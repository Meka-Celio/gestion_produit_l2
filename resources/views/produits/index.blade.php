@extends('layouts/layout')

@section('content')
<h1>Dashboard</h1>

<div class="row">

    <div class="card col-md-12 mg-2 table-box ">
        <div class="table-box-content">
            <div class="table-box-title">
                <h2>All products</h2>
                <p>Nombre de produits : <span class="color">{{ count($produits) }}</span></p>

                <div class="table-box-title-search">
                    <form action="" method="post">
                        <div class="form-group">
                            <input type="text" name="designation" id="" class="form-input" placeholder="Designation">
                            <input type="submit" name="submit" value="Rechercher" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>

            <div class="table-box-footer">
                <a href="{{route('panier.show')}}" class="btn btn-primary">Voir le panier</a>
                <br><br>
            </div>

            <div class="table-box-container">
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Désignation</th>
                            <th>Description</th>
                            <th>Prix (dh)</th>
                            <th>Categorie</th>
                            <th>+</th>
                            <th colspan="3">Options</th>
                        </tr>
                    </thead>
                    <tbody>

                        @forelse ($produits as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->designation }}</td>
                            <td>{{ $product->description }}</td>
                            <td>{{ $product->prix }}</td>
                            <td>{{ $product->categorie->designation }}</td>

                            <td>
                                <form action="{{route('mettreaupanier')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="product" value="{{$product->id}}">
                                    <div class="form-group">
                                        <label for="">
                                            <p>Qte</p>
                                            <input type="number" name="qte" value="1" min="1" class="form-input">
                                        </label>
                                    </div>
                                    <input type="submit" value="Add" class="btn btn-primary">
                                </form>

                            </td>

                            <td><a class="mark mark-info" href="{{ route('produits.show', $product->id) }}">
                                    <img src="{{ asset('img/eye-svgrepo-com.svg') }}" alt="">
                                </a></td>
                            <td><a class="mark mark-warning" href="{{ route('produits.edit', $product->id) }}">
                                    <img src="{{ asset('img/pen-svgrepo-com.svg') }}" alt="">
                                </a></td>
                            <td><a class="mark mark-danger" href="{{ route('produits.delete', ['produit_id' => $product->id]) }}">
                                    <img src="{{ asset('img/trash-svgrepo-com.svg') }}" alt="">
                                </a></td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6">Il n'y a pas de produit à afficher</td>
                        </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>

        </div>

    </div>

</div>

@endsection