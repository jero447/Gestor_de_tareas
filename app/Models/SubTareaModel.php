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
    protected $allowedFields    = ["titulo","descripcion","prioridad","estado","fecha_de_vencimiento","idResponsable" ,"idTarea"];


    public function insertarSubTarea($data){

        return $this->insert($data);
 
    }

    public function obtenerTodasSubtareas(){
        return $this->findAll();
    }

    public function obtenerSubTareasConCantidad($idTarea){

        $subtareas = $this->where("idTarea", $idTarea)->findAll();
        $cantidad = count($subtareas);

        return [
            "subtareas" => $subtareas,
            "cantidad" => $cantidad
        ];

    }

    public function eliminacionSubTarea($id){
        return $this->delete($id);
    }
    

    public function obtenerSubTareaPorId($id){
        return $this->where("idSubTarea", $id)->first();
    }

    public function actualizarSubTarea($id,$data){
        return $this->update($id,$data);
    }

    public function obtenerDatosUnion(){
        
        $builder = $this->db->table('sub_tarea');

        $builder->select("idTarea, tareas.estado");

        $builder->join("tareas", "tareas.idTarea = sub_tarea.idTarea");

        $query = $builder->get();

        $results = $query->getResult();

        return $results;

    }





}
