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
            'بختیاری' => [
                'slug' => 'bakhtiari',
                'icon' => 'icon-bakhtiari'
            ],
            'بلوچی' => [
                'slug' => 'baluchi',
                'icon' => 'icon-baluchi'
            ],
            'همدان' => [
                'slug' => 'hamadan',
                'icon' => 'icon-hamadan'
            ],
            'فرهان' => [
                'slug' => 'farahan',
                'icon' => 'icon-farahan'
            ],
            'اصفهان' => [
                'slug' => 'isfahan',
                'icon' => 'icon-isfahan'
            ],
            'کاشان' => [
                'slug' => 'kashan',
                'icon' => 'icon-kashan'
            ],
            'کرمان' => [
                'slug' => 'kerman',
                'icon' => 'icon-kerman'
            ],
            'ملایر' => [
                'slug' => 'malayer',
                'icon' => 'icon-malayer'
            ],
            'قم' => [
                'slug' => 'qum',
                'icon' => 'icon-qum'
            ],
            'سمنان' => [
                'slug' => 'semnan',
                'icon' => 'icon-semnan'
            ],
            'تبریز' => [
                'slug' => 'tabriz',
                'icon' => 'icon-tabriz'
            ],
            'تهران' => [
                'slug' => 'tehran',
                'icon' => 'icon-tehran'
            ],
            'ورامین' => [
                'slug' => 'veramin',
                'icon' => 'icon-veramin'
            ],
            'یزد' => [
                'slug' => 'yazd',
                'icon' => 'icon-yazd'
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
