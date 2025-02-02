<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use App\Traits\HandleExceptions;
use App\Http\Requests\PatientRequest;

class PatientController extends Controller
{
    
    use HandleExceptions;

    public function create(PatientRequest $request)
    {
        try {
            $patient = Patient::create($request->all());
            return response()->json($patient->refresh(), 201); 

        } catch (\Exception $e) {
            $message = 'Error when try to get patients';
            return $this->handleException($e, 500, $message);
        }   
    }
    
    public function update(PatientRequest $request, $id_paciente)
    {
        try {
            $patient = Patient::findOrFail($id_paciente);
            $patient->update($request->all());
            return response()->json($patient, 200);

        } catch (\Exception $e) {
            $message = 'Error when try to update patient';
            return $this->handleException($e, 500, $message);
        }
    }
}
