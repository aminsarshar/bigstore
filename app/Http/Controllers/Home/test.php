$authority = $request->Authority;
$order = Order::query()->where('transaction_id', $authority)->first();
$order_details = OrderDetail::query()->where('order_id', $order->id)->get();
if($request->Status=="OK"){
DB::beginTransaction();
try{
Order::successfulPayment($order,$order_details,$order->discount_code,$order->gift_cart_code);
$result = "successful";
DB::commit();
return view('frontend.shipping_result',compact('result','order'));
}catch (\Exception $exception){
DB::rollBack();
$result = "failed";
return view('frontend.shipping_result',compact('result','order'));
}
}else{
$result = "failed";
return view('frontend.shipping_result',compact('result','order'));
}