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
        $categories=[
            [
                'name'=>'workshop',
            ],
            [
                'name'=>'concert',
            ],
            [
                'name'=>'sport',
            ],
            [
                'name'=>'art',
            ],
            [
                'name'=>'business',
            ],
            [
                'name'=>'free',
            ],
        ];
        foreach($categories as $selectCategory){
            Categories::create($selectCategory);
        }
    }
}
