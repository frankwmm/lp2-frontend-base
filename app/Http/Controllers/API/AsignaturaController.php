<?php

namespace App\Http\Controllers\API;

use App\Models\Asignatura;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\API\BaseController as BaseController;
use Validator;
use App\Http\Resources\Asignatura as AsignaturaResource;

class AsignaturaController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$asignaturas = Asignatura::all();
        $asignaturas = DB::select('select id, nombre, detalle, created_at, updated_at from asignatura');
        return $this->sendResponse(AsignaturaResource::collection($asignaturas), 'Asignaturas retrieved successfully.');

    }

   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'nombre' => 'required',
            'detalle' => 'required'
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        $asignaturas = Asignatura::create($input);

        return $this->sendResponse(new AsignaturaResource($asignaturas), 'Asignatura created successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Asignatura  $asignatura
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $asignatura = Asignatura::find($id);
  
        if (is_null($asignatura)) {
            return $this->sendError('Asignatura not found.');
        }
   
        return $this->sendResponse(new AsignaturaResource($asignatura), 'Asignatura retrieved successfully.');
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Asignatura  $asignatura
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Asignatura $asignatura)
    {
        $input = $request->all();
   
        $validator = Validator::make($input, [
            'nombre' => 'required',
            'detalle' => 'required'
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $asignatura->nombre = $input['nombre'];
        $asignatura->detalle = $input['detalle'];

        

        $asignatura->save();
   
        return $this->sendResponse(new AsignaturaResource($asignatura), 'Asignatura updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Asignatura  $asignatura
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //$asignaturas->delete();
        
        Asignatura::destroy($id);   
        return $this->sendResponse([], 'Asignatura deleted successfully.');
    }
}
