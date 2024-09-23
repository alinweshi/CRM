<?php

namespace Crm\base\requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

abstract class ApisRequest extends FormRequest
{
    /**
     * Determine if the us0--0er is authorized to make this request.
     */
    abstract public function authorize(): bool;
//    {
//        return true;
//    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    abstract public function rules(): array;
//    {
//
//        return [
//            'name'=>"required|string|min:5",
//            "email"=>"email",
//            'password' => [
//                'required',
//                'string',
//                'min:5',             // must be at least 10 characters in length
//                'regex:/[a-z]/',      // must contain at least one lowercase letter
//                'regex:/[A-Z]/',      // must contain at least one uppercase letter
//                'regex:/[0-9]/',      // must contain at least one digit
//                'regex:/[@$!%*#?&]/', // must contain a special character
//            ],
//            ];
//    }
    protected function failedValidation(Validator $validator)
    {
        $errors = (new ValidationException($validator))->errors();
        if(!empty($errors))
        {
            $Transformederrors=[];
            foreach($errors as $field =>$message)
            {
                $Transformederrors[]=
                    [
                    $field =>$message,
                    ];
            }
        }
        throw new HttpResponseException(
            response()->json
            (
                [
                    "status"=>"error",
                    "error"=>$Transformederrors
                ],
                jsonResponse::HTTP_BAD_REQUEST
            )
        );
    }
}
