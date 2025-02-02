<?php

namespace App\Http\Controllers;

use App\Models\MedicalConsultation;
use App\Http\Requests\MedicalConsultationRequest;
use App\Traits\HandleExceptions;
use App\Models\Patient;

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

    public function getPatients(MedicalConsultationRequest $request, $id_medico)
    {
         try {
            $scheduledOnly  = $request->query('apenas_agendadas', false);
            $nome = $request->query('nome', '');
            
            $query = Patient::whereHas('consultas', function ($query) use ($id_medico) {
                $query->where('medico_id', $id_medico);
            });
    
            if ($nome) {
                $query->where('nome', 'like', '%' . $nome . '%');
            }
    
            $patients = $query->with(['consultas' => function ($query) use ($scheduledOnly) {
                if ($scheduledOnly) {
                    $query->where('data', '>', now()->format('Y-m-d H:i:s'));
                } 
                $query->orderBy('data', 'asc');
            }])->get();
    
            return response()->json($patients);
        } catch (\Exception $e) {
            $message = 'Error when try to get patients';
            return $this->handleException($e, 500, $message);
        }
    }
}
