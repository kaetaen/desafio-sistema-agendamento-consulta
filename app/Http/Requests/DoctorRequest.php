<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
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
        $rules = [];

        if ($this->isMethod('post')) {
            $rules = [
                'nome' => 'max:255|string',
                'especialidade' => 'string',
                'cidade_id' => 'exists:cidade,id'
            ];
        }

        if ($this->isMethod('get')) {
            $rules = [
                'nome' => 'string|max:255',
            ];
            if ($this->route()->named('getDoctorsByCity')) {
                $rules['id_cidade'] = 'required|integer|exists:cidade,id';
            }
        }

        return $rules;
    }

    protected function prepareForValidation() 
    {
        $this->merge(['id_cidade' => $this->route('id_cidade')]);       
    }
}
