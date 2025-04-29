<?php

namespace App\Controllers\Tarea;

use App\Controllers\BaseController;
use App\Models\SubTareaModel;
use App\Models\TareaModel;

class Tarea extends BaseController
{
    protected $modelTarea;
    protected $modelSubTarea;

    public function __construct() {
        $this->modelTarea = new TareaModel();
        $this->modelSubTarea = new SubTareaModel();
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

        $this->modelTarea->insertarTarea($data);
        return redirect()->to('/');
    }

    public function pantallaTarea($id){

        $tarea = $this->modelTarea->where("idTarea",$id)->first();

        $listaSubTareas = $this->modelSubTarea->obtenerSubTareas($tarea["idTarea"]);

        echo view("layout/head");
        echo view("layout/header");
        echo view("tarea/tarea", ["tarea"=> $tarea, "listaSubTareas" => $listaSubTareas]);
        
    }

    public function eliminarTarea($id){
        $this->modelTarea->eliminacionTarea($id);
        return redirect()->to('/');
    }

    public function pantallaActualizarTarea($id){

        $tarea = $this->modelTarea->where("idTarea",$id)->first();

        echo view("layout/head");
        echo view("layout/header");
        echo view("tarea/actualizarTarea", ["tarea" => $tarea]);
    }

    public function modificarTarea($id){
        
        $data = [
            "titulo" =>  $this->request->getPost("titulo"),
            "descripcion" =>  $this->request->getPost("descripcion"),
            "prioridad" => mayuscula($this->request->getPost("prioridad")),
            "fecha_de_vencimiento" => $this->request->getPost("fecha-vencimiento")
        ];

        $this->modelTarea->actualizarTarea($id,$data);
        return redirect()->to('/');
    }


}
