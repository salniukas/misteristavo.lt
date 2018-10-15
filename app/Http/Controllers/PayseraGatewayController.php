<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

public function redirect (Request $request)
{
	$config = config('services.paysera');

	// Nustatome pagal nuožiūrą
	$orderId = 999999999;

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