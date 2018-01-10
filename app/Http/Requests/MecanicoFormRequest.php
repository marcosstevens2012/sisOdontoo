<?php

namespace sisOdonto\Http\Requests;

use sisOdonto\Http\Requests\Request;
use Carbon\Carbon;

class MecanicoFormRequest extends Request
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
        $before_date = Carbon::now()->subYears(100)->toDateString();
        $after_date = Carbon::now()->subYears(18)->toDateString();
        return [
            'nombre'=>'required|max:50',
            'apellido'=>'required|max:50',
            'nacimiento'=>'required|date',
            'documento'=>'required',
            'nacimiento'=>'required|date|before:' . $after_date . '|after:' . $before_date,
            'direccion'=>'required',
            'ciudadnombre'=>'required',
            'matricula'=>'required',
            'observaciones'=>'required'
        ];
    }
}
