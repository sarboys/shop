<?php

use Illuminate\Database\Seeder;

class ProductImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1;$i<5;$i++) {
            DB::table('product_images')->insert([
                'img' => 'details_'.$i.'.jpg',
                'product_id' => 1,
            ]);
        }
    }
}
