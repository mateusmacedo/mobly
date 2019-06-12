<?php

namespace Mobly\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Transform the error messages into JSON
     *
     * @param array $errors
     * @return JsonResponse
     */
    public function response(array $errors): JsonResponse
    {
        return response()->json($errors, 422);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        $defaul_rules = [
            'last_name' => 'string|max:255',
        ];

        switch ($this->method()) {
            case 'POST':
                $rules = [
                    'username' => 'required|unique:users,username|max:255',
                    'first_name' => 'required|string|max:255',
                    'password' => 'required|min:8|max:255'
                ];
                break;
            case 'PUT':
                $rules = [
                    'username' => 'exists:users,username|max:255',
                    'first_name' => 'string|max:255',
                    'password' => 'min:8|max:255'
                ];
                break;
            default:
                break;
        }

        return array_merge($defaul_rules, $rules);

    }
}
