<?php

namespace sisOdonto\Http\Requests;

use sisOdonto\Http\Requests\Request;

class InsumoFormRequest extends Request
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
            'nombre'=>'required|max:50',
            'codigo'=>'required',
            'stock_min'=>'required',
            'descripcion'=>'required',
            
        ];
    }
}
