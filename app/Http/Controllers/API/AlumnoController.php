<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Controllers\API\RegisterController as UserController;
use App\Models\Alumno;
use Validator;
use App\Http\Resources\Alumno as AlumnoResource;
use Illuminate\Support\Facades\DB;


class AlumnoController extends BaseController
{
    
    
    public function index()
    {
     
        $alumnosuser=array();


        $sql="select 
        a.id, a.cod_alumno, a.user_id, u.id, u.appaterno, u.apmaterno, u.name 
        from alumno a, users u
        where a.id=u.id";

        // mejora  $sql="select *from users";


        $alumnos= DB::select($sql);        

        $alumnosuser['data']=$alumnos;

        return $alumnosuser;
    //    return $this->sendResponse(AlumnoResource::collection($alumnos), 'Alumnos retrieved successfully.');
    }


    public function show($id)    
    {
     
        $alumnosuser=array();


        $sql="select 
        a.id, a.cod_alumno, a.user_id, u.id, u.appaterno, u.apmaterno, u.name 
        from alumno a, USERs u
        where a.id=u.id  and  a.id='".$id."' ";
        $alumno= DB::select($sql);        

        $alumnosuser['data']=$alumnos;

        return $alumno;
    //    return $this->sendResponse(AlumnoResource::collection($alumnos), 'Alumnos retrieved successfully.');
    }

    public function ReporteAlumnos()
    {
        $alumnos = Alumno::all();
    return $alumnos;
    //    return $this->sendResponse(AlumnoResource::collection($alumnos), 'Alumnos retrieved successfully.');
    }

    public function ReporteAlumnoId($id)
    {
        $alumno = Alumno::find($id);
  
        if (is_null($alumno)) {
            return $this->sendError('Alumno not found.');
        }
        return $alumno;
        //return $this->sendResponse(new AlumnoResource($alumno), 'Alumno retrieved successfully.');
    }



    public function ReporteAlumnosUser()
    {
        $UserClass = new RegisterController();
        $alumnosuser=array();
        $alumnos =self::ReporteAlumnos();

        foreach($alumnos as $alum){
            $datouser=$UserClass->showUser($alum->id);
                        
            $datas=[
                'id'=>$alum->id,
                'cod_alumno'=>$alum->cod_alumno,
                'user_id'=>$alum->user_id,
                'user'=>$datouser,
                'created_at'=>$alum->created_at,
                'updated_at'=>$alum->updated_at
            ];

            $alumnosuser[]=$datas;

        }
        
        $jalumnosuser['data']=$alumnosuser;

        return response()->json($alumnosuser);
          //return $this->sendResponse(AlumnoResource::collection($alumnosuser), 'Alumnos retrieved successfully.');
    }


}
