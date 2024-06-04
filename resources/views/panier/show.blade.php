<html>

<h2>Le Panier</h2>
<table border="1" align="center">
    <tr>
        <th>Numéro du Produit</th>
        <th>Quantité</th>
    </tr>

    @forelse ($panier as $lignecommande)

    <tr>
        <td>{{$lignecommande['produit']}}</td>
        <td>{{$lignecommande['qte']}}</td>
    </tr>
    @empty
    Pannier Vide
    @endforelse
    <tr>
        <th colspan=6>Nombre de Produits</th>
        <th>{{ count($panier) }}</th>
        <th colspan=3><a href="{{route('produits.index')}}">
                <img src="{{asset('images/back.png')}}" width=40 height=40 /></a></th>
    </tr>
</table>

</html>