<?php

namespace Database\Seeders;

use App\Models\Ticket;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tickets= [
           [
            'ticket_code'=>'A1B2C3D4',
            'booking_date'=>'2023-07-18',
            'is_check_in'=>0,
            'user_id'=>1,
            'event_id'=>1,
           ],
           [
            'ticket_code'=>'09876543',
            'booking_date'=>'2023-07-18',
            'is_check_in'=>0,
            'user_id'=>1,
            'event_id'=>1,
           ],
           [
            'ticket_code'=>'EFGHIJKL',
            'booking_date'=>'2023-07-18',
            'is_check_in'=>0,
            'user_id'=>1,
            'event_id'=>1,
           ],
           [
            'ticket_code'=>'TKT12345',
            'booking_date'=>'2023-07-18',
            'is_check_in'=>0,
            'user_id'=>1,
            'event_id'=>1,
           ],    
        ];
        foreach($tickets as $ticket){
            Ticket::create($ticket);
        }
    }
}
