<?php

namespace App\Http\Controllers;

use App\Models\MedicalConsultation;
use App\Http\Requests\MedicalConsultationRequest;
use App\Traits\HandleExceptions;
use Illuminate\Support\Carbon;

class MedicalConsultationController extends Controller
{
    use HandleExceptions;

    public function index(MedicalConsultationRequest $request)
    {
        try {
            $doctors = MedicalConsultation::where('medico_id', 'like', "%{$request->medico_id}%")
                ->orderBy('id', 'ASC')
                ->get();

            if ($doctors->isEmpty()) {
                return response()->json(['message' => 'No consultations found'], 404);
            }

            return response()->json($doctors, 200);

        } catch (\Exception $e) {
            $message = 'An error occurred when trying to list consultations';
            return $this->handleException($e, 500, $message);    
        }
    }

    public function create(MedicalConsultationRequest $request)
    {
        try {
            $consultation = MedicalConsultation::create($request->all());
            return response()->json($consultation->fresh(), 201);

        } catch (\Exception $e) {
            $message = 'Error when trying to create consultation';
            $this->handleException($e, 500,$message);
        }
    }
}
