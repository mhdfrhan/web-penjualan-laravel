<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DataBarang>
 */
class DataBarangFactory extends Factory
{
	/**
	 * Define the model's default state.
	 *
	 * @return array<string, mixed>
	 */
	public function definition()
	{
		return [
			'category_id' => mt_rand(1, 5),
			'merk_brg' => $this->faker->words(2, true),
			'slug' => $this->faker->slug(),
			'image' => null,
			'harga_brg' => $this->faker->randomNumber(5, true),
			'stok_brg' => $this->faker->randomNumber(3, false)
		];
	}
}
