<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        $rules = [
            'title_en' => 'required',
            'full_text_en' => 'required',
        ];

        foreach (config('app.available_locales') as $locale) {
            $rules['title_' . strtolower($locale)] = 'string';
            $rules['full_text_' . strtolower($locale)] = 'string';
        }

        return $rules;
    }
}
