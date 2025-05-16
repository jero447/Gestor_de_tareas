<?php

namespace App\Models;

use CodeIgniter\Model;


class UsuarioModel extends Model{

    
    protected $table      = 'usuarios';
    protected $primaryKey = 'idUsuario';

    protected $useAutoIncrement = true  ;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['nombre',"apellido",'email','contraseña','idUsuario'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;


    public function insertarUsuario($data){

        $this->insert($data);

    }

    public function obtenerUsuarios(){
        return $this->findAll();
    }

    public function obtenerPorId($idUsuario){
        return $this->where("idUsuario",$idUsuario)->first();
    }

    public function obtenerPorMail($email){

        return $this->where("email",$email)->first();
        
    }

}