<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class StudentRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|max:20',
            'phone_no' => 'required|min:10|max:10',
            'address' => 'required',
            'email' => 'required|email',
            'image' => 'required|mimes:pdf,xlxs,xlx,docx,doc,csv,txt,png,gif,jpg,jpeg|max:2048',
            'gender' => ['required', Rule::in(['Male', 'Female', 'Other'])],
            'dob' => 'required|date'
        ];
    }

    public function make_student(){
        
    }
}
