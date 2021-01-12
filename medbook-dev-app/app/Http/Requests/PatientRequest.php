<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PatientRequest extends FormRequest
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
            'gender_id' => 'integer|required|exists:tbl_gender,gnd_id',
            'service_id' => 'integer|required|exists:tbl_service,srv_id',
            'name' => 'string|required|unique:tbl_patient,name|max:255',
            'dob' => 'required|date',
            'comments' => 'string|required|max:255'
        ];
    }

    /**
     * Documentation
     */
    public function bodyParameters()
    {
        return [
            "gender_id" => [
                "description" => "Gender of the patient",
            ],
            "service_id" => [
                "description" => "Type of Service",
            ],
            "name" => [
                "description" => "Name of the patient",
            ],
            "dob" => [
                "description" => "Patient's date of birth",
            ],
            "comments" => [
                "description" => "General comments about the patient",
            ]
        ];
    }
}
