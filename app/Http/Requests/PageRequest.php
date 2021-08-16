<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PageRequest extends FormRequest
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
            'nom' => ['required', 'min:0', 'max:50',
            function( $attribute, $value, $fail){
                if ( $value == 'nom') {
                    $fail ( $attribute . 'nom est invalid');
                }
            }
             
        ],
            'numero' => 'required',
            'thematique_id' => 'required',
            'date' => 'required',
            'objet' => 'required',
            'lieu' => 'required',
            'flag' => 'required',
            'latitude'  => 'nullable|required_with:longitude|max:15',
            'longitude' => 'nullable|required_with:latitude|max:15',
            'description' => 'required',
        ];
    }
}
