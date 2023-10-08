<?php

namespace Database\Seeders;

use App\Models\RoomPhoto;
use Illuminate\Database\Seeder;

class RoomPhotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /** TODO: replace with coresponding and variant assets */
        $items = [
            [
                'type_room_id'  => 1,
                'image'         => 'public\images\test.jpg'
            ],
            [
                'type_room_id'  => 1,
                'image'         => 'public\images\test.jpg'
            ],
            [
                'type_room_id'  => 1,
                'image'         => 'public\images\test.jpg'
            ],
            [
                'type_room_id'  => 2,
                'image'         => 'public\images\test.jpg'
            ],
            [
                'type_room_id'  => 2,
                'image'         => 'public\images\test.jpg'
            ],
            [
                'type_room_id'  => 2,
                'image'         => 'public\images\test.jpg'
            ],
            [
                'type_room_id'  => 3,
                'image'         => 'public\images\test.jpg'
            ],
            [
                'type_room_id'  => 3,
                'image'         => 'public\images\test.jpg'
            ],
            [
                'type_room_id'  => 3,
                'image'         => 'public\images\test.jpg'
            ],
        ];

        foreach($items as $item) {
            RoomPhoto::create($item);
        }
    }
}
