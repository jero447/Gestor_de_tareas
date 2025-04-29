<?php

namespace App\Controllers\subtarea;

use App\Controllers\BaseController;

use App\Models\SubTareaModel;

class SubTarea extends BaseController
{

    protected $model;

    public function __construct() {
        $this->model = new SubTareaModel();
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

        $this->model->insertarSubTarea($data);
       
        return redirect()->to('/pantallaTarea/' . $data["idTarea"]);

    }

    public function pantallaSubTarea($idSubTarea){

        $subTarea = $this->model->where("idSubTarea",$idSubTarea)->first();

        echo view("layout/head");
        echo view("layout/header"); 
        echo view("subtarea/subtarea", ["subTarea" => $subTarea]);


    }

    public function eliminarSubTarea($id){
        $subTarea = $this->model->obtenerSubTareaPorId($id);
        $this->model->eliminacionSubTarea($id);
        return redirect()->to("/");
        // return redirect()->to('/pantallaTarea/' . $subTarea["idSubTarea"]);
    }

}
