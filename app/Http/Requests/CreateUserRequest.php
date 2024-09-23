<?php

namespace App\Http\Requests;

use Crm\base\requests\ApisRequest;
use Illuminate\Validation\Rules\Password;
use Laravel\Sanctum\HasApiTokens;


class CreateUserRequest extends ApisRequest
{
    use HasApiTokens;

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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "name"=>["required","max:255","unique:users,name"],
            'email'=>'required|email',
            'phone' => 'required|numeric|digits:11',
            "password"=>[
            Password::min(8)
            ->letters()
            ->mixedCase()
            ->numbers()
            ->symbols()
            ->uncompromised()
            ]


        ];
    }
}
