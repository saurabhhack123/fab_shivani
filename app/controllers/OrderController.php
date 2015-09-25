<?php

class OrderController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	public function addOrder()
	{
		$input = Input::all();
		$id = Order::addOrder($input);
		return Response::json([
                    'message' => '','id' => $id , 'result'=>'success'
                ], 400);
	}

	public function getOrder($id)
	{
		$data=Order::getOrder($id);
		return Response::json($data, 400);
	}
	public function cancelOrder($id)
	{
			$orderdata = Order::where('id', $id)->first();
			if(!empty($orderdata))
			{
				$data=Order::updatecancelOrder($id);
				return Response::json($data, 400);
			}
			else
			{
				$data['message']="no data found";
				return Response::json($data, 400);
			}
	}
	public function paymentOrder($id)
	{
			$orderdata = Order::where('id', $id)->first();
			if(!empty($orderdata))
			{
				$data=Order::updatepaymentOrder($id);
				return Response::json($data, 400);
			}
			else
			{
				$data['message']="no data found";
				return Response::json($data, 400);
			}
	}
	function getFilledOrder($id)
	{
			$orderdata = Order::where('id', $id)->first();
			if(!empty($orderdata))
			{
				$data=Order::getOrder($id);
				return View::make('update',array('data'=>$data,'id'=>$id));
			}
			else
			{
				$data['message']="no data found";
				return Response::json($data, 400);
			}

	}

	function updateOrder()
	{
		$input = Input::all();
		$data=Order::updateOrder($input);
		return Response::json($data, 400);
	}
	function search($email)
	{
		$user = Order::where('email_id', $email)->first();
		if(!empty($user))
		{
			$orderitem = new Orderitem();
			$data=$orderitem->getOrderbyemail($email);
		}
		else
		{
			$data['message']="no data found";
		}
		return Response::json($data, 400);
	}
	function getTodayOrder()
	{
		$data=Order::getTodayOrder();
		return Response::json($data, 400);
	}
}
