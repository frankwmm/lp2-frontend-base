<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\DB;


class PeriodoController extends BaseController
{
    
    public function index()
    {
     
        $periodos=array();

        $sql="select * from periodo";
        $periodo= DB::select($sql);        

        $periodos['data']=$periodo;

        return $periodos;
    //    return $this->sendResponse(AlumnoResource::collection($alumnos), 'Alumnos retrieved successfully.');
    }

}
