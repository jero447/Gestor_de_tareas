<?php

namespace App\Controllers;

use App\Models\TareaModel;

class Home extends BaseController
{

    protected $model;

    public function __construct() {
        $this->model = new TareaModel();
    }
    
    public function index()
    {   
        echo view("layout/head");
        echo view("layout/header");
        echo view("home", ["tareas" => $this->listaTareas()]);
        echo view("layout/footer");
    }

    public function listaTareas(){

        return $this->model->obtenerTareas();

    }

}
