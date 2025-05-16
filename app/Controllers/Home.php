<?php

namespace App\Controllers;

use App\Models\TareaModel;
use App\Models\SubTareaModel;

class Home extends BaseController
{

    protected $model;
    protected $modelSubtarea;

    public function __construct() {
        $this->model = new TareaModel();
        $this->modelSubtarea = new SubTareaModel();
    }
    


    public function index()
    {   
        echo view("layout/head");
        echo view("layout/header");
        echo view("home", ["tareas" => $this->model->obtenerTareas(), "subtareas" => $this->modelSubtarea->obtenerTodasSubtareas()]);
        echo view("layout/footer");
    }

   

}
