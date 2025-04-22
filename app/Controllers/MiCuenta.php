<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class MiCuenta extends BaseController
{

    public function miCuenta(){
        echo view("layout/head");
        echo view("layout/header");
        echo view("miCuenta");
    }

    

}
