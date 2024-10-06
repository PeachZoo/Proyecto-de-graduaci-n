<?php
namespace App\Models;
use CodeIgniter\Model;

class ProductoModel extends Model
{
    protected $table      = 'producto';
    protected $primaryKey = 'id_producto';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['titulo_producto','img_producto','tipo_producto', 'status', 'ruta_producto'];

    protected bool $allowEmptyInserts = false;

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function obtener($data)
    {
        $producto= $this->where($data);
        return $producto->get()->getResultArray();
    }
    public function insertar($data)
    {
        $productoModel= $this->db->table('producto');
        $productoModel->insert($data);
        return $this->db->InsertID();

    }
    public function modificar($id, $data)
    {
        $productoModel= $this->db->table('producto');
        $productoModel->set($data);
        $productoModel->where('id_producto',$id);
        return $productoModel->update();

    }
    public function borrar($id)
    {
        $productoModel= $this->db->table('producto');
        $productoModel->where('id_producto',$id);
        return $productoModel->delete();
    }
    public function getCamisetas() {
        $filtro="Playeras";
        $producto= $this->db->table('producto');
        $producto->where('tipo_producto',$filtro);
        return $producto->get()->getResultArray();
    }

    public function getGorras() {
        $filtro="Gorras";
        $producto= $this->db->table('producto');
        $producto->where('tipo_producto',$filtro);
        return $producto->get()->getResultArray();
    }
    public function getParaguas() {
        $filtro="Paraguas";
        $producto= $this->db->table('producto');
        $producto->where('tipo_producto',$filtro);
        return $producto->get()->getResultArray();
    }
    public function getPachones() {
        $filtro="Pachones";
        $producto= $this->db->table('producto');
        $producto->where('tipo_producto',$filtro);
        return $producto->get()->getResultArray();
    }
    public function getTazas() {
        $filtro="Tazas";
        $producto= $this->db->table('producto');
        $producto->where('tipo_producto',$filtro);
        return $producto->get()->getResultArray();
    }
}