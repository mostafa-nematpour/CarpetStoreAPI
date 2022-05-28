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
}
