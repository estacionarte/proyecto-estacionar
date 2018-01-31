<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MercadoPago;

class MPPayments extends Controller
{
    public function test(){

      // Inicializo SDK
      MercadoPago\SDK::setAccessToken("TEST-1581213728114728-013021-1bde2b4e61dbdf46b348aa17dfbce816__LA_LB__-141713919");

      // Creo payment y le asigno valores
      $payment = new MercadoPago\Payment();
      $payment->transaction_amount = 141;
      $payment->token = "YOUR_CARD_TOKEN";
      $payment->description = "Ergonomic Silk Shirt";
      $payment->installments = 1;
      $payment->payment_method_id = "visa";
      $payment->payer = array(
        "email" => "larue.nienow@hotmail.com"
      );
      dd($payment);

      $mp = new MP('CLIENT_ID', 'CLIENT_SECRET');

      $preference_data = array(
      	"items" => array(
      		array(
      			"title" => "Multicolor kite",
      			"quantity" => 1,
      			"currency_id" => "CURRENCY_ID", // Available currencies at: https://api.mercadopago.com/currencies
      			"unit_price" => 10.00
      		)
      	)
      );

    $preference = $mp->create_preference($preference_data);

    return view('testfunction', compact('preference'));
  }
}
