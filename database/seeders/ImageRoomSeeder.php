<?php

namespace Database\Seeders;

use App\Models\ImageRoom;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
class ImageRoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ImageRoom::create([
            'room_id' => 1,
            'image' => 'Beach',
        ]);
        ImageRoom::create([
            'room_id' => '1',
            'image' => 'Beach',
        ]);
        ImageRoom::create([
            'room_id' => 1,
            'image' => 'Beach',
        ]);
    }
}
