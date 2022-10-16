<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransectionRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'transection_category_id' => 'nullable',
            'price' => 'required|integer',
            'type' => 'required|string',
            'is_income' => 'required',
            'is_completed' => 'required',
            'filename.*' => 'nullable|mimes:doc,pdf,docx,zip,jpg,png,jpeg',
        ];
    }
}
