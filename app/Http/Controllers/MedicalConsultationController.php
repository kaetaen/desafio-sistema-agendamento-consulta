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
            $consultation = MedicalConsultation::create($request->all());
            return response()->json($consultation->fresh(), 201);

        } catch (\Exception $e) {
            $message = 'Error when trying to create consultation';
            $this->handleException($e, 500,$message);
        }
    }
}
