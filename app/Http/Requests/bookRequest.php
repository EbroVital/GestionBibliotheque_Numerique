<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class bookRequest extends FormRequest
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
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'auteur_id' => 'required|exists:auteur,id',
            'categorie_id' => 'required|exists:categories,id',
            'page' => 'required|string',
            'langue' => 'required|string',
            'annee_publication' => 'required|integer',
            'image' => 'required',
        ];
    }
}
