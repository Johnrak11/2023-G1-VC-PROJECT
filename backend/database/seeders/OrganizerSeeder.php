<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrganizerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $organizers=[
            [
                'firstname'=>'chamreth',
                'lastname'=>'kosal',
                'address'=>'Oder Meanchey',
                'phone_number'=>'08888888888',
                'email'=>'chamreth@gmail.com',
                'password'=>'1111',
                'profile_picture'=>'aa',
                'role'=>'organizer',
            ],
            [
                'firstname'=>'Vanda',
                'lastname'=>'Sophol',
                'address'=>'Prey Veng',
                'phone_number'=>'0999999999',
                'email'=>'vanda@gmail.com',
                'password'=>'2222',
                'profile_picture'=>'bb',
                'role'=>'organizer',
            ],
            [
                'firstname'=>'Seingdav',
                'lastname'=>'Theoun',
                'address'=>'Bontey Meanchey',
                'phone_number'=>'077777777',
                'email'=>'seingdav@gmail.com',
                'password'=>'3333',
                'profile_picture'=>'cc',
                'role'=>'organizer',
            ],
            [
                'firstname'=>'Vorek',
                'lastname'=>'yun',
                'address'=>'Kep',
                'phone_number'=>'066666666',
                'email'=>'vorek@gmail.com',
                'password'=>'3333',
                'profile_picture'=>'dd',
                'role'=>'organizer',
            ],
            [
                'firstname'=>'Nit',
                'lastname'=>'Niem',
                'address'=>'Bontey Meanchey',
                'phone_number'=>'0555555555',
                'email'=>'nit@gmail.com',
                'password'=>'4444',
                'profile_picture'=>'ee',
                'role'=>'organizer',
            ],
       ];
       foreach ($organizers as $organizer){
        User::create($organizer);
    }
    }
}
