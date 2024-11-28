<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LocatorRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
        {
            $id = $this->route('locator'); 

            return [
                'name' => 'required|string|max:255',
                'address' => 'required|string|max:255',
                'latitude' => 'required|string|between:-90,90',
                'longitude' => 'required|string|between:-180,180',  
                'website' => 'nullable|url',
                'contact_number' => 'required|digits:11',
            ];
        }


public function messages()
{
    return [
        'name.unique' => 'This HEI name has already been registered.',
        'latitude.required' => 'The latitude field is required.',
        'latitude.numeric' => 'The latitude must be a numeric value.',
        'latitude.between' => 'The latitude must be between -90 and 90.',
        'longitude.required' => 'The longitude field is required.',
        'longitude.numeric' => 'The longitude must be a numeric value.',
        'longitude.between' => 'The longitude must be between -180 and 180.',
        'name.required' => 'The name field is required.',
        'address.required' => 'The address field is required.',
        'website.max' => 'The website URL must not exceed 500 characters.',
        'contact_number.digits_between' => 'The contact number must be between 1 and 11 digits.',
    ];
}

}
