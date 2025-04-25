<?php

namespace App\Models;

use CodeIgniter\Model;

class TareaModel extends Model
{
    protected $table            = 'tareas';
    protected $primaryKey       = 'idTarea';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $allowedFields    = ["titulo","descripcion","prioridad","estado","fecha_de_vencimiento","idUsuario"];

    
    public function insertarTarea($data){

       return $this->insert($data);

    }

    public function obtenerTareas(){
        return $this->where("idUsuario",session("idUsuario"))->findAll();
    }

    public function obtenerTareaPorId($id){
        return $this->where("idTarea", $id)->first();
    }

    public function eliminacionTarea($id){
        return $this->delete($id);
    }

    public function actualizarTarea($id,$data){
        return $this->update($id,$data);
    }
    
}
