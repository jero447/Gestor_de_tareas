<?php

namespace App\Models;

use CodeIgniter\Model;

class SubTareaModel extends Model
{
    protected $table            = 'sub_tarea';
    protected $primaryKey       = 'idSubTarea';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $allowedFields    = ["titulo","descripcion","prioridad","estado","fecha_de_vencimiento","idTarea"];


    public function insertarSubTarea($data){

        return $this->insert($data);
 
     }

     public function obtenerSubTareas($idTarea){

        return $this->where("idTarea", $idTarea)->findAll();

    }

    public function eliminacionSubTarea($id){
        return $this->delete($id);
    }
    

    public function obtenerSubTareaPorId($id){
        return $this->where("idSubTarea", $id)->first();
    }

}
