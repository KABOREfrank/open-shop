<?php

namespace Database\Seeders;

use App\Models\Produit;
use Illuminate\Database\Seeder;

class ProduitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Produit::factory(500)->create();
        // Produit::create([

        //     'designation'=> "Chemise",
        //     'prix'=> 50000,
        //     'description'=> "Mauvaise qualite",
        //     'quantite' => 100
        // ]);
    }
}
