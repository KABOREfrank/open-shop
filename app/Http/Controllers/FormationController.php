<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Produit;
use App\Models\User;
use Illuminate\Http\Request;

class FormationController extends Controller
{
    public function index()
    {
       // $produits = Produit::all();
        $produit1 = Produit::first();
        $user1= User::first();
        $user1->produits()->attach($produit1);
        $category1= Category::first();


        $produit1->category_id =$category1->id;
        $produit1->save();
        //dd($produit1->category);

        //dd($category1->produits);
        dd($produit1->users);

       // $produit2 = Produit::where('id',2)->first();
        //dd($produit2);
        
       // $produit3 = Produit::where('prix','<=',50000)->get();
       // dd($produit3);
        
       // $produit4 = Produit::where('prix',2)->where('quantite', '!=',50)->get();
        //dd($produit4);



    }


    public function ajouterProduit()
    {
        $produit= new Produit();

        
        $produit->designation = " Maxwel";
        $produit->prix = 8000;
        $produit->description = "maxwel c'est le meilleur café";
        $produit->quantite = 50;
        $produit->save();

        dd($produit);

        
    }
    public function ajouterProduit2()
    {
        Produit::create([
            'designation' => 'Ordinateur',
            'prix' => 500000,
            'description' => 'La description du produit',
            'quantite' => 30
        ]);

     }

     public function updateProduit()
     {
        $produit1 = Produit::first();

        $produit1-> designation= "Avovita";
        $produit1->prix= 1800;
        $produit1->description= "Pommade féminine fait a base d'avocat! ";
        $produit1->quantite= 20;
         $produit1->save();
         dd($produit1);
     }
     public function updateProduit2(Produit $produit)
     {
         //$produit2 = Produit::findOrFail($id);ugig

         
         $result = Produit::where("id",$produit->id)->update([
             "designation"=>"Téléphone",
             "prix"=>50000,
             "description"=> "Ceci est la description de telephone",
             "quantite"=>25
             
             ]);
             dd($produit->designation);
             dd($result);
            }

     public function suppressionProduit()
        {
            $result = Produit::destroy(6);
            dd($result);
        }
}
