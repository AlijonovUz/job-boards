<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VacancyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check() && in_array(auth()->user()->role, ['employer', 'admin'], true);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ["required", "min:5", "max:50"],
            'company' => ["required", "min:5", "max:100"],
            'location' => ["required", "min:5", "max:100"],
            'description' => ["required", "min:10"]
        ];
    }

    public function validated($key = null, $default = null)
    {
        $validated = parent::validated($key, $default);

        if ($this->isMethod('POST') && auth()->check()) {
            $validated['user_id'] = auth()->id();
        }

        return $validated;
    }
}
