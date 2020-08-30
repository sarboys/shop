<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1;$i<11;$i++) {
            DB::table('products')->insert([
                'name' => 'Product '.$i,
                'price' => rand(200,1500),
                'in_stock' => 1,
                'description' => 'lorem loremlorem loremlorem loremlorem loremlorem loremlorem lorem',
                'new_price' => rand(100,900)
            ]);
        }

    }
}
