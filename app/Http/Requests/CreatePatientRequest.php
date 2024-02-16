<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePatientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            //
            'cin' => 'max:10',
            'nom_patient' => 'required',
            'prenom_patient' => 'required',
            'age_patient' => 'required|min:1|max:3',
            'sexe_patient' => 'required|string',
            'mutuelle_patient' => 'required|string',
            'tel_patient' => 'max:10',
            'adresse_patient' => 'required|string',
            'taille_patient' => 'max:3',
            'poids_patient' => 'max:3',
            'groupesanguin' => 'required|string'
        ];
    }
}
