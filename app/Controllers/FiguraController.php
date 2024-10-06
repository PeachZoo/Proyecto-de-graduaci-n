<?php

namespace App\Controllers;
use App\Models\FiguraModel;
class FiguraController extends BaseController
{
    public function index()
    {
        $figuraModel= new FiguraModel();
        $item['figura']=$figuraModel->findAll();
        return view('figura/figura', $item);
    }

    public function formulario()
    {
        return view('figura/formularioFigura');
    }
    
    public function store()
    {
        $file=$this->request->getFile('figura_img');
        $titulo= $this->request->getPost('titulo_fig');
        $estatus= $this->request->getPost('estatus_fig');
       // print_r($file);
       if(!$file->isValid())
        {
            echo $file->getErrorString();
            exit;
        }
        
       if(!$file->hasMoved())
        {  
            $lugar = 'images';
            $lugarg = 'public/images';
            $ruta = ROOTPATH . $lugarg;
            // Obtener la extensión del archivo original
            $extension = $file->getClientExtension();
            // Crear el nuevo nombre usando el título y la extensión original
            $nuevoNombre = $titulo . '.' . $extension;
            // Mover el archivo con el nuevo nombre
            $file->move($ruta, $nuevoNombre);
        
            $foto = $lugar . "/" . $nuevoNombre;
            echo $foto;
        }
        $fecha=date("Y-m-d");
        $data=["titulo_figura"=>$titulo,
               "status"=>$estatus,
               "img_figura"=>$foto,
               "created_at"=>$fecha
              ];
        $figuraModel= new FiguraModel();
        $respuesta=$figuraModel->insertar($data);
        if($respuesta>0)
        {
            return redirect()->to(base_url('/figuras'))->with('mensaje','1');
        }
        else{
            return redirect()->to(base_url('/figuras'))->with('mensaje','0');
        } 
    }
}
