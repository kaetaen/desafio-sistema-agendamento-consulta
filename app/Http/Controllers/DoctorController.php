<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
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
            $mapDoctorPrefix = ['dra.', 'dr.', 'dra', 'dr'];
            $doctorName = $request->nome;
            $exactDoctorName = '';

            foreach ($mapDoctorPrefix as $prefix) {
                $exactDoctorName = Str::replace($prefix, '', $doctorName, caseSensitive: false);
            }
            
            $doctors = Doctor::where('nome', 'like', "%{$exactDoctorName}%")
                ->orderBy('nome', 'ASC')
                ->get();
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
}
