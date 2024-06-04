<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Produit;
use App\Models\deletedProduits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): view
    {
        // Appel à la fonction statique
        $produits = Produit::all();
        $categories = Categorie::all();

        // Utilisation de la facade DB
        // $produits = DB::select("select * from produits");
        return view('produits.index', ['categories' => $categories, 'produits' => $produits, 'title' => 'Accueil']);
    }

    public function create()
    {
        //Appel de la view create dans le dossier views.produits
        return view('produits.create', ['title' => 'Ajouter un produit']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // print_r($request->all());

        $produit = new Produit;
        $produit->designation = $request->input('designation');
        $produit->description = $request->input('description');
        $produit->prix = $request->input('prix');
        $produit->categorie_id = $request->input('categorie');
        $produit->save();

        //Redirection vers la view index du dossier produits
        return redirect()->route('produits.index');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function show(int $id): View
    {

        // Eloquent 
        $produit = Produit::find($id);
        return view('produits.show', ['title' => 'Voir le produit', 'produit' => $produit]);
    }

    /**
     * Display the specified resource for update.
     *
     * @param  \App\Models\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id): View
    {
        $produit = Produit::find($id);
        // var_dump($produit);
        // die();
        $id = $produit->id;
        $categories = Categorie::all();
        return view('produits.edit', ['title' => 'Modifier le produit', 'produit' => $produit, 'id' => $id, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produit $produit)
    {
        $produit->designation = $request->input('designation');
        $produit->description = $request->input('description');
        $produit->prix = $request->input('prix');
        $produit->updated_at = date("Y-m-d H:i:s");
        $produit->save();

        //Redirection vers la view index du dossier produits
        return redirect()->route('produits.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $id 
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        // Récupération de l'item correspondant 
        $produit = DB::table("produits")->where("id", '=', $id)->get();
        $deletedProduit = new deletedProduits;

        // Enregistrement dans la table de produits supprimés
        foreach ($produit as $p) {
            $deletedProduit->designation = $p->designation;
            $deletedProduit->description = $p->description;
            $deletedProduit->prix = $p->prix;
            $deletedProduit->deleted_at = date("Y-m-d H:i:s");
            $deletedProduit->deleted_by = "Sys";

            $deletedProduit->save();
        }
        DB::table("produits")->where("id", '=', $id)->delete();

        //Redirection vers la view index du dossier produits
        return redirect()->route('produits.index');
    }

    /**
     * Find all products by specified designation
     * @param $designation
     * @return \Illuminate\Http\Response
     */
    public function search(string $designation)
    {

        // Récupérer les produits par critères
        $produits = Produit::where('designation', 'like', "%. $designation .%")->get();
    }
}
