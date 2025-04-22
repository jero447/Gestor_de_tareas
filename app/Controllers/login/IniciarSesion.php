<?php 

namespace App\Controllers\Login;

use App\Controllers\BaseController;
use App\Models\UsuarioModel;

class IniciarSesion extends BaseController{
    
    protected $model;
    protected $session;

    public function __construct(){

        $this->model = new UsuarioModel();
        $this->session = \Config\Services::session();

    }

    public function login(){
        echo view("layout/head");
        echo view("login/IniciarSesion");
        
    }

    public function registrar(){
        echo view("layout/head");
        echo view("login/registro");
    }

    public function insertar(){

        $data = [
            "nombre" =>  $this->request->getPost("nombre"),
            "apellido" => $this->request->getPost("apellido"),
            "email" => $this->request->getPost("email"),
            "contraseña" =>  password_hash($this->request->getPost("contraseña"), PASSWORD_DEFAULT) 
        ];

        $this->model->insertarUsuario($data);
        return redirect()->to('/');
    }

    public function iniciarSesion(){

        $email  = $this->request->getPost("email");
        $contraseña = $this->request->getPost("contraseña");

        $usuario = $this->model->obtenerPorMail($email);

        if($usuario){

            if(password_verify($contraseña, $usuario["contraseña"])){
                $this->session->set([
                    "idUsuario" => $usuario["idUsuario"],
                    "nombre" => $usuario["nombre"],
                    "apellido" => $usuario["apellido"],
                    "email" => $usuario["email"],
                    "logueado" => true  
                ]);

                return redirect()->to("/");

            }else{
                return redirect()->back()->with('error', 'Contraseña incorrecta');
            }

        }else{
            return redirect()->back()->with('error', 'Usuario no encontrado');
        }

    }

    public function cerrarSesion(){

        $this->session->destroy();
        return redirect()->to("/");

    }

}