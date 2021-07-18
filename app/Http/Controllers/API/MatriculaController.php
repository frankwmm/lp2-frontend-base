<?php
   
namespace App\Http\Controllers\API;
   
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Matricula;
use Validator;

   
class MatriculaController extends BaseController
{
   
    public function store(Request $request)
    {
        $input = $request->all();
   
        $input['confirmacion']="S";
       


        $input['cod_matricula']="2021-00006";
      
   
        $matricula = Matricula::create($input);


        /*if($input['grado4']=="S"&secundarioa)
        seleccione los cursos para quinto año seccion a de la tbal cursos_docente_seccion
        insert en la tbal alumno_curso_acad(en esta tabla los cursos matriculados)
        */


        return $matricula;
    } 
    public function cursosAmatricular($idGrado, $idNivel,$Seccion )    
    {
     /*
        $cursossss=array();

        $sql="select a.id from curso_docente_seccion a, nivel b, grado c, seccion d
        where  b.id='".idNivel."'        
        and    d.nom_seccion='".Seccion."'
        and    a.seccion_id= d.id
        and    c.id='idGrado' ";
        $curso= DB::select($sql);
        //$cursossss['data']=$curso;
        return $curso;
    */
    }

    public function generaCodigoMatricula(){


    }


   
   
}