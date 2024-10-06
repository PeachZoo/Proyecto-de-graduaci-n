<?php

namespace App\Controllers;
use App\Models\ProductoModel;
use App\Models\FiguraModel;
class ProductoController extends BaseController
{
    public function index()
    {
        $figuraModel= new ProductoModel();
        $item['figura']=$figuraModel->findAll();
        return view('dashboard/dashboard', $item);
    }

    public function playera()
    {
        $producto= new ProductoModel();
        $fig= new FiguraModel();
        $camisetas = $producto->getCamisetas();
        $figuras = $fig->findAll();
        $data = [
            'camisetas' => $camisetas,
            'figuras' => $figuras
        ];
        return view('dashboard/playeras', $data);
    }

    public function gorra()
    {
        $producto= new ProductoModel();
        $fig= new FiguraModel();
        $camisetas = $producto->getGorras();
        $figuras = $fig->findAll();
        $data = [
            'camisetas' => $camisetas,
            'figuras' => $figuras
        ];
        return view('dashboard/playeras', $data);
    }
    public function paragua()
    {
        $producto= new ProductoModel();
        $fig= new FiguraModel();
        $camisetas = $producto->getParaguas();
        $figuras = $fig->findAll();
        $data = [
            'camisetas' => $camisetas,
            'figuras' => $figuras
        ];
        return view('dashboard/paraguas', $data);
    }
    public function pachon()
    {
        $producto= new ProductoModel();
        $fig= new FiguraModel();
        $camisetas = $producto->getPachones();
        $figuras = $fig->findAll();
        $data = [
            'camisetas' => $camisetas,
            'figuras' => $figuras
        ];
        return view('dashboard/pachones', $data);
    }
    public function taza()
    {
        $producto= new ProductoModel();
        $fig= new FiguraModel();
        $camisetas = $producto->getTazas();
        $figuras = $fig->findAll();
        $data = [
            'camisetas' => $camisetas,
            'figuras' => $figuras
        ];
        return view('dashboard/tazas', $data);
    }

    public function formulario()
    {
        return view('producto/crear');
    }
    public function store()
    {
        $file=$this->request->getFile('img_producto');
        $titulo= $this->request->getPost('titulo_producto');
        $estatus= $this->request->getPost('estatus_producto');
        $tipo= $this->request->getPost('tipo_producto');
        $rut= $this->request->getPost('ruta_producto');
      
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
        $data=["titulo_producto"=>$titulo,
               "img_producto"=>$foto,
               "tipo_producto"=>$tipo,
               "status"=>$estatus,
               "ruta_producto"=> $rut,
               "created_at"=>$fecha
              ];
        $productoModel= new ProductoModel();
        $respuesta=$productoModel->insertar($data);
        if($respuesta>0)
        {
            return redirect()->to(base_url('/productos'))->with('mensaje','1');
        }
        else{
            return redirect()->to(base_url('/productos'))->with('mensaje','0');
        } 
    }

}