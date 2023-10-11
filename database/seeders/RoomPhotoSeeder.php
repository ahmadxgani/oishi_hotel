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
                'room_type_id'  => 1,
                'image'         => 'images\test.jpg'
            ],
            [
                'room_type_id'  => 1,
                'image'         => 'images\test.jpg'
            ],
            [
                'room_type_id'  => 1,
                'image'         => 'images\test.jpg'
            ],
            [
                'room_type_id'  => 2,
                'image'         => 'images\test.jpg'
            ],
            [
                'room_type_id'  => 2,
                'image'         => 'images\test.jpg'
            ],
            [
                'room_type_id'  => 2,
                'image'         => 'images\test.jpg'
            ],
            [
                'room_type_id'  => 3,
                'image'         => 'images\test.jpg'
            ],
            [
                'room_type_id'  => 3,
                'image'         => 'images\test.jpg'
            ],
            [
                'room_type_id'  => 3,
                'image'         => 'images\test.jpg'
            ],
        ];

        foreach($items as $item) {
            RoomPhoto::create($item);
        }
    }
}
