<?php

namespace sisOdonto\Http\Requests;

use sisOdonto\Http\Requests\Request;
use Carbon\Carbon;
class PacienteFormRequest extends Request
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

    $fechamax=Carbon::now()->subYears(18);
    $fechamax=$fechamax->format('Y-m-d');

    $before_date = Carbon::now()->subYears(100)->toDateString();
    $after_date = Carbon::now()->subYears(18)->toDateString();
        return [
            'nombre'=>'required|max:50',
            'apellido'=>'required|max:50',
            'idobra_social'=>'required',
            'nacimiento'=>'required|date',
            'tipo_sangre'=>'required',
            'idtipo_documento' => 'required',
            'documento'=>'required|numeric',
            'nacimiento'=>'required|date|before:' . $after_date . '|after:' . $before_date,
            'ciudadnombre'=>'required',
            'telefono'=>'required',
            'email' => 'required',
            'contradicciones'=>'required'
        ];
    }
}
