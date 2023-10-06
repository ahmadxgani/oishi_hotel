<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeRoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('type_rooms')->insert(
            [
                'name' => 'Superior Twin',
                'description' => "Experience the ultimate comfort and space with our Superior Twin rooms. Designed for those who appreciate both style and functionality, these rooms offer a perfect blend of modern amenities and contemporary design. Whether you're traveling with a friend or family member, our Superior Twin rooms provide two comfortable twin beds, ensuring a peaceful night's sleep. Enjoy the elegant decor and thoughtful touches that make your stay truly memorable, while also relishing in the convenience of our well-appointed facilities. Discover relaxation and convenience at its finest in our Superior Twin rooms.",
                'publish_rate' => 350000
            ],
            [
                'name' => 'Deluxe King',
                'description' => "Experience the epitome of luxury and comfort in our Deluxe King room. Unwind in spacious elegance as you indulge in the plush amenities and modern conveniences of this exquisite accommodation. With a generously sized king bed, a tastefully designed interior, and a range of thoughtful extras, our Deluxe King room is the perfect retreat for those seeking a superior stay. Whether you're here for business or leisure, this room offers a haven of relaxation and style that will exceed your expectations.",
                'publish_rate' => 250000
            ],
            [
                'name' => 'Superior King',
                'description' => "Experience unparalleled luxury and comfort in our Superior King rooms. These elegantly appointed accommodations offer spacious interiors, a king-sized bed fit for royalty, and a host of modern amenities to ensure your stay is nothing short of extraordinary. Whether you're here for business or leisure, our Superior King rooms provide the perfect sanctuary for relaxation and rejuvenation.",
                'publish_rate' => 550000
            ],
        );
    }
}
