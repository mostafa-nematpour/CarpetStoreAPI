<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'short_name', 'number', 'thumbnail',
        'material', 'slug', 'price', 'description',
        'discount', 'category_id', 'origin_id'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function category()
    {
        return $this->belongsTo(Category::class)->select();
    }
    public function origin()
    {
        return $this->belongsTo(Origin::class);
    }

    public function getPriceAttribute($value)
    {
        return $this->convertEnNumbersToFa($value);
    }

    public function getThumbnailAttribute ($value){
        return "http://images.developer-studio.ir/".$value;
    }

    public function convertFaNumbersToEn($string) {
        $persian = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
        $arabic = ['٩', '٨', '٧', '٦', '٥', '٤', '٣', '٢', '١','٠'];

        $num = range(0, 9);
        $convertedPersianNums = str_replace($persian, $num, $string);
        $englishNumbersOnly = str_replace($arabic, $num, $convertedPersianNums);

        return $englishNumbersOnly;
    }


        public function convertEnNumbersToFa($number) {
            $num = range(0, 9);
            $persian = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
            return str_replace($num, $persian, $number);
      
    }

    
    
}
