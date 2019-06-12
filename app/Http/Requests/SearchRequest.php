<?php

namespace Mobly\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;

class SearchRequest extends FormRequest
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
        $rules = [
            'params' => 'required|array|min:1',
            'params.*.field' => 'max:255',
            'params.*.value' => 'max:255',
            'params.*.dataInicio' => 'date_format:Y-m-d',
            'params.*.dataFim' => 'date_format:Y-m-d',
        ];

        return $rules;
    }
}
