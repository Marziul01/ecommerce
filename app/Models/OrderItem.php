<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    public static function details($request,$orderId,$item){

        $shipping = $request->shipping_charge;
        $totall = $item->price*$item->qty;

        $orderItem = new OrderItem();
        $orderItem->order_id = $orderId;
        $orderItem->product_id = $item->id;
        $orderItem->product_name = $item->name;
        $orderItem->color = $item->options['color'];
        $orderItem->size = $item->options['size'];
        $orderItem->qty = $item->qty;
        $orderItem->price = $item->price;
        $orderItem->total = $totall;
        $orderItem->shipping = $shipping;
        $orderItem->subtotal = $totall+$shipping;
        $orderItem->save();


    }

    public function product(){
        return $this->belongsTo(Product::class);
    }

}
