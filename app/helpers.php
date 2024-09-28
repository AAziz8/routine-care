<?php

namespace App;


use App\Models\Category;
use App\Models\Logo;
use App\Models\Order;
use App\Models\Product;
use App\Models\Update;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class helpers
{

    public static function categories()
    {
        $cate = Category::all();
        return $cate;
    }

    public static function cate()
    {
        $categories = Category::with('parent')->get();
        return $categories;
    }

    public static function products()
    {
        $products = Product::with('category')->latest()->take(8)->get();
        return $products;
    }

    public static function latest()
    {
        $latest_products = Product::with('category')->latest()->take(4)->get();
        return $latest_products;
    }

    public static function categories_p()
    {
        $categories = Category::with('parent', 'product')->get();
        return $categories;
    }

    public function t_products()
    {
        $total_p = Product::with('category')->count();
        return $total_p;
    }

    public static function  social_icons(){

        $socials = DB::table('updates')->where('id' , '=' , 1)->first();
        return $socials;

    }


    public static function userscount() {
        $userCount = User::count();
        return $userCount;
    }

    public static function productcount() {
        $productcounts = Product::count();
        return $productcounts;
    }


    public static function logo() {
        $logos = DB::table('logos')->where('id' , '=' , 1)->first();
        return $logos;
    }

    public static function userproductcounts() {

        $userWithMostProducts = User::select('users.name', DB::raw('COUNT(products.id) as post_count'))
            ->leftJoin('products', 'users.id', '=', 'products.user_id')
            ->groupBy('users.id', 'users.name')
            ->orderByDesc('post_count')
            ->limit(1)
            ->first();

        return $userWithMostProducts;

    }


    public static  function admin_user(){
        $users = Auth::user()->name;
        return $users;
    }


    public static function category_shop()
    {
        $categories_Shop = Category::with('product' , 'parent')->get();
        return  $categories_Shop;
    }




}
