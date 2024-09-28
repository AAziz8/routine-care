<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{

public function index()
{
    $user_id = Auth::id();
    $orderItems = Cart::with('product')->where('user_id', $user_id)->get();
    return view('place_order', compact('orderItems'));
}



}
