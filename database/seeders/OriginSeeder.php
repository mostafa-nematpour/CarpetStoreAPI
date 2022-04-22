<?php

namespace Database\Seeders;

use App\Models\Origin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OriginSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'ایران' => [
                'slug' => 'iran',
                'icon' => 'icon-iran'
            ],
            'افغانستان' => [
                'slug' => 'afghanistan',
                'icon' => 'icon-afghanistan'
            ],
            'پاکستان' => [
                'slug' => 'pakistan',
                'icon' => 'icon-pakistan'
            ],
            'ترکیه' => [
                'slug' => 'turkey',
                'icon' => 'icon-turkey'
            ],
            'سوریه' => [
                'slug' => 'syria',
                'icon' => 'icon-syria'
            ],
            'آلمان' => [
                'slug' => 'germany',
                'icon' => 'icon-germany'
            ],
            'انگلستان' => [
                'slug' => 'angola',
                'icon' => 'icon-angola'
            ],
            "عراق" => [
                'slug' => 'iraq',
                'icon' => 'icon-iraq'
            ],
        ];
        
        foreach ($categories as $categoryName =>$details) {
            Origin::create([
                'name'=>$categoryName,
                'slug'=>$details['slug'],
                'icon'=>$details['icon']
            ]);
        }
    }
}
