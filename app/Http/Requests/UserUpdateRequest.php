<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
    public function rules(User $user)
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255' . $user->id,
            'birthdate' => 'nullable|date',
            'password' => 'nullable|string|min:6|confirmed',
            'roles' => 'array|exists:roles,id',
            'permissions' => 'array|exists:permissions,id'
        ];
    }
}
