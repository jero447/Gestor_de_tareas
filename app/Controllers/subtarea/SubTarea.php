<?php

namespace App\Controllers\subtarea;

use App\Controllers\BaseController;

use App\Models\SubTareaModel;
use App\Models\TareaModel;

class SubTarea extends BaseController
{

    protected $modelSubTarea;
    protected $modelTarea;

    public function __construct() {
        $this->modelSubTarea = new SubTareaModel();
        $this->modelTarea = new TareaModel();
    }
    
    public function formularioCreacion($idTarea){
        echo view("layout/head");
        echo view("layout/header");
        echo view("subtarea/crearSubtarea", ["idTarea" => $idTarea]);
    }

    public function crearSubTarea(){

        $data = [
            "idTarea" => $this->request->getPost("idTarea"),
            "titulo" => $this->request->getPost("titulo"),
            "descripcion" => $this->request->getPost("descripcion"),
            "prioridad" => mayuscula($this->request->getPost("prioridad")),
            "fecha_de_vencimiento" => $this->request->getPost("fecha-vencimiento")
        ];

        $this->modelSubTarea->insertarSubTarea($data);
       
        return redirect()->to('/pantallaTarea/' . $data["idTarea"]);

    }

    public function pantallaSubTarea($idSubTarea){

        $subTarea = $this->modelSubTarea->where("idSubTarea",$idSubTarea)->first();

        echo view("layout/head");
        echo view("layout/header"); 
        echo view("subtarea/subtarea", ["subTarea" => $subTarea]);


    }

    public function eliminarSubTarea($id){
        $subTarea = $this->modelSubTarea->obtenerSubTareaPorId($id);
        $this->modelSubTarea->eliminacionSubTarea($id);
        return redirect()->to("/pantallaTarea/" . $subTarea["idTarea"]);
    }

    public function pantallaActualizarSubTarea($idSubtarea){

        $subtarea = $this ->modelSubTarea->where("idSubTarea",$idSubtarea)->first();

        echo view("layout/head");
        echo view("layout/header");
        echo view("subtarea/actualizarSubTarea", ["subtarea" => $subtarea]);

    }

    public function modificarSubTarea($idSubTarea){
        
        $data = [
            "titulo" =>  $this->request->getPost("titulo"),
            "descripcion" =>  $this->request->getPost("descripcion"),
            "prioridad" => mayuscula($this->request->getPost("prioridad")),
            "fecha_de_vencimiento" => $this->request->getPost("fecha-vencimiento"),
            "estado" => mayuscula($this->request->getPost("estado"))
        ];

        $this->modelSubTarea->actualizarSubTarea($idSubTarea,$data);

        $subTarea = $this->modelSubTarea->obtenerSubTareaPorId($idSubTarea);

        if($subTarea["estado"] == "Completado"){
            $this->modelTarea->actualizarTarea($subTarea["idTarea"], ["estado"=>"En Proceso"] );
        }

        $listSubtareasConCant = $this->modelSubTarea->obtenerSubTareasConCantidad($subTarea["idTarea"]);

        $banderin = 0;

        foreach($listSubtareasConCant["subtareas"] as $sub){
            if($sub["estado"] == "Completado"){
                $banderin ++;
            }
        }

        if($banderin == $listSubtareasConCant["cantidad"]){
            $this->modelTarea->actualizarTarea($subTarea["idTarea"],["estado" => "Completado"]);
        }

        return redirect()->to("/pantallaTarea/" . $subTarea["idTarea"]);
    }

}
