<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\User;

class MainController extends Controller
{
    public function acceuil()
    {
        //$user = User::orderByDesc()->first();
        // $users = User::all();

        //dd($users);
        //dd($user->isAdmin());
        // dd('acceuil')

        //$collection1 = collect(['orange', 'Banane', 'mangue', 'Avocat']);

        //$produits = Produit::all();
        //dd($collection2->sortByDesc('prix'));
        //dd($collection2->where('designation', 'Avovita')->first());
       // $produitsFiltres = $produits->filter(function ($produit, $key) {
          //  return $produit->prix > 100000 && $produit->prix < 500000;
       // });
        //dd($produitsFiltres);
        $produits = Produit::orderByDesc('id')->take(9)->get();

        return view('welcome', ['produits' => $produits]);
    }
}
