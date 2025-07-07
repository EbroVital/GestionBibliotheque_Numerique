<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class updateBookRequest extends FormRequest
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
            'titre' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'page' => 'sometimes|required|integer',
            'langue' => 'sometimes|required',
            'annee_publication' => 'sometimes|required|integer',
            'categorie_id' => 'sometimes|required|exists:categories,id',
            'auteur_id' => 'sometimes|required|exists:auteur,id',
            'image' => 'nullable|string',
        ];
    }
}
