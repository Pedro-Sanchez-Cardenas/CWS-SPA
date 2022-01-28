<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ParametersRequest extends FormRequest
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
            // Pretratamiento
            'pump' => 'nullable|min:0|array:well,feed', // We validate the array
            'pump.well.*' => [
                'nullable',
                'numeric'
            ],
            'pump.feed.*' => [
                'nullable',
                'numeric'
            ],

            'pumpf' => 'nullable|min:0|array:well,feed', // We validate the array
            'pumpf.well.*' => [
                'nullable',
                'numeric'
            ],
            'pumpf.feed.*' => [
                'nullable',
                'numeric'
            ],

            'mm' => 'required|min:2|array:in,out', // We validate the array
            'mm.in.*' => [
                'required',
                'numeric'
            ],
            'mm.out.*' => [
                'required',
                'numeric'
            ],

            'backwash' => 'required|min:1|array', // We validate the array
            'backwash.*' => [
                'required',
                'integer'
            ],

            'pf' => 'required|min:2|array:in,out', // We validate the array
            'pf.in.*' => [
                'required',
                'numeric'
            ],
            'pf.out.*' => [
                'required',
                'numeric'
            ],

            'filtros' => 'required|min:1|array',

            // Operacion
            'hp' => 'required|min:4|array:op,fr,in,out', // We validate the array
            'hp.op.*' => [
                'required',
                'numeric'
            ],
            'hp.fr.*' => [
                'required',
                'numeric'
            ],
            'hp.in.*' => [
                'required',
                'numeric'
            ],
            'hp.out.*' => [
                'required',
                'numeric'
            ],

            'booster' => 'nullable|min:0|array', // We validate the array
            'booster.op.*' => [
                'nullable',
                'numeric'
            ],
            'booster.fr.*' => [
                'required',
                'numeric'
            ],

            'booster.co.*' => [
                'nullable',
                'numeric'
            ],
            'booster.cp.*' => [
                'nullable',
                'numeric'
            ],

            'sdi' => 'nullable|min:0|array', // We validate the array
            'sdi.*' => [
                'nullable',
                'numeric'
            ],

            'ph' => 'required|min:2|array:op,pro', // We validate the array
            'ph.op.*' => [
                'required',
                'numeric'
            ],
            'ph.pro' => [
                'required',
                'numeric'
            ],

            'temperature' => 'required|min:1|array', // We validate the array
            'temperature.*' => [
                'required',
                'numeric'
            ],

            'reject' => 'required|min:1|array:flow', // We validate the array
            'reject.flow.*' => [
                'required',
                'numeric'
            ],

            'feed' => 'required|min:2|array:co,flow', // We validate the array
            'feed.co.*' => [
                'required',
                'numeric'
            ],
            'feed.flow.*' => [
                'required',
                'numeric'
            ],

            'permeate' => 'required|min:2|array:co,flow', // We validate the array
            'permeate.co.*' => [
                'required',
                'numeric'
            ],
            'permeate.flow.*' => [
                'required',
                'numeric'
            ],

            'rejection' => 'required|min:1|array', // We validate the array
            'rejection.*' => [
                'required',
                'numeric'
            ],

            'reject' => 'required|min:1|array', // We validate the array
            'reject.*' => [
                'required',
                'numeric'
            ],

            'px' => 'nullable|min:0|array',
            'px.*' => [
                'sometimes',
                'numeric'
            ],

            // Agua Producto
            'hardness' => [
                'required',
                'numeric'
            ],

            'tds' => [
                'required',
                'numeric'
            ],

            'h2s' => [
                'required',
                'numeric'
            ],

            'free_chlorine' => [
                'required',
                'numeric'
            ],

            'chloride' => [
                'nullable',
                'numeric'
            ],

            'reading' => 'required|min:1|array', // We validate the array
            'reading.*' => [
                'required',
                'numeric'
            ],

            'irrigation' => [
                'sometimes',
                'numeric'
            ],

            'municipal' => [
                'required',
                'numeric'
            ],

            'typeUser' => [
                'required',
                Rule::in(['Super-Admin', 'Operations-Manager', 'Manager', 'Operator']),
            ],

            'tanks' => 'nullable|min:0|array',
            'tanks.*' => [
                'required',
                'integer',
                'min:0',
                'max:100'
            ],

            'calcium_chloride' => [
                'required',
                'numeric'
            ],

            'sodium_carbonate' => [
                'required',
                'numeric'
            ],

            'sodium_hypochloride' => [
                'required',
                'numeric'
            ],

            'antiscalant' => [
                'required',
                'numeric'
            ],

            'sodium_hydroxide' => [
                'required',
                'numeric'
            ],

            'hydrochloric_acid' => [
                'required',
                'numeric'
            ],

            'kl1' => [
                'required',
                'numeric'
            ],

            'kl2' => [
                'required',
                'numeric'
            ],

            'observations' => 'required|min:3|array:pre,op,pw', // We validate the array
            'observations.*' => [
                'nullable'
            ]
        ];
    }
}
