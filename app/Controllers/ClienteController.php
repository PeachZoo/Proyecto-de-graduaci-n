<?php

namespace App\Controllers;
use App\Models\ProductoModel;
use App\Models\FiguraModel;
use App\Models\ClienteModel;

class ClienteController extends BaseController
{
    public function index()
    {
        $clienteModel= new ClienteModel();
        $item['cliente']=$clienteModel->mostrar();
        return view('clientes/clientes', $item);
    }

    public function formulario()
    {
        $productoModel= new ProductoModel();
        $item['producto']=$productoModel->findAll();
        $figuraModel= new FiguraModel();
        $item['figura']=$figuraModel->findAll();
        return view('clientes/formularioCliente', $item);
    }
    
    public function store()
    {
        $fecha=date("Y-m-d");
        $data=["nombre_cliente"=>$this->request->getPost('nombre'),
               "apellido_cliente"=>$this->request->getPost('apellido'),
               "telefono"=>$this->request->getPost('telefono'),
               "email"=>$this->request->getPost('email'),
               "status"=>$this->request->getPost('estatus'),
               "usuario"=>$this->request->getPost('usuario'),
               "texto"=>$this->request->getPost('texto'),
               "numero"=>$this->request->getPost('numero'),
               "tipo_producto"=>$this->request->getPost('producto'),
               "tipo_figura"=>$this->request->getPost('figura'),
               "entrega"=>$this->request->getPost('entrega'),

               "created_at"=>$fecha
              ];
        $clienteModel= new ClienteModel();
        $respuesta=$clienteModel->insertar($data);
        if($respuesta>0)
        {
            return redirect()->to(base_url('/clientes'))->with('mensaje','1');
        }
        else{
            return redirect()->to(base_url('/clientes'))->with('mensaje','0');
        } 
    }

    public function edit($id)
    {
        $clienteModel= new ClienteModel();
        $item['cliente']=$clienteModel->mostrarCliente($id);
        $productoModel= new ProductoModel();
        $item['producto']=$productoModel->findAll();
        $figuraModel= new FiguraModel();
        $item['figura']=$figuraModel->findAll();
       // var_dump($item);
        return view('clientes/editar',$item);
    }
    public function save() //Este metodo sirve para capturar los nuevos datos para modificar contrato y editar en la bd
    {
        $id= $this->request->getPost('id');
        $nombre=$this->request->getPost('nombre');
        $apellido=$this->request->getPost('apellido');
        $telefono=$this->request->getPost('telefono');
        $email=$this->request->getPost('email');
        $status=$this->request->getPost('estatus');
        $usuario=$this->request->getPost('usuario');
        $texto=$this->request->getPost('texto');
        $numero=$this->request->getPost('numero');
        $producto=$this->request->getPost('producto');
        $figura=$this->request->getPost('figura');
        $entrega=$this->request->getPost('entrega');
        $fecha=date("Y-m-d");
        $data=["id_cliente"=>$id,
               "nombre_cliente"=>$nombre,
               "apellido_cliente"=>$apellido,
               "telefono"=>$telefono,
               "email"=>$email,
               "status"=>$status,
               "usuario"=>$usuario,
               "texto"=>$texto,
               "numero"=>$numero,
               "tipo_producto"=>$producto,
               "tipo_figura"=>$figura,
               "entrega"=>$entrega,
               "updated_at"=>$fecha
              ];
        $clienteModel= new ClienteModel();
        $respuesta=$clienteModel->modificar($id,$data);
        if($respuesta>0)
        {
            return redirect()->to(base_url('/clientes'))->with('mensaje','2');
        }
        else{
            return redirect()->to(base_url('/clientes'))->with('mensaje','3');
        }
       

    }


    public function delete($id)
    {
        $clienteModel= new ClienteModel();
        $data=["id_cliente"=>$id];
        $respuesta=$clienteModel->borrar($id);

        if($respuesta)
        {
            return redirect()->to(base_url('/clientes'))->with('mensaje','4');
        }
        else{
            return redirect()->to(base_url('/clientes'))->with('mensaje','5');
        }
    }
}
