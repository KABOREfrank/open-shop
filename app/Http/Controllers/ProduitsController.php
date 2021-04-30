<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Produit;
use App\Models\Category;
use App\Mail\AjoutProduit;
use App\Exports\ProduitsExport;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use App\Notifications\NouveauProduit;
use App\Http\Requests\ProduitFormRequest;

class ProduitsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'isAdmin'])->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produits = Produit::orderByDesc('id')->paginate(15);

        return view('font-office.produits.index', ['produits' => $produits]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $produit = new Produit();

        return view('font-office.produits.create',
         compact('categories', 'produit')
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(ProduitFormRequest $request)
    {
        $imageName = 'produit.png';
        if ($request->file('image')) {
            $imageName = time().'_'.$request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/produits', $imageName);
        }
        //dd(date("d/m/y",time()));
        $produit = Produit::create([
        'designation' => $request->designation,
        'prix' => $request->prix,
        'description' => $request->description,
        'quantite' => $request->quantite,
        'category_id' => $request->category_id,
        'image' => $imageName,
        ]);
        $user= User::first();
        Mail::to($user)->send(new AjoutProduit($produit));
        //$produit = Produit::orderByDesc('id')->first();
            //$users= User::all();
            //Mail::to($users)->send(new AjoutProduit($produit));


        return redirect()->route('produits.show', $produit)->with('statut', 'Votre nouveau produit été bien ajouté!');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Produit $produit)
    {
        $all = Produit::all();

        return view('font-office.produits.show', [
            'produit' => $produit,
            'allproduit' => $all,
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Produit $produit)
    {
        $categories = Category::all();

        return view('font-office.produits.edit', [
            'produit' => $produit,
            'categories' => $categories,
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(ProduitFormRequest $request, $id) // on fait appel a produitFormRequiest qui va contenir les contrainte
    {
        Produit::where('id', $id)->update([
            'designation' => $request->designation,
            'prix' => $request->prix,
            'quantite' => $request->quantite,
            'description' => $request->description,
            'category_id' => $request->category_id,
        ]);

        $user = User::first();
        $produit = Produit::orderByDesc('id')->first();
        $user->notify(new NouveauProduit($produit));

        return redirect()->route('produits.show', $id)->with('status', 'Votre produti a été bien modifié!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Produit::destroy($id);

        return redirect()->route('produits.index')->with('statut', 'votre produit a été bien supprimé!');
    }

    public function export()
    {
        return Excel::download(new ProduitsExport(), 'produits.xlsx');
    }
    
}
