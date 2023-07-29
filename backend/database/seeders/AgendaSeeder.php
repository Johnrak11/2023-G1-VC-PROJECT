<?php

namespace Database\Seeders;

use App\Models\Agenda;
use Illuminate\Database\Seeder;

class AgendaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $agendas = [
            [
                'title' => 'Tech Simplified',
                'date' => '2023-08-01',
                'description' => 'Technology can be complex and intimidating, but it does not have to be. This title provides a simplified, easy-to-understand guide to technology.',
                'event_id'=> 1
            ],
            [
                'title' => 'Career Connections',
                'date' => '2023-09-15',
                'description' => 'A career fair is a valuable opportunity for job seekers to connect with potential employers and explore career options.',
                'event_id'=> 2
            ],
            [
                'title' => 'Tech Unleashed',
                'date' => '2023-10-20',
                'description' => 'Technology is changing the way we live and work at an unprecedented pace. This title explores the latest advancements in technology and how they are transforming our world.',
                'event_id'=> 1
            ],
            [
                'title' => 'Business Boost',
                'date' => '2023-11-05',
                'description' => 'A business conference is a valuable opportunity for professionals to network, learn and grow their skills and knowledge.',
                'event_id'=> 3
            ],
            [
                'title' => 'Rhythm of the World',
                'date' => '2023-12-10',
                'description' => 'A world music festival is a celebration of diverse cultures and sounds from around the globe. This title provides an exciting introduction to the world of music festivals, with a focus on the vibrant and eclectic world music scene.',
                'event_id'=> 4
            ],
            [
                'title' => ' Shredding Legends',
                'date' => '2023-09-01',
                'description' => 'The electric guitar has been an iconic instrument in the world of music for decades, and countless guitarists have risen to legendary status for their mastery of the instrument.',
                'event_id'=> 5
            ],
            [
                'title' => 'BTS Mania',
                'date' => '2023-10-01',
                'description' => 'BTS is one of the biggest and most popular K-pop groups in the world, known for their electrifying performances and catchy songs.',
                'event_id'=> 6
            ],
            [
                'title' => 'BTS Live Experience',
                'date' => '2023-07-29',
                'description' => 'BTS is a global sensation, known for their high-energy performances, stunning choreography, and chart-topping hits.',
                'event_id'=> 6
            ],
            [
                'title' => 'Groove Under the Stars',
                'date' => '2023-11-15',
                'description' => 'The Summer Nights Music Festival is a celebration of music, friends, and warm summer evenings',
                'event_id'=> 7
            ],
            [
                'title' => 'Smooth Jazz in the Open Air',
                'date' => '2023-12-22',
                'description' => 'Jazz in the Park is a beloved tradition that combines the beauty of nature with the soulful melodies of jazz music. ',
                'event_id'=> 8
            ],
            [
                'title' => 'Mastering Your Craft',
                'date' => '2023-08-15',
                'description' => 'A workshop is a valuable opportunity to learn new skills, gain knowledge and improve your craft.',
                'event_id'=> 9
            ],
            [
                'title' => 'The Thrill of Victory',
                'date' => '2023-09-10',
                'description' => 'Sports have been a beloved pastime for centuries, and they continue to captivate audiences around the world with their excitement and drama.',
                'event_id'=> 10
            ],
            [
                'title' => 'Boots, Bonfires, and Country Nights',
                'date' => '2023-10-15',
                'description' => ' Country Nights is a celebration of the music, culture, and lifestyle of country living.',
                'event_id'=> 11
            ],
            [
                'title' => 'The Beauty of Creativity',
                'date' => '2023-11-20',
                'description' => 'Art has been a form of human expression for thousands of years, and it continues to inspire and captivate audiences around the world with its beauty and creativity.',
                'event_id'=> 12
            ],
            [
                'title' => 'Country Nights',
                'date' => '2023-10-15',
                'description' => 'Country Nights is a celebration of all things country, from the music and dancing to the food and lifestyle',
                'event_id'=> 11
            ],
            [
                'title' => 'The Art of Expression',
                'date' => '2023-11-20',
                'description' => 'Art is a universal form of human expression that has been practiced for thousands of years, and continues to inspire and move people around the world. ',
                'event_id'=> 12
            ],
            [
                'title' => 'The Art of Negotiation',
                'date' => '2023-12-01',
                'description' => 'Negotiation is a critical skill in the world of business, and mastering it can lead to success in a variety of settings. ',
                'event_id'=> 13
            ],
            [
                'title' => 'The Entrepreneur is Journey',
                'date' => '2023-07-01',
                'description' => 'Starting a business is a dream for many people, but it can also be a daunting and challenging journey.',
                'event_id'=> 13
            ],
            [
                'title' => 'Product Training Session',
                'date' => '2023-08-20',
                'description' => 'Training session for customers on how to use new product features and updates',
                'event_id'=> 14
            ],
            [
                'title' => 'The Power of Play',
                'date' => '2023-09-25',
                'description' => 'Games have been a beloved pastime for centuries, and they continue to captivate audiences around the world with their entertainment and engagement. ',
                'event_id'=> 15
            ],
            [
                'title' => 'The Future of Technology',
                'date' => '2023-10-25',
                'description' => 'The world of technology is constantly evolving, and staying up-to-date on the latest developments is essential for anyone working in IT.',
                'event_id'=> 16
            ],
            [
                'title' => 'Gaming for Fun and Profit',
                'date' => '2023-09-25',
                'description' => 'Games have become a significant part of popular culture, providing entertainment, community, and opportunities for financial gain. ',
                'event_id'=> 15
            ],
            [
                'title' => 'Cybersecurity: Protecting Your Business',
                'date' => '2023-10-25',
                'description' => 'Cybersecurity is a critical issue for businesses of all sizes, and staying ahead of the threats can be a challenge.',
                'event_id'=> 16
            ],
            [
                'title' => 'Speak with Confidence',
                'date' => '2023-11-15',
                'description' => 'Public speaking is a valuable skill that can have a significant impact on your personal and professional life.',
                'event_id'=> 17
            ],
            [
                'title' => 'Sing Your Heart Out',
                'date' => '2023-12-05',
                'description' => 'Singing is a powerful form of self-expression and a beloved pastime for many people around the world.',
                'event_id'=> 18
            ],
            [
                'title' => 'The Rise of Esports',
                'date' => '2023-08-10',
                'description' => 'Esports has become a global phenomenon, with millions of fans and professional players around the world.',
                'event_id'=> 19
            ],
            [
                'title' => 'BTS: The Power of Music',
                'date' => '2023-12-05',
                'description' => 'BTS is a global sensation, known for their electrifying performances, catchy music, and inspiring messages of hope and resilience.',
                'event_id'=> 18
            ],
            [
                'title' => 'Becoming a Pro Gamer',
                'date' => '2023-08-10',
                'description' => 'Professional gaming has become a legitimate career path for many talented gamers around the world, with opportunities for fame, fortune, and success in the industry',
                'event_id'=> 19
            ],
            [
                'title' => 'Music to Nourish the Soul',
                'date' => '2023-09-01',
                'description' => 'Soulful Sessions is an immersive musical experience that combines the power of music with mindfulness and meditation techniques to create a transformative journey for the mind, body, and soul.',
                'event_id'=> 20
            ],
            [
                'title' => 'The Ultimate Gaming Convention',
                'date' => '2023-10-05',
                'description' => 'Game On is the ultimate gathering for gamers, providing an immersive experience that showcases the latest games, technologies, and trends in the industry.',
                'event_id'=> 22
            ],
            [
                'title' => 'The Soul of American Music',
                'date' => '2023-11-10',
                'description' => 'Rockin Blues is a celebration of the rich history and enduring legacy of blues music, a genre that has influenced countless musicians and shaped American music for generations.',
                'event_id'=> 23
            ],
            [
                'title' => 'Classical Masterpieces: The Timeless Beauty of Classical Music',
                'date' => '2023-12-15',
                'description' => 'Classical Masterpieces is a tribute to the enduring beauty and power of classical music, a genre that has captivated audiences for centuries and continues to inspire and move listeners around the world.',
                'event_id'=> 24
            ],
            [
                'title' => 'The Evolution of Rhythm and Blues',
                'date' => '2023-08-25',
                'description' => ' R&B Explosion is a celebration of the vibrant and evolving genre of rhythm and blues, which has been a cornerstone of American popular music for decades.',
                'event_id'=> 25
            ],
            [
                'title' => 'The Ultimate Celebration of Sound',
                'date' => '2023-09-30',
                'description' => 'Music Fest is the ultimate celebration of the power and beauty of music, bringing together fans and musicians from around the world for an unforgettable experience.',
                'event_id'=> 26
            ],
            [
                'title' => 'A Culinary Journey Around the World',
                'date' => '2023-10-30',
                'description' => 'Feast Fest is a celebration of the diverse and delicious world of food, bringing together foodies and chefs from around the world for an unforgettable culinary journey. ',
                'event_id'=> 27
            ],
            [
                'title' => 'The Art of Fashion',
                'date' => '2023-11-20',
                'description' => 'Runway Rendezvous is a celebration of the artistry and creativity of fashion, showcasing the latest trends and designs from the world is top designers and emerging talents.',
                'event_id'=> 28
            ],
            [
                'title' => ' The Ultimate Sports Tournament',
                'date' => '2023-12-05',
                'description' => 'Champions Clash is the ultimate sports tournament, bringing together the world is top athletes and teams for a thrilling competition that showcases the best of sports.',
                'event_id'=> 29
            ],
            [
                'title' => 'Exploring the World of Art Exhibitions',
                'date' => '2023-08-15',
                'description' => 'Artistry Unveiled is a journey into the world of art exhibitions, showcasing the latest works of art from the world is most celebrated artists and emerging talents.',
                'event_id'=> 30
            ],
            [
                'title' => 'Navigating Your Career Path',
                'date' => '2023-09-20',
                'description' => ' Future Focus is a career fair designed to help job seekers and professionals navigate their career path and explore new opportunities.',
                'event_id'=> 31
            ],
            [
                'title' => 'The Art of Film Festivals',
                'date' => '2023-10-10',
                'description' => 'Cinema Celebration is a tribute to the art of film festivals, showcasing the latest and greatest works of cinema from around the world.',
                'event_id'=> 32
            ],
        ];
        foreach ($agendas as $agenda) {
            Agenda::create($agenda);
        }
    
    }
}
