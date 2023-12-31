<?php

namespace Database\Seeders;

use App\Models\Event_detail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $eventDetails = [
            [
                'available_ticket' => 100,
                'description' => 'Extreme sports competition featuring top athletes from around the world',
                'price' => 'free',
                'event_id' => 1,
            ],
            [
                'available_ticket' => 50,
                'description' => 'Premiere independent film festival showcasing innovative and thought-provoking cinema',
                'price' => '25$',
                'event_id' => 2,
            ],
            [
                'available_ticket' => 200,
                'description' => 'Annual exhibition basketball game featuring the top players from the NBA',
                'price' => 'free',
                'event_id' => 3,
            ],
            [
                'available_ticket' => 200,
                'description' => 'Celebration of music, film, and interactive media featuring thousands of artists and performers',
                'price' => '5$',
                'event_id' => 4,
            ],
            [
                'available_ticket' => 100,
                'description' => 'Annual music and arts festival featuring a diverse lineup of popular and up-and-coming artists',
                'price' => '25$',
                'event_id' => 5,
            ],
            [
                'available_ticket' => 500,
                'description' => 'World-renowned film festival featuring premieres of international cinema',
                'price' => 'free',
                'event_id' => 6,
            ],
            [
                'available_ticket' => 100,
                'description' => 'Annual club football competition featuring the top teams from across Europe',
                'price' => '200$',
                'event_id' => 7,
            ],
            [
                'available_ticket' => 200,
                'description' => 'Annual tennis tournament featuring the top players from around the world',
                'price' => '50$',
                'event_id' => 8,
            ],
            [
                'available_ticket' => 500,
                'description' => 'Annual convention celebrating comic books, science fiction, and pop culture',
                'price' => '75$',
                'event_id' => 9,
            ],
            [
                'available_ticket' => 100,
                'description' => 'Annual tennis tournament featuring the top players from around the world',
                'price' => '15$',
                'event_id' => 10,
            ],
            [
                'available_ticket' => 500,
                'description' => 'Annual beer festival featuring traditional Bavarian food and live music',
                'price' => '10$',
                'event_id' => 11,
            ],
            [
                'available_ticket' => 500,
                'description' => 'Annual convention celebrating comic books, science fiction, and pop culture',
                'price' => 'free',
                'event_id' => 12,
            ],
            [
                'available_ticket' => 200,
                'description' => 'Annual beer festival featuring traditional Bavarian food and live music',
                'price' => '10$',
                'event_id' => 13,
            ],
            [
                'available_ticket' => 100,
                'description' => 'Annual convention celebrating comic books, science fiction, and pop culture',
                'price' => 'free',
                'event_id' => 14,
            ],
            [
                'available_ticket' => 200,
                'description' => 'Annual beer festival featuring traditional Bavarian food and live music',
                'price' => '5$',
                'event_id' => 15,
            ],
            [
                'available_ticket' => 300,
                'description' => 'Annual convention celebrating comic books, science fiction, and pop culture',
                'price' => '8$',
                'event_id' => 16,
            ],
            [
                'available_ticket' => 120,
                'description' => 'Annual beer festival featuring traditional Bavarian food and live music',
                'price' => '12$',
                'event_id' => 17,
            ],
            [
                'available_ticket' => 230,
                'description' => 'Annual convention celebrating comic books, science fiction, and pop culture',
                'price' => 'free',
                'event_id' => 18,
            ],
            [
                'available_ticket' => 30,
                'description' => 'Annual beer festival featuring traditional Bavarian food and live music',
                'price' => '9$',
                'event_id' => 19,
            ],
            [
                'available_ticket' => 200,
                'description' => 'Annual convention celebrating comic books, science fiction, and pop culture',
                'price' => '13$',
                'event_id' => 20,
            ],
            [
                'available_ticket' => 500,
                'description' => 'Celebration of music, film, and interactive media featuring thousands of artists and performers',
                'price' => '4$',
                'event_id' => 21,
            ],
            [
                'available_ticket' => 500,
                'description' => 'World-renowned film festival featuring premieres of international cinema',
                'price' => 'free',
                'event_id' => 22,
            ],
            [
                'available_ticket' => 500,
                'description' => 'Celebration of music, film, and interactive media featuring thousands of artists and performers',
                'price' => '10$',
                'event_id' => 23,
            ],
            [
                'available_ticket' => 50,
                'description' => 'World-renowned film festival featuring premieres of international cinema',
                'price' => 'free',
                'event_id' => 24,
            ],
            [
                'available_ticket' => 100,
                'description' => 'Celebration of music, film, and interactive media featuring thousands of artists and performers',
                'price' => '10$',
                'event_id' => 25,
            ],
            [
                'available_ticket' => 30,
                'description' => 'World-renowned film festival featuring premieres of international cinema',
                'price' => 'free',
                'event_id' => 26,
            ],
            [
                'available_ticket' => 20,
                'description' => 'Celebration of music, film, and interactive media featuring thousands of artists and performers',
                'price' => '11$',
                'event_id' => 27,
            ],
            [
                'available_ticket' => 100,
                'description' => 'Celebration of music, film, and interactive media featuring thousands of artists and performers',
                'price' => '5$',
                'event_id' => 28,
            ],
            [
                'available_ticket' => 600,
                'description' => 'Celebration of music, film, and interactive media featuring thousands of artists and performers',
                'price' => '5$',
                'event_id' => 29,
            ],
            [
                'available_ticket' => 700,
                'description' => 'Celebration of music, film, and interactive media featuring thousands of artists and performers',
                'price' => '5$',
                'event_id' => 30,
            ],
            [
                'available_ticket' => 800,
                'description' => 'Celebration of music, film, and interactive media featuring thousands of artists and performers',
                'price' => '5$',
                'event_id' => 31,
            ],
            [
                'available_ticket' => 10,
                'description' => 'Celebration of music, film, and interactive media featuring thousands of artists and performers',
                'price' => '5$',
                'event_id' => 32,
            ],
            [
                'available_ticket' => 500,
                'description' => 'Celebration of music, film, and interactive media featuring thousands of artists and performers',
                'price' => '4$',
                'event_id' => 33,
            ],
            [
                'available_ticket' => 500,
                'description' => 'World-renowned film festival featuring premieres of international cinema',
                'price' => 'free',
                'event_id' => 34,
            ],
            [
                'available_ticket' => 500,
                'description' => 'Celebration of music, film, and interactive media featuring thousands of artists and performers',
                'price' => '10$',
                'event_id' => 35,
            ],
            [
                'available_ticket' => 500,
                'description' => 'Annual beer festival featuring traditional Bavarian food and live music',
                'price' => '10$',
                'event_id' => 36,
            ],
            [
                'available_ticket' => 500,
                'description' => 'Annual convention celebrating comic books, science fiction, and pop culture',
                'price' => 'free',
                'event_id' => 37,
            ],
            [
                'available_ticket' => 200,
                'description' => 'Annual beer festival featuring traditional Bavarian food and live music',
                'price' => '10$',
                'event_id' => 38,
            ],
            [
                'available_ticket' => 100,
                'description' => 'Annual convention celebrating comic books, science fiction, and pop culture',
                'price' => 'free',
                'event_id' => 39,
            ],
            [
                'available_ticket' => 200,
                'description' => 'Annual beer festival featuring traditional Bavarian food and live music',
                'price' => '5$',
                'event_id' => 40,
            ],
            [
                'available_ticket' => 100,
                'description' => 'Annual convention celebrating comic books, science fiction, and pop culture',
                'price' => 'free',
                'event_id' => 41,
            ],
            [
                'available_ticket' => 200,
                'description' => 'Annual beer festival featuring traditional Bavarian food and live music',
                'price' => '5$',
                'event_id' => 42,
            ],

        ];

        foreach ($eventDetails as $eventDetail) {
            Event_detail::create($eventDetail);
        }
    }
}
