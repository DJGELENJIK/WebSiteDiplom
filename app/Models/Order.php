<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Order extends Model
{
   public function  products()
   {
       return $this->belongsToMany(Product::class)->withPivot('count')->withTimestamps();
   }

//    public function  user()
//    {
//        return $this->belongsTo(User::class);
//    }
   public function  getFullPrice()
   {
       $sum = 0;
       foreach ($this->products as $product) {
           $sum += $product->getPriceCount();
       }
       return $sum;
   }
   public function saveOrder($name,$phone)
   {
       if ($this->status ==0){

           $this->name = $name;
           $this->phone= $phone;
           $this->status=1;
           $this->save();
           session()->forget('orderId');
           return true;
       }  else{
           return false;
       }
   }
}
