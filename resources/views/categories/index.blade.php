@extends('layouts/layout')

@section('content')
<h1>Catégories</h1>

<div class="row">

    <div class="card w-70 mg-2 table-box ">
        <div class="table-box-content">
            <div class="table-box-title">
                <h2>All categories</h2>
            </div>

            <div class="table-box-footer">
                Nombre de catégories : <span class="color">{{ count($categories) }}</span>
            </div>

            <div class="table-box-container">
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Désignation</th>
                            <th>Description</th>
                            <th colspan="3">Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $cat)
                        <tr>
                            <td>{{ $cat->id }}</td>
                            <td>{{ $cat->designation }}</td>
                            <td>{{ $cat->description }}</td>
                            <td><a class="mark mark-info" href="{{ route('categories.show', $cat->id) }}">
                                    <img src="{{ asset('img/eye-svgrepo-com.svg') }}" alt="">
                                </a></td>
                            <td><a class="mark mark-warning" href="{{ route('categories.edit', $cat->id) }}">
                                    <img src="{{ asset('img/pen-svgrepo-com.svg') }}" alt="">
                                </a></td>
                            <td>
                                <form action="{{ route('categories.destroy', $cat->id) }}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <div class="form-group">
                                        <!-- <input type="submit" value="Delete" class="btn btn-danger"> -->
                                        <button class="mark mark-danger btn-mark">
                                            <img src="{{ asset('img/trash-svgrepo-com.svg') }}" alt="">
                                        </button>
                                    </div>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>

    </div>

    <div class="card w-30 mg-2">
        <form action="{{ route('categories.store') }}" method="post" class="form form-dark">
            @csrf
            <h3 class="form-title">Créer une nouvelle catégorie</h3>
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
</div>

<div class="row">
    <div class="card w-30 mg-2">
        <form action="" method="post" class="form form-dark">
            <h3 class="form-title">Rechercher une catégorie</h3>
            <div class="form-group">
                <input type="text" name="designation" id="" class="form-input" placeholder="Designation">
            </div>
            <div class="form-group">
                <input type="submit" name="submit" value="Rechercher" class="btn btn-primary">
            </div>
        </form>
    </div>
</div>

@endsection