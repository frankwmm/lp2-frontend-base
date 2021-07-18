<?php
  
namespace App\Models;
  
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
  
class Matricula extends Model
{
    use HasFactory;
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */


    protected $table = 'contrato_matricula';
    public $timestamps = false;
    //protected $keyType = 'number';

    /*protected $casts = [
        'cont_periodo_estado' => 'boolean',
    ];*/

    protected $primaryKey = 'id';
    protected $fillable=[
        'id',
        'cod_matricula', 
        'confirmacion',
        'periodo_id', 
        'alumno_id',
        'representante_id',
        'updated_at',
        'created_at',
        'nivel',
        'grado'
    ];
    
}