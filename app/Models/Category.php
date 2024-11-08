<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected  $table = 'categories';
    protected $fillable = ['name' , 'parent_id' , 'image'];



    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');

    }


    public function subcategories(){
        return $this->hasMany(Category::class, 'parent_id');
    }
    public function product()
    {
        return $this->hasMany(Product::class);

    }



}
