<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BulkStoreHazards extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            //
            '*.stepId' => ['required', 'integer'],
            '*.title' => ['required', 'string']
        ];
    }

    protected function prepareForValidation()
    {
        $data = [];

        foreach ($this->toArray() as $obj) {
            $obj['step_id'] = $obj['stepId'] ?? null;

            $data[] = $obj;
        }

        $this->merge($data);
    }
}
