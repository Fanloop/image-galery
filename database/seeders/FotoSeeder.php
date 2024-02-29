<?php

namespace Database\Seeders;

use App\Models\Album;
use App\Models\Foto;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class FotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::query()->find('9b672b60-2c29-483f-9594-c1c9a6d979e4');
        $album = Album::query()->find('9b6fdc88-58fa-484d-9f1a-788aeee51984');
        $path = 'storage/' . $user->username . '/' . $album->nama;

        for ($i = 0; $i < 4; $i++) {
            $name = fake()->word();

            $foto = fake()->image(public_path($path), 640, 480, 'girl');
            Foto::query()->create([
                'judul' => $name,
                'deskripsi' => fake()->realTextBetween(10, 45),
                'path' => $foto,
                'user_id' => $user->id,
                'album_id' => $album->id,
            ]);
        }
    }
}
