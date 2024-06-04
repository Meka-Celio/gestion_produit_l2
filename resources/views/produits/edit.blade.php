@extends('../layouts.layout')

@section('content')
<h1>Ajout d'un nouveau produit</h1>

<div class="w-50 mg-2">
    <form action="{{ route('produits.update', $id) }}" method="post" class="form form-dark">
        @csrf
        @method('PUT')
        <h3 class="form-title">Nouveau produit</h3>

        <input type="hidden" name="id" value="{{ $produit->id }}">
        <div class="form-group">
            <label for="">
                <p>Designation</p>
                <input type="text" name="designation" require value="{{ $produit->designation }}" class="form-control">
            </label>
        </div>

        <div class="form-group">
            <label for="">
                <p>Description</p>
                <textarea name="description" require placeholder="{{ $produit->description }}" value="{{ $produit->description }}" class="form-control">{{ $produit->description }}</textarea>
            </label>
        </div>

        <div class="form-group">
            <label for="">
                <p>Prix</p>
                <input type="number" name="prix" value="{{ $produit->prix }}" require class="form-control">
            </label>
        </div>

        <div class="form-group">
            <label for="">
                <p>Catégorie</p>
                <select name="categorie" id="" class="form-control">
                    @foreach($categories as $cat)
                    @if ( $cat->id === $produit->categorie->id)
                    <option value="{{ $cat->id }}" selected>{{ $cat->designation }}</option>
                    @else
                    <option value="{{ $cat->id }}">{{ $cat->designation }}</option>
                    @endif
                    @endforeach
                </select>
            </label>
        </div>

        <div class="form-group">
            <input type="submit" value="Valider" class="btn btn-primary">
            <input type="reset" value="Annuler" class="btn">
        </div>
    </form>
</div>


@endsection