<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
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

            DB::table('products')->insert([
                'name' => $faker->word,
                'stock' => $faker->numberBetween(1, 20),
                'price' => $faker->numberBetween(9000, 14000),
                'category_id' => $faker->numberBetween(1, 10),
                'created_at' => $faker->dateTimeThisYear('now', 'Asia/Jakarta'),
                'updated_at' => $faker->dateTimeThisYear('now', 'Asia/Jakarta'),
            ]);
        }
    }
}
