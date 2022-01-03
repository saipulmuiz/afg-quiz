<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class ProductDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker::create('id_ID');

        for ($i = 1; $i <= 300; $i++) {

            DB::table('product_details')->insert([
                'product_id' => $faker->numberBetween(1, 300),
                'description' => $faker->text(100),
                'color' => $faker->colorName,
                'size' => $faker->randomElement(array('S', 'M', 'L', 'XL')),
                'created_at' => $faker->dateTimeThisYear('now', 'Asia/Jakarta'),
                'updated_at' => $faker->dateTimeThisYear('now', 'Asia/Jakarta'),
            ]);
        }
    }
}
