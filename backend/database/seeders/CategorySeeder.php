<?php

namespace Database\Seeders;
use App\Models\Category;
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
                'id'=>3,
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
            Category::create($selectCategory);
        }
    }
}
