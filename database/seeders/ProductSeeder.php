<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Product::create([
            'name' => 'Half Zipper Pizza',
            'color' => 'Black',
            'tag_id' => 1,
            'condition' => '9.5/10',
            'price' => '85000',
        ]);
    }
}
