<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MedicalConsultationRequest extends FormRequest
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
        if ($this->isMethod('get')) {
            return [
                "medico_id" => "integer|exists:medico,id"
            ];
        }

        if ($this->isMethod('post')) {
            return [
                "medico_id" => "required|integer|exists:medico,id",
                "paciente_id" =>   "required|integer|exists:paciente,id",
                "data" => "required|date_format:Y-m-d H:i:s|after:now"
            ];
        }
    }
}
