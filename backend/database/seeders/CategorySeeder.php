<?php

namespace Database\Seeders;

use App\Models\Categories;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Workshop',
            ],
            [
                'name' => 'Concert',
            ],
            [
                'name' => 'Sport',
            ],
            [
                'name' => 'Art',
            ],
            [
                'name' => 'Business',
            ],
            [
                'name' => 'E-sport',
            ],
            [
                'name' => 'Conference',
            ],
            [
                'name' => 'Food & Drink',
            ],
            [
                'name' => 'Health & Wellness',
            ],
            [
                'name' => 'Music',
            ],
        ];
        foreach ($categories as $selectCategory) {
            Categories::create($selectCategory);
        }
    }
}
