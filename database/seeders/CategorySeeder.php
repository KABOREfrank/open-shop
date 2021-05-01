<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Category::create([
        //     'libelle'=> "Materiels Electroniques",
        //     'description' => "Ceci est la description de materiels electroniques",
        // ]);
        // Category::create([
        //     'libelle'=> " Cosmetiques",
        //     'description' => "Ceci est la description de comsmetiques",
        // ]);

        // Category::create([
        //     'libelle'=> " Meubles",
        //     'description' => "Ceci est la description de meubles",
        // ]);
        
        Category::factory(500)->create();

        
    }
}
