<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = ['description' , 'name' , 'price' , 'highlights','discount_price', 'category_id' , 'subcategory_id' ,'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }




    public function images()
    {
        return $this->hasMany(Image::class);
    }

}
