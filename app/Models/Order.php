<?php

namespace App\Models;

use App\Observers\OrderObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
#[ObservedBy([OrderObserver::class])]

class Order extends Model
{
    use HasFactory;


    protected $fillable = ['user_id' , 'total_amount' , 'quantity' , 'name' , 'product_image' ,'phone_number' ,'address' ,'city' , 'payment_method'
    ,'description' ,'status'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function orderItems(){
        return $this->hasMany(OrderItem::class);
    }



}
