<?php

namespace Database\Seeders;

use App\Models\Facility;
use Illuminate\Database\Seeder;

class FacilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $facilities = [
            [
                'name' => 'Meeting Room',
                'description' => "Welcome to our state-of-the-art Meeting Room, where collaboration meets comfort. Our spacious and well-equipped meeting space is designed to inspire productivity and creativity. With modern amenities, ergonomic seating, and a professional atmosphere, it's the perfect setting for important discussions, presentations, and brainstorming sessions. Whether you're hosting a client meeting, team gathering, or strategic planning session, our Meeting Room provides the ideal environment to make your meetings both efficient and enjoyable.",
            ],
            [
                'name' => 'Swimming Pool',
                'description' => "Indulge in pure relaxation and aquatic bliss at our exquisite swimming pool. Dive into crystal-clear waters that invite you to escape the daily hustle and refresh your body and soul. Whether you're seeking a leisurely swim, a place to soak up the sun, or a fun family gathering spot, our swimming pool is the perfect oasis. With its inviting ambiance and pristine surroundings, it's the ultimate destination for rejuvenation and creating unforgettable memories.",
            ],
        ];

        foreach($facilities as $facility) {
            Facility::create($facility);
        }
    }
}
