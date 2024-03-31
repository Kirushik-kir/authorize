<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    // public function authorize(): bool
    // {
    //     return false;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        // Password streight check
        // 
        // English uppercase characters (A – Z)
        // English lowercase characters (a – z)
        // Base 10 digits (0 – 9)
        // Non-alphanumeric (For example: !, $, #, or %)
        // Unicode characters
        return [
            'email' => 'required|email:rfc,dns|unique:users,email',
            'password' => 'required|min:6|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/',
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json([
                'message' => 'Validation errors',
                'data' => $validator->errors(),
            ]),
        );
    }

    public function weakPassword(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json([
                'message' => 'Weak password',
                'data' => $validator->errors(),
            ]),
        );
    }

    public function messages()
    {
        return [
            'email.required' => 'Email is required',
            'email.email' => 'Email is not correct',
            'password.min' => 'Password is short',
            'password.regex' => 'Password is weak',
        ];
    }
}
