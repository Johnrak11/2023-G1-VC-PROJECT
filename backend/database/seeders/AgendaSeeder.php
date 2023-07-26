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
                'title' => 'Team Meeting',
                'date' => '2023-08-01',
                'description' => 'Monthly team meeting to discuss progress and upcoming projects',
                'event_id'=> 1
            ],
            [
                'title' => 'Client Presentation',
                'date' => '2023-09-15',
                'description' => 'Presentation to clients on new product features and updates',
                'event_id'=> 2
            ],
            [
                'title' => 'Conference Call',
                'date' => '2023-10-20',
                'description' => 'Conference call with international partners to discuss business strategy',
                'event_id'=> 1
            ],
            [
                'title' => 'Training Session',
                'date' => '2023-11-05',
                'description' => 'Training session for new employees on company policies and procedures',
                'event_id'=> 3
            ],
            [
                'title' => 'Project Deadline',
                'date' => '2023-12-10',
                'description' => 'Deadline for completion of a major project',
                'event_id'=> 4
            ],
            [
                'title' => 'Product Launch',
                'date' => '2023-09-01',
                'description' => 'Launch event for new product line',
                'event_id'=> 5
            ],
            [
                'title' => 'Quarterly Review',
                'date' => '2023-10-01',
                'description' => 'Quarterly review of financial performance and business strategy',
                'event_id'=> 6
            ],
            [
                'title' => 'Employee Appreciation Day',
                'date' => '2023-07-29',
                'description' => 'Celebration of employee contributions and achievements',
                'event_id'=> 6
            ],
            [
                'title' => 'Charity Fundraiser',
                'date' => '2023-11-15',
                'description' => 'Fundraiser event for a local charity organization',
                'event_id'=> 7
            ],
            [
                'title' => 'Holiday Party',
                'date' => '2023-12-22',
                'description' => 'End of the year holiday party for employees and guests',
                'event_id'=> 8
            ],
            [
                'title' => 'New Hire Orientation',
                'date' => '2023-08-15',
                'description' => 'Orientation for new hires on company culture and policies',
                'event_id'=> 9
            ],
            [
                'title' => 'Vendor Negotiation',
                'date' => '2023-09-10',
                'description' => 'Negotiation session with vendors for better pricing and terms',
                'event_id'=> 10
            ],
            [
                'title' => 'Product Development Meeting',
                'date' => '2023-10-15',
                'description' => 'Meeting to discuss new product development and innovation',
                'event_id'=> 11
            ],
            [
                'title' => 'Board Meeting',
                'date' => '2023-11-20',
                'description' => 'Meeting with the board of directors to discuss company performance and strategy',
                'event_id'=> 12
            ],
            [
                'title' => 'Product Development Meeting',
                'date' => '2023-10-15',
                'description' => 'Meeting to discuss new product development and innovation',
                'event_id'=> 11
            ],
            [
                'title' => 'Board Meeting',
                'date' => '2023-11-20',
                'description' => 'Meeting with the board of directors to discuss company performance and strategy',
                'event_id'=> 12
            ],
            [
                'title' => 'Marketing Campaign Launch',
                'date' => '2023-12-01',
                'description' => 'Launch event for new marketing campaign and initiatives',
                'event_id'=> 13
            ],
            [
                'title' => 'Annual General Meeting',
                'date' => '2023-07-01',
                'description' => 'Annual general meeting with shareholders to discuss company performance and progress',
                'event_id'=> 13
            ],
            [
                'title' => 'Product Training Session',
                'date' => '2023-08-20',
                'description' => 'Training session for customers on how to use new product features and updates',
                'event_id'=> 14
            ],
            [
                'title' => 'Networking Event',
                'date' => '2023-09-25',
                'description' => 'Networking event with industry professionals and peers',
                'event_id'=> 15
            ],
            [
                'title' => 'Employee Training Workshops',
                'date' => '2023-10-25',
                'description' => 'Workshops for employees to develop new skills and knowledge',
                'event_id'=> 16
            ],
            [
                'title' => 'Networking Event',
                'date' => '2023-09-25',
                'description' => 'Networking event with industry professionals and peers',
                'event_id'=> 15
            ],
            [
                'title' => 'Employee Training Workshops',
                'date' => '2023-10-25',
                'description' => 'Workshops for employees to develop new skills and knowledge',
                'event_id'=> 16
            ],
            [
                'title' => 'Sales Team Meeting',
                'date' => '2023-11-15',
                'description' => 'Monthly meeting for sales team to discuss targets and progress',
                'event_id'=> 17
            ],
            [
                'title' => 'Product Demonstration',
                'date' => '2023-12-05',
                'description' => 'Product demonstration event for potential customers and investors',
                'event_id'=> 18
            ],
            [
                'title' => 'Industry Conference',
                'date' => '2023-08-10',
                'description' => 'Conferenceevent to learn about latest industry trends and developments',
                'event_id'=> 19
            ],
            [
                'title' => 'Product Demonstration',
                'date' => '2023-12-05',
                'description' => 'Product demonstration event for potential customers and investors',
                'event_id'=> 18
            ],
            [
                'title' => 'Industry Conference',
                'date' => '2023-08-10',
                'description' => 'Conferenceevent to learn about latest industry trends and developments',
                'event_id'=> 19
            ],
            [
                'title' => 'Budget Review',
                'date' => '2023-09-01',
                'description' => 'Review of budget and expenses for the year',
                'event_id'=> 20
            ],
            [
                'title' => 'Employee Performance Review',
                'date' => '2023-10-05',
                'description' => 'Performance review for employees to discuss progress and goals',
                'event_id'=> 22
            ],
            [
                'title' => 'Product Testing',
                'date' => '2023-11-10',
                'description' => 'Testing session for new product features and updates',
                'event_id'=> 23
            ],
            [
                'title' => 'Team Building Activity',
                'date' => '2023-12-15',
                'description' => 'Team building activity for employees to strengthen relationships',
                'event_id'=> 24
            ],
            [
                'title' => 'Product Launch Party',
                'date' => '2023-08-25',
                'description' => 'Launch party for new product line',
                'event_id'=> 25
            ],
            [
                'title' => 'Customer Appreciation Day',
                'date' => '2023-09-30',
                'description' => 'Celebration of customer loyalty and satisfaction',
                'event_id'=> 26
            ],
            [
                'title' => 'Employee Volunteer Day',
                'date' => '2023-10-30',
                'description' => 'Volunteer day for employees to give back to the community',
                'event_id'=> 27
            ],
            [
                'title' => 'Sales Training Session',
                'date' => '2023-11-20',
                'description' => 'Training session for sales team on new sales strategies and techniques',
                'event_id'=> 28
            ],
            [
                'title' => 'Product Development Workshop',
                'date' => '2023-12-05',
                'description' => 'Workshop for product development team to brainstorm new ideas and features',
                'event_id'=> 29
            ],
            [
                'title' => 'Industry Awards Ceremony',
                'date' => '2023-08-15',
                'description' => 'Awards ceremony to recognize outstanding achievements in the industry',
                'event_id'=> 30
            ],
            [
                'title' => 'Marketing Strategy Meeting',
                'date' => '2023-09-20',
                'description' => 'Meeting to discuss new marketing strategies and initiatives',
                'event_id'=> 31
            ],
            [
                'title' => 'Employee Wellness Day',
                'date' => '2023-10-10',
                'description' => 'Wellness day for employees to focus on health and wellbeing',
                'event_id'=> 32
            ],
        ];
        foreach ($agendas as $agenda) {
            Agenda::create($agenda);
        }
    
    }
}
