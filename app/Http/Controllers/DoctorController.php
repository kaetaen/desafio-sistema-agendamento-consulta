<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;
use App\Http\Requests\DoctorRequest;
use Illuminate\Support\Str;

class DoctorController extends Controller
{
    use \App\Traits\HandleExceptions;

    /**
     * Display a listing of the resource.
     */
    public function index(DoctorRequest $request)
    {
        try {
            $doctorName = $this->removeDoctorPrefix($request->nome);
            $doctors = Doctor::where('nome', 'like', "%{$doctorName}%")
                ->orderBy('nome', 'ASC')
                ->get();

            if ($doctors->isEmpty()) {
                return response()->json(['message' => 'No doctors found'], 404);
            }
            
            return response()->json($doctors, 200);
        }
        catch (\Exception $e) {
            $message = 'An error occurred when trying to list doctors';
            return $this->handleException($e, 500, $message);
        }   
    }

    /**
     * Creating a new resource.
     */
    public function create(DoctorRequest $request)
    {
        try {
            $created = Doctor::create([
                'nome' => $request->nome,
                'especialidade' => $request->especialidade,
                'cidade_id' => $request->cidade_id
            ]);

            return response()->json($created, 201);
        }
        catch (\Exception $e) {
            $message= 'Fails when try to create a new doctor';
            return $this->handleException($e, 500, $message);
        }
    }

    public function getDoctorsByCity(DoctorRequest $request, $id_cidade)
    {;
        try {
            $doctorName = $this->removeDoctorPrefix($request->nome);
            $doctors = Doctor::where('cidade_id', $id_cidade)
                ->where('nome', 'like', "%{$doctorName}%")
                ->orderBy('nome', 'ASC')
                ->get();

            if ($doctors->isEmpty()) {
                return response()->json(['message' => 'No doctors found'], 404);
            }

            return response()->json($doctors, 200);
        }
        catch (\Exception $e) {
            $message = 'An error occurred when trying to list doctors by city';
            return $this->handleException($e, 500, $message);
        }
    }

    private function removeDoctorPrefix(string|null $doctorName): string
    {
        if (empty($doctorName)) {
            return '';
        }
        $mapDoctorPrefix = ['dra.', 'dr.', 'dra', 'dr'];
        $exactDoctorName = '';

        foreach ($mapDoctorPrefix as $prefix) {
            $exactDoctorName = Str::replace($prefix, '', $doctorName, caseSensitive: false);
        }

        return $exactDoctorName;
    }
}
