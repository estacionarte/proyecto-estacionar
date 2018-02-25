<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MercadoPago;
use MP;

class PaymentsController extends Controller
{
    public function test(){
      // Checkout Básico

      // Inicializo SDK
      // MercadoPago\SDK::setAccessToken("TEST-1581213728114728-013021-1bde2b4e61dbdf46b348aa17dfbce816__LA_LB__-141713919");

      // Credenciales
      MercadoPago\SDK::setClientId("1581213728114728");
      MercadoPago\SDK::setClientSecret("ZAnggFd5NZe6DqaqV9WNQ2MPtk27rZMe");
      //
      // // Creo payment y le asigno valores
      // $payment = new MercadoPago\Payment();
      // $payment->transaction_amount = 141;
      // $payment->token = "YOUR_CARD_TOKEN";
      // $payment->description = "Ergonomic Silk Shirt";
      // $payment->installments = 1;
      // $payment->payment_method_id = "visa";
      // $payment->payer = array(
      //   "email" => "larue.nienow@hotmail.com"
      // );

      // Creo prefrencia de objeto a pagar
      $preference = new MercadoPago\Preference();
      # Create an item object
      $item = new MercadoPago\Item();
      $item->id = "1234";
      $item->title = "Small Iron Clock";
      $item->quantity = 4;
      $item->currency_id = "ARS";
      $item->unit_price = 43.61;
      # Create a payer object
      $payer = new MercadoPago\Payer();
      $payer->name = "Charles";
      $payer->surname = "Aponte";
      $payer->email = "charles@hotmail.com";
      $payer->date_created = "2018-06-02T12:58:41.425-04:00";
      $payer->phone = array(
        "area_code" => "",
        "number" => "932.651.763"
      );
      $payer->identification = array(
        "type" => "DNI",
        "number" => "12345678"
      );
      $payer->address = array(
        "street_name" => "Barranco Homero",
        "street_number" => 1960,
        "zip_code" => "55163"
      );
      # Setting preference properties
      $preference->items = array($item);
      $preference->payer = $payer;
      # Save and posting preference
      $preference->save();
      // dd($preference->save());
      // dd($preference);

    return view('testfunction', compact('preference'));
  }

  public function getNotification(){

    $topic = $request->topic;
    $id = $request->id;
    return response('Gracias', 200);
  }

  public function test2($id,  $fechallegada = null,  $fechapartida = null){

    // Pongo un espacio de ejemplo
    if (!$fechallegada && !$fechapartida) {
      $fechallegada = new DateTime();
      $fechapartida = new DateTime();
      $fechapartida->modify('+6 hour');
    }

    $espacio = Espacio::findOrFail($id);

    $tiempominimo = $espacio->minutosEnDiasYHoras($espacio->estadiaMinimaMinutos);
    $tiempomaximo = $espacio->minutosEnDiasYHoras($espacio->estadiaMaximaMinutos);
    $anticipacion = $espacio->minutosEnDiasYHoras($espacio->anticipacionMinutos);


    // Hago las cosas de MP

    $mp = new MP('1581213728114728', 'ZAnggFd5NZe6DqaqV9WNQ2MPtk27rZMe');

    $preference_data = array(
    	"items" => array(
    		array(
    			"title" => "Multicolor kite",
    			"quantity" => 1,
    			"currency_id" => "ARS", // Available currencies at: https://api.mercadopago.com/currencies
    			"unit_price" => 10.00
    		)
    	)
    );

    $preference = $mp->create_preference($preference_data);

    // para que vaya directo a la pagina de mercado pago
    // return redirect()->to($preference['response']['init_point']);

    // Para que muestre el botón de pago en estacionados
    return view('testfunction2', compact('preference','espacio', 'tiempominimo', 'tiempomaximo', 'anticipacion', 'fechallegada', 'fechapartida'));

  }

}
