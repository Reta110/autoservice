<?php

use Illuminate\Database\Seeder;

class ProductsCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_categories')->insert([
            'name' => 'Filtros de aceite',
        ]);
        DB::table('product_categories')->insert([
            'name' => 'Pastillas de freno',
        ]);
        DB::table('product_categories')->insert([
            'name' => 'Baterias',
        ]);
        DB::table('product_categories')->insert([
            'name' => 'Filtros de aire',
        ]);
        DB::table('product_categories')->insert([
            'name' => 'Bujias',
        ]);

    }
}
