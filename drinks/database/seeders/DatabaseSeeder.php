<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Bebras',
            'email' => 'bebras@gmail.com',
            'password' => Hash::make('123'),
            'role' => 'manager'
        ]);
        DB::table('users')->insert([
            'name' => 'Briedis',
            'email' => 'briedis@gmail.com',
            'password' => Hash::make('123'),
            'role' => 'admin'
        ]);

        $faker = Faker::create();

        foreach(range(1, 10) as $i) {
            DB::table('types')->insert([
                'title' => $faker->cityPrefix . ' ' . $faker->domainWord ,
                'is_alk' => 1
            ]);
        }

        foreach(range(11, 30) as $i) {
            DB::table('types')->insert([
                'title' => $faker->cityPrefix . ' ' . $faker->domainWord ,
                'is_alk' => 0
            ]);
        }

        foreach(range(1, 100) as $i) {
            DB::table('drinks')->insert([
                'title' => $faker->colorName . ' ' . $faker->domainWord,
                'vol' => rand(1, 999) / 10,
                'size' => rand(1, 9999),
                'price' => (rand(1, 9999) / 10),
                'type_id' => rand(1, 10)
            ]);
        }

        foreach(range(1, 200) as $i) {
            DB::table('drinks')->insert([
                'title' => $faker->colorName . ' ' . $faker->domainWord,
                'vol' => null,
                'size' => rand(1, 9999),
                'price' => (rand(1, 9999) / 10),
                'type_id' => rand(11, 30)
            ]);
        }

    }
}
