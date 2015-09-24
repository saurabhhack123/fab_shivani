<?php
class Orderitem extends Eloquent{
     public function getOrderbyemail($email)
    {
    	$orderdetail = DB::table('orders')->join('orderitems', 'orders.id', '=', 'orderitems.order_id')->where('orders.email_id','=',$email)->get();
    	return $orderdetail;
    }
}
?>