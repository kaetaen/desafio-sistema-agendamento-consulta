<?php

namespace App\Http\Controllers;

use App\Models\MedicalConsultation;
use App\Http\Requests\MedicalConsultationRequest;
use App\Traits\HandleExceptions;
use Illuminate\Support\Carbon;

class MedicalConsultationController extends Controller
{
    use HandleExceptions;

    public function create(MedicalConsultationRequest $request)
    {
        try {
            $consultation = MedicalConsultation::create([
                'medico_id' => $request->medico_id,
                'paciente_id' => $request->paciente_id,
                'data' => Carbon::now()
            ]);
            return response()->json($consultation->fresh(), 201);

        } catch (\Exception $e) {
            $message = 'Error when trying to create consultation';
            $this->handleException($e, 500,$message);
        }
    }
}
