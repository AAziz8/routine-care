<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Transaction;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){

        $orders = Order::where('status' , 0)->get();
        return view('Transaction.index' ,compact('orders'));
    }

    public function view($id){

        $orders = Order::with('user')->where('id' , $id)->first();
        return view('Transaction.view' , compact('orders'));
    }

    public function updateorder(Request $request, $id)
    {
        $orders = Order::find($id);

        if ($orders) {
            $orders->status = $request->input('order_status');
            $orders->save();

            return redirect('transaction')->with('status', 'Order Updated Successfully');
        } else {
            return redirect('transaction')->with('error', 'Order not found.');
        }
    }

    public function orderhistory(){
        $orders = Order::where('status' , 1)->get();
        return view('Transaction.history' ,compact('orders'));

    }


}
