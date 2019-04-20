<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVecino extends FormRequest
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
        return [
            'nombre_vecino' =>'required', 
            'apellido_vecino' =>'required', 
            'telefono_vecino' =>'required|numeric|size:9', 
            'num_casa' =>'required|numeric|min:1'
        ];
    } 

    /*public function messages(){
        return[
            'nombre_vecino.required'=>'Debe ingresar el campo vecino',
            'apellido_vecino.required'=>'Debe ingresar el campo vecino',
            'telefono_vecino.required'=>'Debe ingresar el campo telefono',
            'num_casa.required'=>'Debe ingresar el campo número de casa',
            'telefono_vecino.size'=>'El campo telefono no debe superar los 9 caracteres',
            'num_casa.min'=>'El campo número de casa debe ser mayor a 1',
            'num_casa.numeric'=>'El campo número de casa debe ser numerico'
        ];
    } */

    public function attributes(){
        return[
            'nombre_vecino' =>'Nombre', 
            'apellido_vecino' =>'Apellido', 
            'telefono_vecino' =>'Telefono', 
            'num_casa' =>'Número de casa'
        ];
    }
}
