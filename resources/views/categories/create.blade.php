@extends('../layouts.layout')

@section('content')
<h1>Ajout d'une catégorie</h1>

<div class="w-50 mg-2">
    <form action="{{ route('categories.store') }}" method="post" class="form form-dark">
        @csrf
        <h3 class="form-title">Nouvelle categorie</h3>
        <div class="form-group">
            <label for="">
                <p>Designation</p>
                <input type="text" name="designation" id="designation" class="form-control">
            </label>
        </div>

        <div class="form-group">
            <label for="">
                <p>Description</p>
                <textarea name="description" id="description" class="form-control"></textarea>
            </label>
        </div>

        <div class="form-group">
            <input type="submit" value="Valider" class="btn btn-primary">
            <input type="reset" value="Annuler" class="btn">
        </div>
    </form>
</div>


@endsection