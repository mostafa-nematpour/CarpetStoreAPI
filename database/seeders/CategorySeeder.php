<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'ورزشی' => [
                'slug' => 'sport',
                'icon' => 'fa fa-futbol-o'
            ],
           
        ];
        
        foreach ($categories as $categoryName =>$details) {
            Category::create([
                'name'=>$categoryName,
                'slug'=>$details['slug'],
                'icon'=>$details['icon']
            ]);
        }
    }
}
