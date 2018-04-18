<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class UploadEspacioRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
      $rules = [
        'nombre' => 'required|string|min:10',
        'direccion' => 'required|string|max:45',
        'pais' => 'required|string|max:45',
        'provincia' => 'required|string|max:45',
        'ciudad' => 'required_unless:provincia,CABA|string|max:45',
        'zipcode' => 'required|string|min:4|max:8',
        'tipoEspacio' => 'required|string|max:45',
        'cantAutos' => 'required_without_all:cantMotos,cantBicicletas|numeric|max:2',
        'cantMotos' => 'required_without_all:cantAutos,cantBicicletas|numeric|max:8',
        'cantBicicletas' => 'required_without_all:cantMotos,cantAutos|numeric|max:8',
        'aptoDiscapacitados' => 'nullable',
        'aptoElectricos' => 'nullable',
        'infopublica' => 'required|string|max:250',
        'infoprivada' => 'nullable|string|max:250',
      ];
      $photos = count($this->input('espacioPic'));
      foreach(range(0, $photos) as $index) {
        $campo = 'espacioPic.' . $index;
          $rules[$campo] = 'image|mimes:jpeg,bmp,png|max:10000';
          // Hago que la carga sea obligatoria si no hay ninguna foto en la db
          // $rules[$campo]->sometimes($campo, 'required', function(){
          //   return empty(Auth::user()->espacios()->find(Route::input('id'))->fotos());
          // });
        }
      return $rules;

    }

    public function messages()
    {
      return [
        'espacioPic.0.required' => 'Debes cargar por lo menos una foto',
      ];
    }
}
