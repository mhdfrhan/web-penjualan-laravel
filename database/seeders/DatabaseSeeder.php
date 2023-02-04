<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\DataBarang;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        User::factory()->create([
            'name' => 'Muhammad farhan',
            'username' => 'farhan',
            'email' => 'farhanmutia12@gmail.com',
						'password' => bcrypt('farhan')
        ]);


				DataBarang::factory(100)->create([
					'kategori' => Str::random(5),
					'merk_brg' => Str::random(5),
					'slug' => Str::random(5),
					'harga_brg' => 100000000,
					'stok_brg' => 100,
				]);

    }
}
