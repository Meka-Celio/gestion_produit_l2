<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion de Produits - {{ $title }}</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('img/ntechnica-favicon-white.png') }}" type="image/x-icon">
    <!-- Bootstrap CSS & JS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <main>
        <div class="container-fluid">
            <aside id="sidebar" class="col-md-12">
                <div class="row" style="align-items:center;">
                    <div class=" branding col-md-2">
                        <img src="{{ asset('img/ntechnica-logo-white.png') }}" alt="">
                    </div>
                    <ul class="list col-md-10">
                        <li class="list-item"><a href="{{ route('categories.index') }}">Catégories</a></li>
                        <li class="list-item"><a href="{{ route('produits.index') }}">Tous les produits</a></li>
                        <li class="list-item"><a href="{{ route('produits.create') }}">Ajouter un produit</a></li>
                    </ul>
                </div>
            </aside>
            <section id="main" class="col-md-12">
                @yield('content')
            </section>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    @stack('scripts')
</body>

</html>