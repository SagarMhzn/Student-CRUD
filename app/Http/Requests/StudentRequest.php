<?php

namespace App\Http\Requests;

use App\Models\Student;
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
    // public function rules()
    // {
    //     $checkNullableOrRequired = isset($this->student) ? 'nullable' : 'required|file|mimes:jpeg,png,gif,jpg|max:2048';
    //     return [
    //         'name' => 'required|max:20',
    //         // 'phone_no' => 'required|min:10|max:10|unique:students,phone_no|numeric',
    //         'phone_no' => 'required|min:10|max:10|numeric',
    //         'address' => 'required',
    //         'email' => 'required|email|unique:users|unique:students,email',
    //         'image' =>  $checkNullableOrRequired,
    //         'gender' => ['required', Rule::in(['Male', 'Female', 'Other'])],
    //         'dob' => 'required|date'
    //     ];

    // }

    public function rules(Student $student)
    {
        // if ($this->isMethod('GET')) {
        //     return [
        //         'name' => 'required|max:20',
        //     // 'phone_no' => 'required|min:10|max:10|unique:students,phone_no|numeric',
        //     'phone_no' => 'required|regex:/^[0-9]{10}$/|numeric|unique:students',
        //     'address' => 'required',
        //     'email' => 'required|email|unique:users|unique:students,email',
        //     'image' =>  'image|mimes:jpeg,png,gif|max:2048',
        //     'gender' => ['required', Rule::in(['Male', 'Female', 'Other'])],
        //     'dob' => 'required|date'
        //     ];
        // } else
        if ($this->isMethod('POST')) {
            return [
                'name' => 'required|max:20',
                // 'phone_no' => 'required|min:10|max:10|unique:students,phone_no|numeric',
                'phone_no' => 'required|regex:/^[0-9]{10}$/|numeric|unique:students',
                'address' => 'required',
                'email' => 'required|email|unique:users|unique:students,email,$id,id',
                'image' =>  'image|mimes:jpeg,png,gif|max:2048',
                'gender' => ['required', Rule::in(['Male', 'Female'])],
                'dob' => 'required|date',
                
                'startdate' => 'required',
                'enddate' => 'required',
                'level' => 'required',
                'uni' => 'required',
                'college' => 'required',
                'email' => 'required|unique:students,email'
            ];
        } elseif (($this->isMethod('PUT')) || ($this->isMethod('PATCH'))) {
            $rules = [
                'name' => 'required|max:20',
                // 'phone_no' => 'required|min:10|max:10|unique:students,phone_no|numeric',
                'phone_no' => 'required|regex:/^[0-9]{10}$/|numeric',
                'address' => 'required',
                // 'email' => 'required|email',Rule::unique('students')->ignore($this->route('id'))],
                'image' =>  'image|mimes:jpeg,png,gif|max:2048',
                'gender' => ['required', Rule::in(['Male', 'Female'])],
                'dob' => 'required|date',
                'email'=>Rule::unique('students')->ignore($this->route('student')),
                
            ];

            

            return $rules;
        }

        return [];
    }

    public function make_student()
    {
    }
}
