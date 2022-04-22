<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products=[
            [
                'short_name'=>'فرش ماشینی گل افشان سیلور',
                'name'=>'فرش ماشینی گل افشان سیلور'.'-f51265d',
                'price'=>5600000,
                'number'=>20,
                'thumbnail'=>'https://api.kelarcarpet.com/storage/6d568d8f-c202-4ad8-8081-15d691f801b2/conversions/product-9-thumb_md.jpg',
                'slug'=>'فرش-ماشینی-گل-افشان-سیلور',
                'description' =>'فرش ماشینی گل افشان سیلور یکی دیگر از محصولات کلاسیک مجموعه عالی قاپو می باشد. از مزایای این محصول طرح برجسته بودن آن است برای کسانی که به دنبال فرش با طرح برجسته هستند. فرش گل افشان با استفاده از نخ اکرولیک و ارتفاع نخ خاب ۷ میلی متر و با تراکم ۳۶۰۰ بافته شده است',
                'material'=>'پلی استر فیلامنت',
                'category_id'=>3,
                'origin_id'=>1,
            ],

        ];
        foreach ($products as $product) {
            Product::create(
                [
                    'short_name'=>$product['short_name'],
                    'name'=>$product['name'],
                    'price'=>$product['price'],
                    'number'=>$product['number'],
                    'thumbnail'=>$product['thumbnail'],
                    'slug'=>$product['slug'],
                    'description'=>$product['description'],
                    'material'=>$product['material'],
                    'category_id'=>$product['category_id'],
                    'origin_id'=>$product['origin_id'],
                ]
            );
        }
    }
}
