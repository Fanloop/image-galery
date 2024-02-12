<?php

namespace Database\Factories;

use App\Models\Album;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Album>
 */
class AlbumFactory extends Factory
{
    protected $model = Album::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => fake()->name(),
            'deskripsi' => fake()->words(10, true),
            'thumbnail' => fake()->words(5, true),
            'visibility' => 'public',
            'user_id' => '9b41a434-a472-4084-a1ce-74c4f91f583e',
        ];
    }
}
