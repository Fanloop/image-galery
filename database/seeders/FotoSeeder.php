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
        $user = User::query()->find('9b91e38b-9cae-417e-9e9a-41da184669e1');
        $album = Album::query()->find('9b91e3d3-953d-4f6d-af17-6287d79f0ae7');
        $path = 'storage/' . $user->id . '/' . $album->nama;

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
