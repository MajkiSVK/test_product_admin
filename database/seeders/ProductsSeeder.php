<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            ['name' => 'Green shirt', 'description' =>'this is green shirt', 'unique_hash' =>'8b52b5ae603e6d99','created_at' =>now(), 'updated_at' =>now()],
            ['name' => 'Red shirt', 'description' =>'this is red shirt', 'unique_hash' =>'42835f5cb13a35e4','created_at' =>now(), 'updated_at' =>now()],
            ['name' => 'Small hat', 'description' =>'this is small hat', 'unique_hash' =>'a2f8d8b760194584','created_at' =>now(), 'updated_at' =>now()],
            ['name' => 'Big hat', 'description' =>'this is big hat', 'unique_hash' =>'e6ff9a29030e0de3','created_at' =>now(), 'updated_at' =>now()],
            ['name' => 'Leather handbag', 'description' =>'this is leather handbag', 'unique_hash' =>'e1acd347331b4eee','created_at' =>now(), 'updated_at' =>now()],
            ['name' => 'Cloth handbag', 'description' =>'this is cloth handbag', 'unique_hash' =>'e1acd347331b4eee','created_at' =>now(), 'updated_at' =>now()],
        ]);
    }
}
