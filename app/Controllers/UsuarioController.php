<?php

namespace App\Controllers;
use App\Models\UsuarioModel;
class UsuarioController extends BaseController
{
    public function index(): string
    {
        return view('login');
    }

    public function registro(): string
    {
        return view('registro');
    }

    public function login()
    {
        $email= $this->request->getPost('email');
        $password= $this->request->getPost('password');
        $UsuarioModel= new UsuarioModel();
        $item= $UsuarioModel->obtener(['email'=>$email]);
        if((count($item)>0)&&(password_verify($password,$item[0]['password'])))
        {
            $data=["nombre"=> $item[0]['email'],
                  "apelido"=> $item[0]['apellido'],
                  "telefono"=> $item[0]['telefono'],
                  "email"=> $item[0] ['email'],
                  "status"=> $item[0]['status']
            ];
            $session= session();
            $session->set($data);
            return redirect()->to(base_url('productos'))->with('mensaje','1');
        }
        else{
            return redirect()->to(base_url('/'))->with('mensaje','0');
        }
    }

    public function salir()
    {
        $session= session();
        $session->destroy();
        return redirect()->to(base_url('/'));
    }

    public function create() //Este metodo sirve para capturar los datos para un nuevo iva y guardar en la bd
    {
        $status=1;
        $nombre= $this->request->getPost('nombre');
        $apellido= $this->request->getPost('apellido');
        $telefono= $this->request->getPost('telefono');
        $email= $this->request->getPost('email');
        $password= $this->request->getPost('password');
        $opciones=['cont'=>123456];
        $hash=password_hash($password, PASSWORD_BCRYPT,$opciones);
        $data=["nombre"=>$nombre,
               "apellido"=>$apellido,
               "telefono"=>$telefono,
               "email"=>$email,
               "password"=>$hash,
               "status"=>$status];
        $UsuarioModel= new UsuarioModel();
        $respuesta=$UsuarioModel->insertar($data);
        
       if($respuesta>0)
        {
            return redirect()->to(base_url('/'))->with('mensaje','1');
           //return "Resgistro con exito";
        }
        else{
           return redirect()->to(base_url('/cuenta'))->with('mensaje','0');
          //return "No Registrado";
        }
    }
}