<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserEditRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $this->user->id,
            'image' => 'nullable|image|max:2048',
            'bio' => 'nullable|string|max:1000',
            'roles' => 'required|array',
            'roles.*' => 'exists:roles,id',
            'statuses' => 'required|array',
            'statuses.*' => 'exists:statuses,id',
        ];
    }
}
