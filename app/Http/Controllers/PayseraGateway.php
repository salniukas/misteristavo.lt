<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use Log;

use App\Order;
use App\User;
use Auth;
use App\Point_transactions;

class PayseraGateway extends Controller
{
	public function store(Request $request)
	{
		Order::create(request(['username', 'email', 'amount']));
		$order = Order::orderBy('created_at', 'DESC')->firstOrFail();

		return redirect('https://misteristavo.lt/paslaugos/ready/'. $order->id);
	}

    public function ready($id)
	{
		$order = Order::find($id);
		
		return view('pay')->with('order', $order);
	}

    public function redirect ($id)
	{
		// Paimame payseros nustatymus iš config/services.php failo
		

		// Nustatome pagal nuožiūrą
		$order = Order::find($id);

		$config = config('services.paysera');

		// Nustatome pagal nuožiūrą
		$orderId = $order->id;
		$params = [
		'projectid' => $config['projectid'],
		'orderid' => $orderId,
		'accepturl' => $config['accepturl'],
		'cancelurl' => $config['cancelurl'],
		'callbackurl' => 'https://misteristavo.lt/paysera/callback',
		'version' => $config['version'],
		'test' => $config['test'],
		'p_email' => $order->email,
		'amount' => $order->amount*100,
		];
		// Užkoduojame parametrus ir paruošiame parašą.
		$params = http_build_query($params);
		$params = base64_encode($params);
		$data = str_replace('/', '_', str_replace('+', '-', $params));
		$sign = md5($data . $config['password']);

		// Nukreipiame vartotoją į Payseros puslapį.
		return redirect('https://www.paysera.com/pay/' . '?data=' . $data . '&sign=' . $sign);
	}

	public function callback (Request $request)
	{
	   $sign = $config = config('services.paysera.password');
	   $data = $request->data;
	   $ss1 = $request->ss1;

	   // Sutikriname parašus
	   if (md5($data . $sign) === $ss1) {
	       // Iškoduojame parametrus
	       $params = array();
	       parse_str(base64_decode(strtr($request->data, array('-' => '+', '_' => '/'))), $params);
	      $status = $params['status'];
		  $p_email = $params['p_email'];
		  $amount = $params['amount'] / 100;
		  $order = Order::where('email', $p_email)->where('amount', $amount)->where('approved', 'pending')->first();
		  $user = User::where('email', $p_email)->first();
		  $user->points = $user->points + $amount;
		  $user->save();
		  $order->approved = 'done';
		  $order->save();
	      
	   }
	 
	 return response('OK', 200);
	}

	public function paypal(Request $request){
      $response = array(
          'status' => 'success',
          'msg' => $request->message,
      );
      $id = $request->message;
      
      $order = Order::find($id);
      $amount = $order->amount;
      $order->approved = "done";
	  $order->save();
      $user = User::where('email', $order->email)->first();
      $user->points = $user->points + $amount;
	  $user->save();

      

      return response()->json($response);
      return redirect('/');
      

   }
}
