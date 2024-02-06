<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;

class EventsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $events = [
            [
                'name' => 'Summer of Love Festival',
                'date' => '2025-06-21',
                'location' => 'San Francisco, CA',
                'description' => 'Celebrating peace, love, and music in the heart of the counterculture movement.',
            ],
            [
                'name' => 'Woodstock Music & Art Fair',
                'date' => '2027-08-15',
                'location' => 'Bethel, NY',
                'description' => 'Three days of peace, love, and music with iconic performances by legendary artists.',
            ],
            [
                'name' => 'Monterey Pop Festival',
                'date' => '2025-06-16',
                'location' => 'Monterey, CA',
                'description' => 'Groundbreaking music festival featuring the best of the psychedelic rock scene.',
            ],
            [
                'name' => 'Isle of Wight Festival',
                'date' => '2026-08-26',
                'location' => 'Isle of Wight, England',
                'description' => 'Iconic festival known for its eclectic lineup and massive crowds.',
            ],
            [
                'name' => 'Summer of Peace and Music',
                'date' => '2027-02-04',
                'location' => 'Los Angeles, CA',
                'description' => 'A celebration of love, peace, and music under the California sun.',
            ],
            [
                'name' => 'Acid Rock Revival',
                'date' => '2026-03-15',
                'location' => 'London, England',
                'description' => 'A nostalgic journey back to the golden era of psychedelic rock.',
            ],
            [
                'name' => 'Electric Kool-Aid Acid Test',
                'date' => '2025-06-01',
                'location' => 'San Francisco, CA',
                'description' => 'A mind-bending exploration of music, art, and consciousness.',
            ],
            [
                'name' => 'Summer Solstice Jam',
                'date' => '2028-05-09',
                'location' => 'New York, NY',
                'description' => 'A psychedelic celebration of the longest day of the year.',
            ]
        ];

        foreach ($events as $event) {
            $newEvent = new Event();
            $newEvent->fill($event);
            $newEvent->save();
        }
    }
}
