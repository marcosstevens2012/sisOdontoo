<?php

namespace sisOdonto\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Carbon\Carbon;

class TurnoFormRequest extends FormRequest
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

        $before_date = Carbon::now()->subDay()->toDateString();
        $after_date = Carbon::now()->addYears(1)->toDateString();
        

        $inicio = Carbon::create(1975, 12, 25, 7)->toTimeString();
        $fin = Carbon::create(1975, 12, 25, 21)->toTimeString();;
        return [
        'idpaciente'=>'required',
        'profesional'=>'required',
        //'hora_inicio'=>'required|before:' . $fin . '|after:' . $inicio,
        'hora_fin'=>'required',
        'fecha'=>'required|date|before:' . $after_date . '|after:' . $before_date,
        'idestado_turno',
        'observaciones'=>'required|max:512',
        'idturno',
        'idestado_turno'
        ];
    }
    
}
