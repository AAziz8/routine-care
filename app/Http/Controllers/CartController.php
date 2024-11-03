<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Session;

use Stripe;

class CartController extends Controller
{


    // public function cart()
    // {

    //     $cartItems = Cart::where('user_id', auth()->id())->get();
    //     $cartTotal = 0;
    //     $cartCount = count($cartItems);
    //     foreach ($cartItems as $cartItem) {

    //         $product = Product::find($cartItem->product_id);

    //         $cartItem->product_name = $product->name;
    //         $cartItem->price = $product->price;
    //         $cartItem->total = $product->price * $cartItem->quantity;
    //         $cartTotal += $cartItem->total;
    //     }

    //     return view('Cart.cart', compact('cartItems', 'cartCount', 'cartTotal'));
    // }
    
    public function cart()
{
    $cartItems = [];
    $cartTotal = 0;
    $cartCount = 0;

    if (auth()->check()) {
        $cartItems = Cart::where('user_id', auth()->id())->get();
        foreach ($cartItems as $cartItem) {
            $product = Product::find($cartItem->product_id);

            $cartItem->product_name = $product->name;
            $cartItem->price = $product->price;
            $cartItem->total = $product->price * $cartItem->quantity;
            $cartTotal += $cartItem->total;
        }
        $cartCount = $cartItems->count();
    } else {
        $sessionCart = session()->get('cart', []);
    // dd($sessionCart);
        foreach ($sessionCart as $productId => $details) {
            $cartItem = new Cart();

            $cartItem->product_id = $productId;
            $cartItem->product_name = $details['name'];
            $cartItem->quantity = $details['quantity'];
            $cartItem->price = $details['price'];
            $cartItem->total = $details['price'] * $details['quantity'];

            $cartItems[] = $cartItem;
            $cartTotal += $cartItem->total;
        }

        $cartCount = count($sessionCart);
    }

    return view('Cart.cart', compact('cartItems', 'cartCount', 'cartTotal'));
}

    
 



    // public function addToCart($id)
    // {

    //     $product = Product::findOrFail($id);
    //     $user = Auth::user();
    //     if(!$user){
    //         return redirect()->route('adminlogin786');
    //     }
    //     $existingCart = $user->carts()->where('product_id', $product->id)->first();

    //     if ($existingCart) {
    //         $existingCart->increment('quantity');
    //     } else {

    //         $cart = new Cart(['product_id' => $product->id]);
    //         $user->carts()->save($cart);
    //     }

    //     return redirect()->back()->with('success', 'Product added to cart successfully!');
    // }
    
    public function addToCart($id, Request $request)
{
    $product = Product::findOrFail($id);

    if (Auth::check()) {
        // If the user is authenticated
        $user = Auth::user();
        $existingCart = $user->carts()->where('product_id', $product->id)->first();

        if ($existingCart) {
            $existingCart->increment('quantity');
        } else {
            $cart = new Cart(['product_id' => $product->id]);
            $user->carts()->save($cart);
        }
    } else {
        $cart = session()->get('cart', []);
        
        // Check if the product already exists in the session cart
        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity']++;
        } else {
        
            $cart[$product->id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price
            ];
        }

            //dd($cart);

        // Save cart back to session
        session()->put('cart', $cart);
        
    }

    return redirect()->back()->with('success', 'Product added to cart successfully!');
}
    

    public function update(Request $request)
    {
        if ($request->id && $request->quantity) {
            $order = Cart::find($request->id);
            if ($order) {
                $order->quantity = $request->quantity;
                $order->save();
                session()->flash('success', 'Cart successfully updated!');
            }
        }
    }

    public function remove(Request $request)
{
    // dd($request->all());
    if ($request->id) {
        $order = Cart::find($request->id);
        if ($order) {
            $order->delete();
        }
    }

    if ($request->session_id) {
        $cart = session()->get('cart', []);

        if (isset($cart[$request->session_id])) {
            unset($cart[$request->session_id]);
            session()->put('cart', $cart);
        }
    }

    session()->flash('success', 'Product successfully removed from cart!');

    return response()->json(['success' => true]);
}


    public function pay_order(Request $request)
    {
        $user = auth()->user();
        $order = new Order();
        $order->phone_number =$request->input('phone_number');
        $order->address =$request->input('address');
        $order->city =$request->input('city');
//        $order->zip_code =$request->input('zip_code');
        $order->user_id =$user->id;
        $order->name = $request->input('name');
        $order->payment_method = $request->input('paymentMethod');
        if ($order == 'cash'){
            $order->description = $request->input('description') ?? 'No Description';
        }
        $total = 0;
        $cartitems_total = Cart::where('user_id' , Auth::id())->get();
        foreach ($cartitems_total as $prod)
        {
            $total += $prod->product->price;
        }
        $order->total = $total;
        // Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));


        // Stripe\Charge::create([
        //     "amount" => $total*100,
        //     "currency" => "usd",
        //     "source" => $request->stripeToken,
        //     "description" => "Payment for your order",
        //     "metadata" => [
        //         "customer_name" => $request->input('name-on-card')
        //     ]
        // ]);




        $order->save();
        foreach ($cartitems_total as $item) {
            $orderItem = new OrderItem();
            $orderItem->order_id = $order->id; 
            $orderItem->product_id = $item->product_id; 
            $orderItem->quantity = $item->quantity; 
            $orderItem->save(); 
        }

        Cart::destroy($cartitems_total);
        return redirect('/')->with('success', 'Order successfully processed.It will be delivered soon');
    }


//    public function success()
//    {
//
//        $userId = auth()->id();
//
//        Order::where('user_id', $userId)->delete();
//
//        return redirect('/');
//    }




}
