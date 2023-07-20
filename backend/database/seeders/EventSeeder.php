<?php

namespace Database\Seeders;

use App\Models\Event;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ListEvents = [
            [
                'name' => 'Technology Summit ',
                'description' => 'A gathering of industry leaders and experts to discuss the latest trends and innovations in technology.',
                'date' => '2023-11-12',
                'time' => '6:00:00',
                'location' => 'Order MeanChey',
                'image' => 'https://fiverr-res.cloudinary.com/images/t_main1,q_auto,f_auto,q_auto,f_auto/gigs/136585049/original/f290d43b0dd338d83267b3a9129fd5e28bdfd22d/design-eye-catching-banner-and-flyers.jpg',
                'venue' => "At Berng snuor",
                'organizer_id' => 4,
                'category_id' => 1,
                'is_public' => 1

            ],
            [
                'name' => 'Career Fair',
                'description' => 'An event where companies and organizations meet with job seekers to discuss potential employment opportunities.',
                'date' => '2023-12-12',
                'time' => '9:00:00',
                'location' => 'Banteay Meanchey',
                'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSGDMWL6GLR9r2o0RTHYLXWBDXs4aqrKirPoo-kZKUjctiNmyUI3tZchA8bBHkq7Ot4T2g&usqp=CAU',
                'venue' => "At Banteay Meanchey",
                'organizer_id' => 3,
                'category_id' => 4,
                'is_public' => 1

            ],
            [
                'name' => 'Business Conference',
                'description' => 'A gathering of professionals from a specific industry or field to discuss and exchange ideas on relevant topics.',
                'date' => '2023-10-12',
                'time' => '4:32:00',
                'location' => 'Batambong',
                'image' => 'https://img.freepik.com/premium-vector/music-event-banner-template-with-photo_52683-13693.jpg',
                'venue' => "At Batambong",
                'organizer_id' => 2,
                'category_id' => 1,
                'is_public' => 1

            ],
            [
                'name' => 'World Music Festival',
                'description' => ' Explore the rich diversity of world music with this exciting festival. Featuring a variety of international musicians and performers.',
                'date' => '2023-12-12',
                'time' => '4:32:00',
                'location' => 'Kep',
                'image' => 'https://img.freepik.com/premium-vector/music-event-banner-template-with-photo_52683-13693.jpg',
                'venue' => "On the beach",
                'organizer_id' => 4,
                'category_id' => 3,
                'is_public' => 1

            ],
            [
                'name' => 'Electric Guitar Gods',
                'description' => 'Witness the mastery of electric guitar with this electrifying concert. Featuring some of the most talented guitarists in the world.',
                'date' => '2024-07-08',
                'time' => '2:30:00',
                'location' => 'Phnom Penh',
                'image' => 'https://img.jakpost.net/c/2020/11/05/2020_11_05_106846_1604546091._large.jpg',
                'venue' => "At aeon",
                'organizer_id' => 2,
                'category_id' => 2,
                'is_public' => 1

            ],
            [
                'name' => 'Concert',
                'description' => 'Hello evryone plase join this concert',
                'date' => '2023-07-08',
                'time' => '3:32:00',
                'location' => 'Phnom Penh',
                'image' => 'https://img.jakpost.net/c/2020/11/05/2020_11_05_106846_1604546091._large.jpg',
                'venue' => "At WAT PHNOM",
                'organizer_id' => 1,
                'category_id' => 1,
                'is_public' => 1

            ],
            [
                'name' => 'Summer Nights Music Festival',
                'description' => 'Join us for an unforgettable night of music and entertainment under the stars. Featuring top artists and bands from around the world.',
                'date' => '2023-10-08',
                'time' => '8:30:00',
                'location' => 'Phnom Penh',
                'image' => 'https://img.jakpost.net/c/2020/11/05/2020_11_05_106846_1604546091._large.jpg',
                'venue' => "At WAT PHNOM",
                'organizer_id' => 4,
                'category_id' => 2,
                'is_public' => 1

            ],
            [
                'name' => 'Jazz in the Park',
                'description' => 'A weekend of smooth jazz, delicious food, and good company. Relax and unwind to the sounds of some of the best jazz musicians in the business',
                'date' => '2023-11-08',
                'time' => '6:00:00',
                'location' => 'Press Seyhanuk',
                'image' => 'https://img.jakpost.net/c/2020/11/05/2020_11_05_106846_1604546091._large.jpg',
                'venue' => "At the beach",
                'organizer_id' => 2,
                'category_id' => 2,
                'is_public' => 1

            ],
            [
                'name' => 'Workshop',
                'description' => 'At PNC has a workshop about Technology',
                'date' => '2023-08-09',
                'time' => '1:00:00',
                'location' => 'Phnom Penh',
                'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRoJBsIjRMDJdBK6QmlDiF1peqJGOwR8E_1Aw&usqp=CAU',
                'venue' => "At PNC",
                'organizer_id' => 1,
                'category_id' => 2,
                'is_public' => 1

            ],
            [
                'name' => 'Soprt',
                'description' => 'PNC students they are has football competition with EDM students',
                'date' => '2023-10-08',
                'time' => '2:30:00',
                'location' => 'Phnom Penh',
                'image' => 'https://fiverr-res.cloudinary.com/images/q_auto,f_auto/gigs/273906027/original/5554387306b011bdffb38446806a49cb06d9c57b/create-an-awesome-esports-tournament-gaming-banner-poster-and-event-flyer-d52e.jpg',
                'venue' => "At PSE",
                'organizer_id' => 2,
                'category_id' => 1,
                'is_public' => 1

            ],
            [
                'name' => 'Country Nights',
                'description' => 'Grab your cowboy boots and head on over to this country music extravaganza. Featuring a variety of country music artists and bands.',
                'date' => '2023-11-09',
                'time' => '1:30:00',
                'location' => 'Phnom Penh',
                'image' => 'https://fiverr-res.cloudinary.com/images/q_auto,f_auto/gigs/273906027/original/5554387306b011bdffb38446806a49cb06d9c57b/create-an-awesome-esports-tournament-gaming-banner-poster-and-event-flyer-d52e.jpg',
                'venue' => "At Rolyal Palase",
                'organizer_id' => 2,
                'category_id' => 1,
                'is_public' => 1

            ],
            [
                'name' => 'Art',
                'description' => 'Hello everyone do you want to join this event?',
                'date' => '2023-11-11',
                'time' => '4:00:00',
                'location' => 'Phnom Penh',
                'image' => 'https://fiverr-res.cloudinary.com/images/q_auto,f_auto/gigs/273906027/original/5554387306b011bdffb38446806a49cb06d9c57b/create-an-awesome-esports-tournament-gaming-banner-poster-and-event-flyer-d52e.jpg',
                'venue' => "In front of the Royal Palace",
                'organizer_id' => 2,
                'category_id' => 3,
                'is_public' => 1

            ],
            [
                'name' => 'Bussiness',
                'description' => 'It easy to create a business by your own',
                'date' => '2023-12-12',
                'time' => '11:00:00',
                'location' => 'Oder MeanChey Province',
                'image' => 'https://fiverr-res.cloudinary.com/images/q_auto,f_auto/gigs/273906027/original/5554387306b011bdffb38446806a49cb06d9c57b/create-an-awesome-esports-tournament-gaming-banner-poster-and-event-flyer-d52e.jpg',
                'venue' => "At Berng Snour",
                'organizer_id' => 3,
                'category_id' => 2,
                'is_public' => 1
            ],
            [
                'name' => 'Electric Dreams',
                'description' => ' Immerse yourself in the world of electronic music with this electrifying concert. Featuring top DJs and electronic music producers.',
                'date' => '2023-11-12',
                'time' => '10:00:00',
                'location' => 'Kompong Cham',
                'image' => 'https://fiverr-res.cloudinary.com/images/q_auto,f_auto/gigs/273906027/original/5554387306b011bdffb38446806a49cb06d9c57b/create-an-awesome-esports-tournament-gaming-banner-poster-and-event-flyer-d52e.jpg',
                'venue' => "At city",
                'organizer_id' => 2,
                'category_id' => 2,
                'is_public' => 1
            ],
            [
                'name' => 'Game',
                'description' => 'Join now',
                'date' => '2024-01-10',
                'time' => '9:00:00',
                'location' => 'TaKao Province',
                'image' => 'https://fiverr-res.cloudinary.com/images/q_auto,f_auto/gigs/273906027/original/5554387306b011bdffb38446806a49cb06d9c57b/create-an-awesome-esports-tournament-gaming-banner-poster-and-event-flyer-d52e.jpg',
                'venue' => "At Takao",
                'organizer_id' => 4,
                'category_id' => 2,
                'is_public' => 1

            ],
            [
                'name' => 'IT event',
                'description' => 'For IT students',
                'date' => '2024-02-02',
                'time' => '8:00:00',
                'location' => 'Kompong Tom Province',
                'image' => 'https://img.freepik.com/premium-psd/esports-event-social-media-banner-template_202605-313.jpg',
                'venue' => "At Kompong Tom",
                'organizer_id' => 5,
                'category_id' => 3,
                'is_public' => 1

            ],
            [
                'name' => 'public speaking',
                'description' => 'Please join this event all together',
                'date' => '2024-03-02',
                'time' => '1:00:00',
                'location' => 'Batambong Province',
                'image' => 'https://img.freepik.com/premium-vector/game-day-esports-gaming-post-banner-template-social-media-with-esports-logo_126068-396.jpg?w=2000',
                'venue' => "At Batambong",
                'organizer_id' => 4,
                'category_id' => 3,
                'is_public' => 1

            ],
            [
                'name' => 'Sing a Song',
                'description' => 'It very enjoy if you join this event',
                'date' => '2024-05-02',
                'time' => '12:00:00',
                'location' => 'kep Province',
                'image' => 'https://img.freepik.com/free-vector/flat-design-leaves-art-exhibition-facebook-template_23-2149481815.jpg?w=2000',
                'venue' => "At Kep",
                'organizer_id' => 3,
                'category_id' => 2,
                'is_public' => 1

            ],
            [
                'name' => 'Esport',
                'description' => 'Meeting with Esport in the United States for Enterprise Development.',
                'date' => '2024-07-02',
                'time' => '7:00:00',
                'location' => 'Phnom Penh',
                'image' => 'https://img.freepik.com/free-vector/flat-design-leaves-art-exhibition-facebook-template_23-2149481815.jpg?w=2000',
                'venue' => "Aeon",
                'organizer_id' => 3,
                'category_id' => 6,
                'is_public' => 1

            ],
            [
                'name' => 'Soulful Sessions',
                'description' => 'Feel the music in your soul with this unforgettable soul music concert. Featuring some of the most talented soul singers and musicians.',
                'date' => '2023-09-02',
                'time' => '7:00:00',
                'location' => 'Phnom Penh',
                'image' => 'https://img.freepik.com/free-vector/flat-design-leaves-art-exhibition-facebook-template_23-2149481815.jpg?w=2000',
                'venue' => "Aeon",
                'organizer_id' => 3,
                'category_id' => 6,
                'is_public' => 1

            ],
            [
                'name' => 'Soulful Blues Fest',
                'description' => 'Get ready to feel the blues with this soulful and powerful concert. Featuring some of the best blues musicians in the business.',
                'date' => '2023-10-02',
                'time' => '4:00:00',
                'location' => 'kandal',
                'image' => 'https://img.freepik.com/free-vector/flat-design-leaves-art-exhibition-facebook-template_23-2149481815.jpg?w=2000',
                'venue' => "kandal",
                'organizer_id' => 3,
                'category_id' => 1,
                'is_public' => 1

            ],
            [
                'name' => 'Gaming Convention',
                'description' => 'An event focused on video and tabletop gaming, often featuring tournaments, demos, and panel discussions.',
                'date' => '2023-9-02',
                'time' => '4:00:00',
                'location' => 'Phnom Penh',
                'image' => 'https://img.freepik.com/free-vector/flat-design-leaves-art-exhibition-facebook-template_23-2149481815.jpg?w=2000',
                'venue' => "kaoh pech",
                'organizer_id' => 2,
                'category_id' => 2,
                'is_public' => 1

            ],
            [
                'name' => 'Rockin Blues',
                'description' => 'Let the blues wash over you with this soulful and powerful concert. Featuring some of the best blues musicians in the business.',
                'date' => '2023-12-02',
                'time' => '4:00:00',
                'location' => 'Phnom Penh',
                'image' => 'https://img.freepik.com/free-vector/flat-design-leaves-art-exhibition-facebook-template_23-2149481815.jpg?w=2000',
                'venue' => "Olympic",
                'organizer_id' => 3,
                'category_id' => 3,
                'is_public' => 1

            ],
            [
                'name' => ' Classical Masterpieces',
                'description' => ' Enjoy an evening of classical music with some of the most talented musicians in the world. Featuring performances of some of the greatest classical works ever written.',
                'date' => '2023-08-12',
                'time' => '5:00:00',
                'location' => 'Phnom Penh',
                'image' => 'https://img.freepik.com/free-vector/flat-design-leaves-art-exhibition-facebook-template_23-2149481815.jpg?w=2000',
                'venue' => "Olympic",
                'organizer_id' => 5,
                'category_id' => 1,
                'is_public' => 1

            ],
            [
                'name' => 'R&B Explosion',
                'description' => 'Get ready for a night of soulful R&B music with this explosive concert. Featuring some of the biggest names in the R&B music scene.',
                'date' => '2023-07-30',
                'time' => '5:30:00',
                'location' => 'Kandal',
                'image' => 'https://img.freepik.com/free-vector/flat-design-leaves-art-exhibition-facebook-template_23-2149481815.jpg?w=2000',
                'venue' => "At kandal",
                'organizer_id' => 5,
                'category_id' => 1,
                'is_public' => 1

            ],
            [
                'name' => 'Music Festival',
                'description' => 'A festival featuring live music performances from local and international artists.',
                'date' => '2023-08-20',
                'time' => '16:00:00',
                'location' => 'Koh Pich',
                'image' => 'https://img.freepik.com/free-vector/flat-design-leaves-art-exhibition-facebook-template_23-2149481815.jpg?w=2000',
                'venue' => "At Koh Pich Convention and Exhibition Center",
                'organizer_id' => 1,
                'category_id' => 2,
                'is_public' => 1
            ],
            [
                'name' => 'Food Expo',
                'description' => 'A showcase of the latest food products and culinary innovations from around the world.',
                'date' => '2023-09-05',
                'time' => '10:00:00',
                'location' => 'Diamond Island',
                'image' => 'https://img.freepik.com/free-vector/flat-design-leaves-art-exhibition-facebook-template_23-2149481815.jpg?w=2000',
                'venue' => "At Diamond Island Convention and Exhibition Center",
                'organizer_id' => 2,
                'category_id' => 3,
                'is_public' => 1
            ],
            [
                'name' => 'Fashion Show',
                'description' => 'A showcase of the latest fashion trends and designs from local and international designers.',
                'date' => '2023-10-15',
                'time' => '19:00:00',
                'location' => 'Sovanna Shopping Center',
                'image' => 'https://img.freepik.com/free-vector/flat-design-leaves-art-exhibition-facebook-template_23-2149481815.jpg?w=2000',
                'venue' => "At Sovanna Shopping Center",
                'organizer_id' => 3,
                'category_id' => 4,
                'is_public' => 1
            ],
            [
                'name' => 'Sports Tournament',
                'description' => 'A tournament featuring various sports such as football, basketball, and volleyball.',
                'date' => '2023-07-29',
                'time' => '13:00:00',
                'location' => 'National Olympic Stadium',
                'image' => 'https://img.freepik.com/free-vector/flat-design-leaves-art-exhibition-facebook-template_23-2149481815.jpg?w=2000',
                'venue' => "At National Olympic Stadium",
                'organizer_id' => 5,
                'category_id' => 5,
                'is_public' => 1
            ],
            [
                'name' => 'Art Exhibition',
                'description' => 'An exhibition featuring various forms of art such as paintings, sculptures, and installations.',
                'date' => '2023-12-08',
                'time' => '11:00:00',
                'location' => 'National Museum of Cambodia',
                'image' => 'https://img.freepik.com/free-vector/flat-design-leaves-art-exhibition-facebook-template_23-2149481815.jpg?w=2000',
                'venue' => "At National Museum of Cambodia",
                'organizer_id' => 5,
                'category_id' => 2,
                'is_public' => 1
            ],
            [
                'name' => 'Career Fair',
                'description' => 'A fair featuring various job opportunities and career advice from local and international companies.',
                'date' => '2023-11-01',
                'time' => '9:00:00',
                'location' => 'Phnom Penh Hotel',
                'image' => 'https://img.freepik.com/free-vector/flat-design-leaves-art-exhibition-facebook-template_23-2149481815.jpg?w=2000',
                'venue' => "At Phnom Penh Hotel",
                'organizer_id' => 1,
                'category_id' => 1,
                'is_public' => 1
            ],
            [
                'name' => 'Film Festival',
                'description' => 'A festival featuring the latest films from local and international filmmakers.',
                'date' => '2023-10-25',
                'time' => '18:00:00',
                'location' => 'Major Cineplex',
                'image' => 'https://img.freepik.com/free-vector/flat-design-leaves-art-exhibition-facebook-template_23-2149481815.jpg?w=2000',
                'venue' => "At Major Cineplex",
                'organizer_id' => 2,
                'category_id' => 2,
                'is_public' => 1
            ],
            [
                'name' => 'Charity Auction',
                'description' => 'An auction featuring various items donated by local and international celebrities and businesses to raise funds for charity.',
                'date' => '2023-11-05',
                'time' => '17:00:00',
                'location' => 'Raffles Hotel Le Royal',
                'image' => 'https://s3.amazonaws.com/thumbnails.venngage.com/template/d91f871a-b814-4e74-aa42-c0b1abeb21aa.png',
                'venue' => "At Raffles Hotel Le Royal",
                'organizer_id' => 3,
                'category_id' => 3,
                'is_public' => 1
            ],
            [
                'name' => 'Tech Conference',
                'description' => 'A conference featuring talks and presentations from industry experts on the latest technology trends and innovations.',
                'date' => '2023-09-15',
                'time' => '8:00:00',
                'location' => 'Sofitel Phnom Penh Phokeethra',
                'image' => 'https://s3.amazonaws.com/thumbnails.venngage.com/template/d91f871a-b814-4e74-aa42-c0b1abeb21aa.png',
                'venue' => "At Sofitel Phnom Penh Phokeethra",
                'organizer_id' => 4,
                'category_id' => 4,
                'is_public' => 1
            ],
            [
                'name' => 'Dance Competition',
                'description' => 'A competition featuring various dance styles such as ballet, contemporary, and hip hop.',
                'date' => '2023-08-27',
                'time' => '14:00:00',
                'location' => 'Chaktomuk Theater',
                'image' => 'https://s3.amazonaws.com/thumbnails.venngage.com/template/d91f871a-b814-4e74-aa42-c0b1abeb21aa.png',
                'venue' => "At Chaktomuk Theater",
                'organizer_id' => 5,
                'category_id' => 5,
                'is_public' => 1
            ],
            [
                'name' => 'Photography Exhibition',
                'description' => 'An exhibition featuring the works of local and international photographers.',
                'date' => '2023-10-10',
                'time' => '12:00:00',
                'location' => 'Bophana Center',
                'image' => 'https://s3.amazonaws.com/thumbnails.venngage.com/template/d91f871a-b814-4e74-aa42-c0b1abeb21aa.png',
                'venue' => "At Bophana Center",
                'organizer_id' => 1,
                'category_id' => 2,
                'is_public' => 1
            ],
            [
                'name' => 'Health Expo',
                'description' => 'A showcase of the latest health products and services from local and international companies.',
                'date' => '2023-11-18',
                'time' => '10:00:00',
                'location' => 'Koh Pich',
                'image' => 'https://s3.amazonaws.com/thumbnails.venngage.com/template/d91f871a-b814-4e74-aa42-c0b1abeb21aa.png',
                'venue' => "At Koh Pich Convention and Exhibition Center",
                'organizer_id' => 1,
                'category_id' => 1,
                'is_public' => 1
            ],
            [
                'name' => 'Culinary Competition',
                'description' => 'A competition featuring various culinary styles such as Khmer cuisine, French cuisine, and Japanese cuisine.',
                'date' => '2023-09-22',
                'time' => '15:00:00',
                'location' => 'The Place Restaurant',
                'image' => 'https://s3.amazonaws.com/thumbnails.venngage.com/template/d91f871a-b814-4e74-aa42-c0b1abeb21aa.png',
                'venue' => "At The Place Restaurant",
                'organizer_id' => 2,
                'category_id' => 2,
                'is_public' => 1
            ],
            [
                'name' => 'Startup Pitch Competition',
                'description' => 'A competition for early stage startups to pitch their business ideas to a panel of judges and potential investors.',
                'date' => '2023-10-05',
                'time' => '9:00:00',
                'location' => 'Raintree Cambodia',
                'image' => 'https://s3.amazonaws.com/thumbnails.venngage.com/template/d91f871a-b814-4e74-aa42-c0b1abeb21aa.png',
                'venue' => "At Raintree Cambodia",
                'organizer_id' => 3,
                'category_id' => 3,
                'is_public' => 1
            ],
            [
                'name' => 'Literature Festival',
                'description' => 'A festival featuring talks and readings from local and international authors and poets.',
                'date' => '2023-12-01',
                'time' => '11:00:00',
                'location' => 'FCC Angkor',
                'image' => 'https://cdn.dribbble.com/users/15617/screenshots/6400465/screenshot_1x.jpg',
                'venue' => "At FCC Angkor",
                'organizer_id' => 4,
                'category_id' => 4,
                'is_public' => 1
            ],
            [
                'name' => 'Environmental Exhibition',
                'description' => 'An exhibition featuring the latest environmental products and services from local and international companies.',
                'date' => '2023-11-08',
                'time' => '10:00:00',
                'location' => 'Koh Pich',
                'image' => 'https://cdn.dribbble.com/users/15617/screenshots/6400465/screenshot_1x.jpg',
                'venue' => "At Koh Pich Convention and Exhibition Center",
                'organizer_id' => 5,
                'category_id' => 5,
                'is_public' => 1
            ],
            [
                'name' => 'Art Auction',
                'description' => 'An auction featuring various artworks donated by local and international artists to raise funds for charity.',
                'date' => '2023-12-03',
                'time' => '18:00:00',
                'location' => 'Sofitel Phnom Penh Phokeethra',
                'image' => 'https://cdn.dribbble.com/users/15617/screenshots/6400465/screenshot_1x.jpg',
                'venue' => "At Sofitel Phnom Penh Phokeethra",
                'organizer_id' => 3,
                'category_id' => 5,
                'is_public' => 1
            ],
        ];
        foreach ($ListEvents as $ListEvent) {
            Event::create($ListEvent);
        }
    }
}
