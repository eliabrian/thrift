<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'role_id' => 1,
            'email' => 'admin@admin.com',
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Elia',
            'role_id' => 2,
            'email' => 'elia@email.com',
        ]);
    }
}
