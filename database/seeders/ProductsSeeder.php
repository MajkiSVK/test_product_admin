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
            ['name' => 'Green shirt', 'description' =>'this is green shirt', 'unique_hash' =>'8b52b5ae603e6d99'],
            ['name' => 'Red shirt', 'description' =>'this is red shirt', 'unique_hash' =>'42835f5cb13a35e4'],
            ['name' => 'Small hat', 'description' =>'this is small hat', 'unique_hash' =>'a2f8d8b760194584'],
            ['name' => 'Big hat', 'description' =>'this is big hat', 'unique_hash' =>'e6ff9a29030e0de3'],
            ['name' => 'Leather handbag', 'description' =>'this is leather handbag', 'unique_hash' =>'e1acd347331b4eee'],
            ['name' => 'Cloth handbag', 'description' =>'this is cloth handbag', 'unique_hash' =>'e1acd347331b4eee'],
        ]);
    }
}
