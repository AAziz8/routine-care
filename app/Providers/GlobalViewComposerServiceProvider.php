<?php

namespace App\Providers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;


class GlobalViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function ($view) {
        $products = Product::all();
        $cartItems = [];
        $cartTotal = 0;
        $cartCount = 0;

        if (Auth::check()) {
            $cartItems = Cart::where('user_id', auth()->id())->get();
            foreach ($cartItems as $cartItem) {
                $cartTotal += $cartItem->quantity * $cartItem->product->price;
            }
            $cartCount = count($cartItems);
        } else {
            $sessionCart = session()->get('cart', []);

            foreach ($sessionCart as $productId => $details) {
                $cartItem = new Cart(); // Create a new Cart instance

                $cartItem->product_id = $productId;
                $cartItem->quantity = $details['quantity'];
                $cartItem->created_at = now(); // Use the current time for created_at
                $cartItem->updated_at = now(); // Use the current time for updated_at

                $cartItems[] = $cartItem; // Add the cart item to the array
                $cartTotal += $cartItem->quantity * $details['price'];
            }
            $cartCount = count($sessionCart);
        }
            $view->with(compact('products', 'cartItems', 'cartTotal', 'cartCount'));
        });

    }
}
