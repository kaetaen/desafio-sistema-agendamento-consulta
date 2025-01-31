<?php

namespace App\Http\Controllers;

use App\Http\Requests\CityRequest;
use App\Models\City;
use Exception;

class CityController extends Controller
{

    use \App\Traits\HandleExceptions;

    public function index(CityRequest $request)
    {
        try {
            $cities = City::where("nome", "like", "%{$request->nome}%")
                ->orderBy('nome', 'ASC')
                ->get();
            
            return response()->json($cities, 200);

        } catch (Exception $e) {
            $error = "An error occurred when trying to list cities";
            return $this->handleException($e, 500, $error);
        }
    }
}
