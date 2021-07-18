<?php
  
namespace App\Models;
  
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
  
class Alumno extends Model
{
    use HasFactory;
  
    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'id', 'cod_alumno', 'user_id'
    ];

    protected $table ='alumno';
}