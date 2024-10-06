<?php

namespace App\Controllers;

class DiseñoController extends BaseController
{
    public function index(): string
    {
        return view('diseño/diseños');
    }
   

    public function guardarImagen()
    {
        $data = $this->request->getJSON();
        $imageData = $data->image;

        // Decodificar la imagen base64
        list($type, $imageData) = explode(';', $imageData);
        list(, $imageData)      = explode(',', $imageData);
        $imageData = base64_decode($imageData);

        // Guardar la imagen en el servidor
        $filePath = WRITEPATH . 'images/' . uniqid() . '.png';
        file_put_contents($filePath, $imageData);

        // Aquí puedes guardar la ruta de la imagen en la base de datos si es necesario

        return $this->respond(['status' => 'Imagen guardada exitosamente']);
    }
}
