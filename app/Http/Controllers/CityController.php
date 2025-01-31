<?php

namespace App\Http\Controllers;

use App\Models\City;
use Exception;

class CityController extends Controller
{

    use \App\Traits\HandleExceptions;

    public function index()
    {
        try {
            $cities = City::all('id', 'nome', 'estado');
            return response()->json($cities, 200);

        } catch (Exception $e) {
            $error = "An error occurred when trying to list cities";
            return $this->handleException($e, 500, $error);
        }
    }
}
