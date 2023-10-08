<?php

namespace Database\Seeders;

use App\Models\FacilityPhoto;
use Illuminate\Database\Seeder;

class FacilityPhotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /** TODO: replace with coresponding and variant assets */
        $items = [
            [
                'facility_id'  => 1,
                'image'         => 'images\test_2.jpg'
            ],
            [
                'facility_id'  => 1,
                'image'         => 'images\test_2.jpg'
            ],
            [
                'facility_id'  => 1,
                'image'         => 'images\test_2.jpg'
            ],
            [
                'facility_id'  => 2,
                'image'         => 'images\test_2.jpg'
            ],
            [
                'facility_id'  => 2,
                'image'         => 'images\test_2.jpg'
            ],
            [
                'facility_id'  => 2,
                'image'         => 'images\test_2.jpg'
            ],
        ];

        foreach($items as $item) {
            FacilityPhoto::create($item);
        }
    }
}
