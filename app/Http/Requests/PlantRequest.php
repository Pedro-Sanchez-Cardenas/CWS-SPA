<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PlantRequest extends FormRequest
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
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'cisterns.capacity.*' => 'cisterns capacity',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        return [
            'cover' => [
                'image',
                'mimes:jpg,jpeg,png'
            ],
            'plantName' => [
                'required',
                'string',
                'min:1',
                'max:300',
                Rule::unique('plants', 'name')
            ],
            'plantType' => [
                'required',
                'integer',
                Rule::exists('plant_types', 'id')
            ],
            'location' => [
                'required',
                'string',
                'min:1',
                'max:100'
            ],
            'company' => [
                'required',
                'integer',
                Rule::exists('companies', 'id')
            ],
            'plantCountry' => [
                'required',
                'integer',
                Rule::exists('countries', 'id')
            ],
            'plantCorrency' => [
                'required',
                'integer',
                Rule::exists('currencies', 'id')
            ],
            'plantOperator' => [
                'required',
                'integer',
                Rule::exists('users', 'id')
            ],
            'plantManager' => [
                'required',
                'integer',
                Rule::exists('users', 'id')
            ],


            'cisterns' => 'nullable|min:0|max:30|array:capacity', // We validate the array

            'cisterns.capacity.*' => [
                'nullable',
                'numeric'
            ],

            // Personalization
            'riego' => 'sometimes',
            'sdi' => 'sometimes',
            'chloride' => 'sometimes',
            'wellPump' => 'sometimes',
            'feedPump' => 'sometimes',
            'boosterc' => 'sometimes',
            'feed' => 'sometimes',
            'reject' => 'sometimes',



            'pdf' => [
                'mimes:pdf'
            ],

            // Plant Contract
            'botM3' => [
                'nullable',
                'numeric'
            ],
            'botFixed' => [
                'nullable',
                'numeric'
            ],
            'o&mM3' => [
                'nullable',
                'numeric'
            ],
            'o&mFixed' => [
                'nullable',
                'numeric'
            ],
            'remineralisationM3' => [
                'nullable',
                'numeric'
            ],

            'yearsOfContract' => [
                'required',
                'integer',
                'between:1,16'
            ],
            'from' => [
                'date'
            ],
            'till' => [
                'date',
                'after_or_equal:from'
            ],
            'billingDay' => [
                'integer',
                'between:1,30'
            ],
            'billingPeriod' => [
                'required',
                'integer',
                Rule::exists('billing_periods', 'id')
            ],
            'minimumConsumption' => [
                'nullable',
                'numeric'
            ],


            'trains' => 'required|min:1|array:capacity,tds,booster,mf,pft,pfq,mArea,mElements', // We validate the array

            'trainCapacity' => [
                'required',
                'integer'
            ],
            'trainTds' => [
                'required',
                'integer'
            ],
            'trainBooster' => [
                'required',
                'integer'
            ],
            'multimediaFilsters' => [
                'required',
                'integer'
            ],
            'polishFilters' => [
                'required',
                'integer'
            ],
            'polishQuantity' => [
                'required',
                'integer'
            ],
            'trains.mArea.*' => [
                'required',
                'integer'
            ],
            'trains.mElements.*' => [
                'required',
                'integer'
            ]
        ];
    }

    /**
     * Configure the validator instance.
     *
     * @param \Illuminate\Validation\Validator $validator
     * @return void
     */
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            // Validamos que el role del Manager sea realmente Manager
            $role = User::where('id', $this->manager)->role('Manager')->get();

            if ($role->count() == 0) {
                $validator->errors()->add('manager', 'The role of the selected operator is invalid');
            }

            //Verificamos que el minimun consumption sea menor o igual al total de la capacidad de los trenes
            $sum = 0;
            for ($i = 0; $i < sizeof($this->trains['capacity']); $i++) {
                $sum += $this->trains['capacity'][$i];
            }

            if ($this->minimun > $sum) {
                $validator->errors()->add('minimun', 'The minimum consumption can´t be greater than the total production capacity of the trains.');
            }
        });
    }
}
