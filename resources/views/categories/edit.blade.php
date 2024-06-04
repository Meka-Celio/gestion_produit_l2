@extends('../layouts.layout')

@section('content')
<h1>Modifier une catégorie</h1>

<div class="w-50 mg-2">
    <form action="{{ route('categories.update', $id) }}" method="post" class="form form-dark">
        @csrf
        @method('PUT')

        <h3 class="form-title">Modifier</h3>

        @foreach ($categorie as $cat)
        <input type="hidden" name="id" value="{{ $cat->id }}">
        <div class="form-group">
            <label for="">
                <p>Designation</p>
                <input type="text" name="designation" require value="{{ $cat->designation }}" class="form-control">
            </label>
        </div>

        <div class="form-group">
            <label for="">
                <p>Description</p>
                <textarea name="description" require placeholder="{{ $cat->description }}" value="{{ $cat->description }}" class="form-control">{{ $cat->description }}</textarea>
            </label>
        </div>
        @endforeach

        <div class="form-group">
            <input type="submit" value="Valider" class="btn btn-primary">
            <input type="reset" value="Annuler" class="btn">
        </div>
    </form>
</div>


@endsection