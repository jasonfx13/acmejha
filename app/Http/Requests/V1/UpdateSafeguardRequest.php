<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSafeguardRequest extends FormRequest
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
        $method = $this->method();

        if($method == 'PUT') {
            return [
                //
                'title' => ['required'],
                'hazardId' => ['required']
            ];
        } else {
            return [
                //
                'title' => ['sometimes', 'required'],
                'hazardId' => ['sometimes', 'required']
            ];
        }
    }

    protected function prepareForValidation()
    {
        if($this->hazardId) {
            $this->merge([
                'hazard_id' => $this->hazardId
            ]);
        }

    }
}
