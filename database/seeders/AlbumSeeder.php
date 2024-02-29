<?php

namespace Database\Seeders;

use App\Models\Album;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class AlbumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::query()->find('9b672b60-2c29-483f-9594-c1c9a6d979e4');

        for ($i = 0; $i < 5; $i++) {
            $name = fake()->word();
            Album::query()->create([
                'nama' => $name,
                'deskripsi' => fake()->realTextBetween(15, 40),
                'user_id' => $user->id,
            ]);

            Storage::makeDirectory($user->username . '/' . $name);
        }
    }
}
