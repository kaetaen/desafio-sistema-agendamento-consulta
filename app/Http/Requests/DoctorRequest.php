<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DoctorRequest extends FormRequest
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
        if ($this->isMethod('post')) {
            return [
                'nome' => 'max:255|string',
                'especialidade' => 'string',
                'cidade_id' => 'exists:cidade,id'
            ];
        }

        if ($this->isMethod('get')) {
            return [
                'nome' => 'string|max:255',
            ];
        }
    }
}
