<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title'=>'required|string|max:255',
            'auth_name' => 'required|string|max:255',
            'category_id'=>'required|exists:categories,id',
            'description'=>'required|string',
            'pages'=>'integer|min:1',
            'publication_year' => 'required|integer|digits:4|max:' . date('Y'),
            'image_cover'=>'required|file|mimes:jpg,png,jpeg|max:10240',
            'pdf' => 'required|file|mimes:pdf|max:10240',       
         ];
    }
}
