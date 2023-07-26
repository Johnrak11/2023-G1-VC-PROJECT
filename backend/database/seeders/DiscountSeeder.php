<?php

namespace Database\Seeders;

use App\Models\Discount;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DiscountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $discounts = [
            [
                'percent' => 20,
                'end_date' => '2023-08-10',
                'event_detail_id' => 1,
            ],
            [
                'percent' => 15,
                'end_date' => '2023-08-12',
                'event_detail_id' => 2,
            ],
            [
                'percent' => 30,
                'end_date' => '2023-08-15',
                'event_detail_id' => 3,
            ],
            [
                'percent' => 25,
                'end_date' => '2023-08-17',
                'event_detail_id' => 4,
            ],
            [
                'percent' => 10,
                'end_date' => '2023-08-20',
                'event_detail_id' => 5,
            ],
            [
                'percent' => 35,
                'end_date' => '2023-08-22',
                'event_detail_id' => 6,
            ],
            [
                'percent' => 20,
                'end_date' => '2023-08-25',
                'event_detail_id' => 7,
            ],
            [
                'percent' => 15,
                'end_date' => '2023-08-27',
                'event_detail_id' => 8,
            ],
            [
                'percent' => 30,
                'end_date' => '2023-08-30',
                'event_detail_id' => 9,
            ],
            [
                'percent' => 25,
                'end_date' => '2023-09-01',
                'event_detail_id' => 10,
            ],
            [
                'percent' => 10,
                'end_date' => '2023-09-04',
                'event_detail_id' => 11,
            ],
            [
                'percent' => 35,
                'end_date' => '2023-09-06',
                'event_detail_id' => 12,
            ],
            [
                'percent' => 20,
                'end_date' => '2023-09-09',
                'event_detail_id' => 13,
            ],
            [
                'percent' => 15,
                'end_date' => '2023-09-11',
                'event_detail_id' => 14,
            ],
            [
                'percent' => 30,
                'end_date' => '2023-09-14',
                'event_detail_id' => 15,
            ],
            [
                'percent' => 25,
                'end_date' => '2023-09-16',
                'event_detail_id' => 16,
            ],
            [
                'percent' => 10,
                'end_date' => '2023-09-19',
                'event_detail_id' => 17,
            ],
            [
                'percent' => 35,
                'end_date' => '2023-09-21',
                'event_detail_id' => 18,
            ],
            [
                'percent' => 20,
                'end_date' => '2023-09-24',
                'event_detail_id' => 19,
            ],
            [
                'percent' => 15,
                'end_date' => '2023-09-26',
                'event_detail_id' => 20,
            ],
            [
                'percent' => 30,
                'end_date' => '2023-09-29',
                'event_detail_id' => 21,
            ],
            [
                'percent' => 25,
                'end_date' => '2023-10-01',
                'event_detail_id' => 22,
            ],
            [
                'percent' => 10,
                'end_date' => '2023-10-04',
                'event_detail_id' => 23,
            ],
            [
                'percent' => 35,
                'end_date' => '2023-10-06',
                'event_detail_id' => 24,
            ],
            [
                'percent' => 20,
                'end_date' => '2023-10-09',
                'event_detail_id' => 25,
            ],
            [
                'percent' => 15,
                'end_date' => '2023-10-11',
                'event_detail_id' => 26,
            ],
            [
                'percent' => 29,
                'end_date' => '2023-10-09',
                'event_detail_id' => 27,
            ],
            [
                'percent' => 39,
                'end_date' => '2023-10-11',
                'event_detail_id' => 28,
            ],
        ];
        foreach ($discounts as $discount) {
            Discount::create($discount);
        }
    }
}
