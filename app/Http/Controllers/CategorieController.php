<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Find all categories
        $categories = Categorie::all();

        return view('categories.index', ['categories' => $categories, 'title' => 'Gestion des catégories']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $categorie = new Categorie;
        $categorie->designation = $request->input('designation');
        $categorie->description = $request->input('description');
        $categorie->save();

        //Redirection vers la view index du dossier categories
        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        // Eloquent 
        $categorie = DB::select("select * from categories where id =" . $id);
        return view('categories.show', ['title' => 'Voir une categorie', 'categorie' => $categorie]);
    }

    public function edit(int $id): View
    {
        // Eloquent 
        $cat = DB::select("select * from categories where id =" . $id);
        return view('categories.edit', ['title' => 'Modifier une categorie', 'categorie' => $cat, 'id' => $id]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $categorie = Categorie::find($id);
        $categorie->designation = $request->input('designation');
        $categorie->description = $request->input('description');
        $categorie->updated_at = date("Y-m-d H:i:s");
        $categorie->save();

        //Redirection vers la view index du dossier categories
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $categorie = Categorie::find($id)->delete();
        //Redirection vers la view index du dossier categories
        return redirect()->route('categories.index');
    }
}
