<?php

namespace App\Http\Requests\Form;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    protected $redirect = '/register';

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
            'nama' => ['required', 'max:100', 'alpha'],
            'username' => ['required', 'min:3', 'unique:users,username', 'max:30'],
            'email' => ['required', 'unique:users,email', 'email'],
            'password' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'nama.required' => 'nama harus diisi',
            'nama.max' => 'batas maximal nama 100 karakter',
            'nama.alpha' => 'abjad nama wajib alphabet',
            'username.required' => 'username wajib diisi',
            'username.min' => 'batas minimal username 3 karakter',
            'username.unique' => 'username telah terdaftar',
            'username.max' => 'batas maximal username 30 karakter',
            'email.required' => 'email wajib diisi',
            'email.unique' => 'email telah terdaftar',
            'email.email' => 'format email tidak valid',
            'password.required' => 'password wajib diisi',
        ];
    }
}
