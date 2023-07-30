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
        $organizers = [
            [
                'firstname' => 'Chamreth',
                'lastname' => 'Kosal',
                'address' => 'Oder Meanchey',
                'phone_number' => '0882771621',
                'email' => 'chamreth.kosal@gmail.com',
                'password' => '@123456789',
                'role' => 'admin',
            ],
            [
                'firstname' => 'Vanda',
                'lastname' => 'Sophol',
                'address' => 'Prey Veng',
                'phone_number' => '0972875612',
                'email' => 'vanda.sophol@gmail.com',
                'password' => '@123456789',
                'role' => 'admin',
            ],
            [
                'firstname' => 'Seingdav',
                'lastname' => 'Theoun',
                'address' => 'Bontey Meanchey',
                'phone_number' => '0713075462',
                'email' => 'seingdav.theoun@gmail.com',
                'password' => '@123456789',
                'role' => 'admin',
            ],
            [
                'firstname' => 'Vorek',
                'lastname' => 'Yun',
                'address' => 'Kep',
                'phone_number' => '0882617724',
                'email' => 'vorek.yun@gmail.com',
                'password' => '@123456789',
                'role' => 'admin',
            ],
            [
                'firstname' => 'Nit',
                'lastname' => 'Niem',
                'address' => 'Bontey Meanchey',
                'phone_number' => '0977465211',
                'email' => 'nit.niem@gmail.com',
                'password' => '@123456789',
                'role' => 'admin'
            ],
            [
                'firstname' => 'Admin',
                'lastname' => 'Eventpeak',
                'address' => 'Bontey Meanchey',
                'phone_number' => '0977465211',
                'email' => 'admin@gmail.com',
                'password' => '@123456789',
                'role' => 'admin'
            ]
        ];
        foreach ($organizers as $organizer) {
            User::create($organizer);
        }
    }
}
