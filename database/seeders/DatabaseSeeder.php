<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
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

		User::factory()->create([

			'name' => 'Muhammad Farhan',
			'username' => 'farhan',
			'role' => 'admin',
			'email' => 'hello.mhdfarhan@gmail.com',
			'password' => bcrypt('farhan'),
			'whatsapp' => '083173633639',
			'alamat' => 'Jl. Bandung GG Bandung 2',
			
		]);

		// Category::create([
		// 	'name' => 'Laptop',
		// 	'slug' => 'laptop-0893q4'
		// ]);
		// Category::create([
		// 	'name' => 'Handphone',
		// 	'slug' => 'hp-197457'
		// ]);
		// Category::create([
		// 	'name' => 'Televisi',
		// 	'slug' => 'televisi-0q2765'
		// ]);
		// Category::create([
		// 	'name' => 'Mouse',
		// 	'slug' => 'mouse-vn94y84'
		// ]);
		// Category::create([
		// 	'name' => 'Keyboard',
		// 	'slug' => 'keyboard-fh9834'
		// ]);

		// DataBarang::factory(40)->create();
	}
}
