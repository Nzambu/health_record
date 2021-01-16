<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmailRequest extends FormRequest
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
            'email' => 'required|email|unique:emails,email',
            'primary' => 'nullable|boolean',
            'verified' => 'nullable|boolean'
        ];
    }

    /**
     * Documentation
     * 
     * @return array
     */
    public function bodyParameters()
    {
        return [
            'email' => [
                'description' => 'The user email'
            ],
            'primary' => [
                'description' => 'True if the number is primary, else, false'
            ],
            'verified' => [
                'description' => 'True if the number is verified, else, false'
            ]
        ];
    }

}
