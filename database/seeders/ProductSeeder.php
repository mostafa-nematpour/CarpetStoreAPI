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
            [
                'short_name'=>'فرش نوین بژ طرح برجسته',
                'name'=>'فرش نوین بژ طرح برجسته'.'-hfy2412f',
                'price'=>9500000,
                'number'=>20,
                'thumbnail'=>'https://api.kelarcarpet.com/storage/03be90fb-5677-41bf-9e47-40e4a7aec55c/conversions/product-4-thumb_md.jpg',
                'slug'=>'فرش-نوین-بژ-طرح-برجسته',
                'description' =>'یکی دیگر از قالی های ۱۵۰۰ شانه که زیبایی منحصربفردی دارد فرش نوین بژ است. این قالی دارای الیاف اکریلیک هیت ست بوده و در بافت آن از ۸ رنگ متنوع استفاده شده که به زیبایی در کنار یکدیگر قرار گرفته اند. ارتفاع نخ خاب آن حدود ۶ میلی متر بوده و انجام فرایند هیت ست بر روی آن باعث شده تا در زمره فرش های برجسته قرار بگیرد. فشردگی بالای گره ها موجب شده تا فرش از طول عمر بیشتری نیز برخوردار باشد که این موضوع می تواند توجهات بسیاری را به سمت فرش های ۱۵۰۰ شانه جلب کند.',
                'material'=>'پلی استر فیلامنت',
                'category_id'=>5,
                'origin_id'=>1,
            ],
            [
                'short_name'=>'فرش نوین شکلاتی طرح برجسته',
                'name'=>'فرش نوین شکلاتی طرح برجسته'.'-sd5646s',
                'price'=>54000000,
                'number'=>20,
                'thumbnail'=>'https://api.kelarcarpet.com/storage/6d568d8f-c202-4ad8-8081-15d691f801b2/conversions/product-9-thumb_md.jpg',
                'slug'=>'فرش-نوین-شکلاتی-طرح-برجسته',
                'description' =>'از دیگر مدل های فرش ۱۵۰۰ شانه می توان به طرح نوین شکلاتی اشاره کرد که دارای ترنج وسط بوده و طرح مرکزی توسط قابی در حاشیه ها محصور شده است. نخ خاب این فرش اکریلیک هیت ست بوده که در گروه فرش های برجسته قرار می گیرد و از ۸ رنگ متنوع در بافت آن استفاده شده است. ارتفاع نخ خاب این قالی ۶ میلی متر می باشد؛ به همین جهت از ضخامت کمتری در مقایسه با فرش های ۱۲۰۰ شانه برخوردار بوده و جزو فرش های سبک شناخته می شود. از دیگر مدل های فرش ۱۵۰۰ شانه می توان به طرح نوین شکلاتی اشاره کرد که دارای ترنج وسط بوده و طرح مرکزی توسط قابی در حاشیه ها محصور شده است. نخ خاب این فرش اکریلیک هیت ست بوده که در گروه فرش های برجسته قرار می گیرد و از ۸ رنگ متنوع در بافت آن استفاده شده است. ارتفاع نخ خاب این قالی ۶ میلی متر می باشد؛ به همین جهت از ضخامت کمتری در مقایسه با فرش های ۱۲۰۰ شانه برخوردار بوده و جزو فرش های سبک شناخته می شود.',
                'material'=>'پلی استر فیلامنت',
                'category_id'=>4,
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
