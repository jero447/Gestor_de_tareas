<?php

namespace App\Controllers\Tarea;

use App\Controllers\BaseController;

use App\Models\TareaModel;

class Tarea extends BaseController
{
    protected $model;

    public function __construct() {
        $this->model = new TareaModel();
    }

    public function formularioCreacion(){
        echo view("layout/head");
        echo view("layout/header");
        echo view("tarea/crearTarea.php");
    }
    

    public function crearTarea(){
        $data = [
            "idUsuario" => session("idUsuario"),
            "titulo" => $this->request->getPost("titulo"),
            "descripcion" => $this->request->getPost("descripcion"),
            "prioridad" => mayuscula($this->request->getPost("prioridad")),
            "fecha_de_vencimiento" => $this->request->getPost("fecha-vencimiento")
        ];

        $this->model->insertarTarea($data);
        return redirect()->to('/');
    }

    public function pantallaTarea($id){

        $tarea = $this->model->where("idTarea",$id)->first();

        echo view("layout/head");
        echo view("layout/header");
        echo view("tarea/tarea", ["tarea"=> $tarea]);
        
    }

    public function eliminarTarea($id){
        $this->model->eliminacionTarea($id);
        return redirect()->to('/');
    }

}
