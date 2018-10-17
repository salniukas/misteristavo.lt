<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PayseraGateway extends Controller
{
    public function redirect (Request $request)
	{
		// Paimame payseros nustatymus iš config/services.php failo
		$config = config('services.paysera');

		// Nustatome pagal nuožiūrą
		Order::create(request(['username', 'email', 'amount']));
		$order = Order::orderBy('created_at', 'DESC')->firstOrFail();
		$orderId = $order->id;

		$params = [
		    'projectid' => $config['projectid'],
		    'orderid' => $orderId,
		    'accepturl' => $config['accepturl'],
		    'cancelurl' => $config['cancelurl'],
		    'callbackurl' => $config['callbackurl'],
		    'version' => $config['version'],
		    'test' => $config['test'],
		    'p_email' => $request->email,
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
	      
	       // Naudojame pvz.: $p_email, $name, $surname kintamuosius užsakymo patvirtinimui.
	   }
	 
	 return response('OK', 200);
	}
}
