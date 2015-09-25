<?php
class Order extends Eloquent{
	public $timestamps = true;
    public static function addOrder($input){
           	$order_id = DB::table('orders')->insertGetId(
			    ['email_id' => $input['email'], 'status' => 'created']
			);
            $id = DB::table('orderitems')->insertGetId(
			    ['order_id' => $order_id, 'name' => $input['name'],'price' => $input['price'],'quantity' => $input['quantity']]
			);
        return $id;
    }
    public static function getOrder($id)
    {
    	$orderdetail = DB::table('orders')->join('orderitems', 'orders.id', '=', 'orderitems.order_id')->where('orders.id','=',$id)->get();
    	return $orderdetail;
    }
    public static function getTodayOrder()
    {
    	$orderdetail = DB::select( DB::raw("select * from orders INNER JOIN orderitems on orderitems.order_id = orders.id where MONTH(orders.created_at) = MONTH(CURRENT_DATE) and DAY(orders.created_at) = DAY(CURRENT_DATE) and YEAR(orders.created_at)=YEAR(CURRENT_DATE)"));
    	return $orderdetail;
    }
    public static function updateOrder($input)
    {
    	$data=DB::table('orders')->where('id', $input['id'])->update(array('email_id' => $input['email']));
    	$dataorderitem=DB::table('orderitems')->where('order_id', $input['id'])->update(array('name' => $input['name'],'price'=>$input['price'],'quantity'=>$input['quantity']));
    	$finalarray['data_order'] = $data;
    	$finalarray['data_orderitems'] = $dataorderitem;
    	return $finalarray;
    }
     public static function updatecancelOrder($id)
    {
    	$data=DB::table('orders')->where('id', $id)->update(array('status' => 'cancelled'));
    	return Order::getOrder($id);
    }
    public static function updatepaymentOrder($id)
    {
    	$data=DB::table('orders')->where('id', $id)->update(array('status' => 'delivered'));
    	return Order::getOrder($id);
    }
}
?>