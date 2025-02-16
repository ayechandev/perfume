<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        //For User

        //For User
        \App\Models\User::factory()->create([
            'name'      => 'Y-perfume',
            'email'     => 'admin@gmail.com',
            'password'  => Hash::make('admin12345'),
        ]);




        //For Category

        \App\Models\Category::factory()->create([
            'name' => 'Dior',
            'photo' => 'dior.jpg',
            'remark' => ''
        ]);

        \App\Models\Category::factory()->create([
            'name' => 'Chanel',
            'photo' => 'chanel.jpg',
            'remark' => ''
        ]);

        \App\Models\Category::factory()->create([
            'name' => 'MYST',
            'photo' => 'myst.jpg',
            'remark' => ''
        ]);

        ///For Item

        \App\Models\Item::factory()->create([
            'category_id' => '4',
            'name'  => 'Armani My Way ( 30ml ) ',
            'photo' => '1.jpg',
            'price' => '28000',
            'qty'   => '10',
            'gender' => 'Unisex',
            'status' => '',
            'remark' => ''
        ]);
    }
}
