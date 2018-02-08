<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MercadoPago;

class PaymentsController extends Controller
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

    return view('testfunction', compact('preference'));
  }
}
