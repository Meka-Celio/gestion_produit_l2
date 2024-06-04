<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commande;
use App\Models\Produit;
use App\Models\ProduitCommande;
use Swift_SmtpTransport;
use Swift_Mailer;
use Swift_Message;
use Swift_Attachment;
use Dompdf\Dompdf;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class CommandeController extends Controller
{

    public function QRCode($tocken)
    {
        //composer require simplesoftwareio/simple-qrcode "~4"
        $qrcode = QrCode::size(200)->generate($tocken);
        return view("pannier.QRCode", compact('qrcode'));
    }

    public function pdf()
    {
        $file = new DomPdf();
        $file->loadHTML($this->htmlContent());
        $file->setPaper('A4', 'landscape');
        $file->render();
        $file->stream();
        return redirect()->route('indexprod');
    }

    public function geo()
    {
        $data   = ['lat' => 33.56546, 'lng' => -7.573092];
        return view('geolocaliser')->with('data', $data);
    }

    public function htmlContent()
    {
        if (session()->get("pannier") != null)
            $pannier = session()->get("pannier");
        else $pannier = array();
        $content = "
        <html><h2>La commande </h2>
    <table border=1 align=center>
    <tr><th>Numéro du Produit</th><th>Quantité</th><th>Prix Unitaire</th></tr>";
        foreach ($pannier as $lignecommande)
            $content .=
                "<tr>
                    <td>" . $lignecommande['prod'] . "</td>
                    <td>" . $lignecommande['qte'] . "</td>
                    <td>" . $lignecommande['prixU'] . "</td>
                </tr>";
        $content .= "<tr><th>Nombre de Produits</th><th>" . count($pannier) . "</th>
            <th>" . $this->amount() . " MAD</th>
                </tr>
            </table>
        </html>";
        return $content;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function mettreaupanier(Request $request)
    {
        // $request->session()->forget('panier');
        if ($request->session()->get('panier') != null) {
            $panier = $request->session()->get('panier');
        } else {
            $panier = array();
        }

        $prod = $request->product;
        $qte = $request->qte;
        // dd($panier);
        // Vérifier si les produits sont uniques dans le panier, sinon faire somme des quantités même produits
        foreach ($panier as $index => $item) {
            // if ($panier[$index]['produit'] === $prod) $panier[$index]['qte'] += 1;
            echo "<pre>" . var_dump($index) . "</pre>";
        }

        array_push($panier, array('produit' => $prod, 'qte' => $qte));
        // print_r($panier);
        $request->session()->put('panier', $panier);

        // $commande = new Commande;
        // $commande->date_commande = Date('Y-m-d H:i:s');
        // $commande->save();

        // $produitcommande = new ProduitCommande;
        // $produitcommande->produit_id = $prod;
        // $produitcommande->commande_id = $commande->id;
        // $produitcommande->qte = $qte;

        // $produitcommande->save();

        return redirect()->route('produits.index');
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function showpanier(Request $request)
    {
        if ($request->session()->get("panier") != null)
            $panier = $request->session()->get("panier");
        else $panier = array();
        // dd($panier);
        // var_dump($panier);
        // die();
        foreach ($panier as $index => $item) {
            // if ($panier[$index]['produit'] === $prod) $panier[$index]['qte'] += 1;
            echo "<pre>" . var_dump($index) . "</pre>";
        }
        // return view('panier.show')->with('panier', $panier);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
