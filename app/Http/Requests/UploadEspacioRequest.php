<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
        'direccion' => 'required|string|max:45',
        'dpto' => 'nullable|string|max:45',
        'pais' => 'required|string|max:45',
        'provincia' => 'required|string|max:45',
        'ciudad' => 'required|string|max:45',
        'zipcode' => 'required|numeric|min:1000|max:9999',
        'tipoEspacio' => 'required|string|max:45',
        'cantAutos' => 'required|numeric|max:2',
        'cantMotos' => 'required|numeric|max:8',
        'cantBicicletas' => 'required|numeric|max:8',
        'aptoDiscapacitados' => 'nullable',
        'aptoElectricos' => 'nullable',
        'infopublica' => 'nullable|string|max:250',
        'infoprivada' => 'nullable|string|max:250',
      ];
      $photos = count($this->input('espacioPic'));
      foreach(range(0, $photos) as $index) {
          $rules['espacioPic.' . $index] = 'image|mimes:jpeg,bmp,png|max:10000';
          // Hago que la carga sea obligatoria si no hay ninguna foto en la db
          $rules['espacioPic.' . $index]->sometimes('espacioPic.' . $index, 'required', function(){
            return 2>1;
          });
      }

      return $rules;
    }
}
