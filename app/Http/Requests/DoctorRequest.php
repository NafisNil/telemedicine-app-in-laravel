<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DoctorRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            //
            'full_name' => 'required',
            'phone' => 'required',
            'price' => 'required',
            'address' => 'required',
            'dob' => 'required',
            'specialization_id' => 'required',
            'email' => 'required',
            'experience' => 'required',
            'bio' => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
}
