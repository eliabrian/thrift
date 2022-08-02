<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Tag::create([
            'name' => "Men's Ware"
        ]);
        
        \App\Models\Tag::create([
            'name' => "Women's Ware"
        ]);
    }
}
