<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

use Session;

use Stripe;
//use Stripe\Checkout\Session;

class StripeController extends Controller
{
    public function stripe()
    {
        return view('stripe');
    }

    public function new(){

        return view('new');
    }



    public function stripePost(Request $request)
    {

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        $cartTotal = 0;
        $cartItems = Cart::where('user_id', auth()->id())->get();
        foreach ($cartItems as $cartItem) {
            $product = Product::find($cartItem->product_id);
            $cartTotal += $product->price * $cartItem->quantity;
        }

        try {
            Stripe\Charge::create([
                "amount" => $cartTotal,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Payment for your order",
                "metadata" => [
                    "customer_name" => $request->input('name-on-card')
                ]
            ]);

            Session::flash('success', 'Payment successful!');
            return redirect()->route('your.success.route');
        } catch (\Exception $e) {
            Session::flash('error', $e->getMessage());
            return back();
        }
    }

}
