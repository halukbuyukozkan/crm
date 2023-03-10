<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class JobRequest extends FormRequest
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
            'status_id' => 'required|string',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'deadline' => 'nullable|date|after:today',
            'users' => 'array|required',
        ]; 
    }
}
