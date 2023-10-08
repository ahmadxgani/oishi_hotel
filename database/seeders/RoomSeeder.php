<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        for ($i=1; $i <= 500; $i++) {
            Room::create([
                'no_room' => $i,
                'type_room_id' => rand(1, 3)
            ]);
        }

    }
}
