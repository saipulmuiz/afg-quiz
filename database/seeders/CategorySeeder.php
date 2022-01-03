<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker::create('id_ID');

        for ($i = 1; $i <= 10; $i++) {

            DB::table('categorys')->insert([
                'name' => $faker->word,
                'created_at' => $faker->dateTimeThisYear('now', 'Asia/Jakarta'),
                'updated_at' => $faker->dateTimeThisYear('now', 'Asia/Jakarta'),
            ]);
        }
    }
}
