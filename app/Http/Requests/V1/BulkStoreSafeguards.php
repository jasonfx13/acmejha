<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BulkStoreSafeguards extends FormRequest
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
            '*.hazardId' => ['required', 'integer'],
            '*.title' => ['required', 'string']
        ];
    }

    protected function prepareForValidation()
    {
        $data = [];

        foreach ($this->toArray() as $obj) {
            $obj['hazard_id'] = $obj['hazardId'] ?? null;

            $data[] = $obj;
        }

        $this->merge($data);
    }
}
