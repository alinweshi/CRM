<?php

namespace Crm\Project\Requests;
use Crm\base\requests\ApisRequest;
use Illuminate\Contracts\Validation\ValidationRule;

class CreateProjectRequest extends ApisRequest
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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return
            [
            "name" => "unique:projects|required|string|min:5|max:20",
            "status" => "required|integer",
            "Project_cost"=>"required|integer"
            ];
    }
}
