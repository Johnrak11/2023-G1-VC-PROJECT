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
        $ListEvents=[
            [
                'name'=>'chamreth',
                'description'=>'Hello I am a student at pnc',
                'date'=>'2023-07-08',
                'time'=>'3=>32=>00',
                'location'=>'Phnom Penh',
                'image'=>'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRoJBsIjRMDJdBK6QmlDiF1peqJGOwR8E_1Aw&usqp=CAU',
                'venue'=>"kakakakaka",
                'organizer_id'=>1,
                'category_id'=>1
                
            ],
            [
                'name'=>'chamreth',
                'description'=>'Hello I am a student at pnc',
                'date'=>'2023-07-08',
                'time'=>'3=>32=>00',
                'location'=>'Phnom Penh',
                'image'=>'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRoJBsIjRMDJdBK6QmlDiF1peqJGOwR8E_1Aw&usqp=CAU',
                'venue'=>"kokoko",
                'organizer_id'=>1,
                'category_id'=>2
                
            ],
            [
                'name'=>'chamreth',
                'description'=>'Hello I am a student at pnc',
                'date'=>'2023-07-08',
                'time'=>'3=>32=>00',
                'location'=>'Phnom Penh',
                'image'=>'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRoJBsIjRMDJdBK6QmlDiF1peqJGOwR8E_1Aw&usqp=CAU',
                'venue'=>"kikikiki",
                'organizer_id'=>1,
                'category_id'=>3
                
            ],
            [
                'name'=>'chamreth',
                'description'=>'Hello I am a student at pnc',
                'date'=>'2023-07-08',
                'time'=>'3=>32=>00',
                'location'=>'Phnom Penh',
                'image'=>'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRoJBsIjRMDJdBK6QmlDiF1peqJGOwR8E_1Aw&usqp=CAU',
                'venue'=>"kykyky",
                'organizer_id'=>1,
                'category_id'=>4
                
            ],
            [
                'name'=>'chamreth',
                'description'=>'Hello I am a student at pnc',
                'date'=>'2023-07-08',
                'time'=>'3=>32=>00',
                'location'=>'Phnom Penh',
                'image'=>'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRoJBsIjRMDJdBK6QmlDiF1peqJGOwR8E_1Aw&usqp=CAU',
                'venue'=>"kekeke",
                'organizer_id'=>1,
                'category_id'=>5
                
            ],
        ];
        foreach ($ListEvents as $ListEvent){
            Event::create($ListEvent);
        }
    }
}
