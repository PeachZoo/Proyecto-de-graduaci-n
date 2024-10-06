<?php
namespace App\Models;
use CodeIgniter\Model;

class ClienteModel extends Model
{
    protected $table      = 'cliente';
    protected $primaryKey = 'id_cliente';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['nombre_cliente','apellido_cliente','telefono', 'email','status',
    'usuario', 'texto', 'numero', 'tipo_producto', 'tipo_figura', 'entrega'];

    protected bool $allowEmptyInserts = false;

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function obtener($data)
    {
        $Usuario= $this->where($data);
        return $Usuario->get()->getResultArray();
    }
    public function insertar($data)
    {
        $usuarioModel= $this->db->table('cliente');
        $usuarioModel->insert($data);
        return $this->db->InsertID();

    }
    public function modificar($id, $data)
    {
        $usuarioModel= $this->db->table('cliente');
        $usuarioModel->set($data);
        $usuarioModel->where('id_cliente',$id);
        return $usuarioModel->update();

    }
    public function borrar($id)
    {
        $usuarioModel= $this->db->table('cliente');
        $usuarioModel->where('id_cliente',$id);
        return $usuarioModel->delete();
    }

    public function mostrar()
    {
        $builder = $this->db->table($this->table);
        $builder->select('cliente.*, producto.id_producto, producto.titulo_producto');
        $builder->join('producto', 'producto.id_producto = cliente.tipo_producto', 'left');
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function mostrarCliente($id)
    {
        $builder = $this->db->table($this->table);
        $builder->select('cliente.*, producto.id_producto, producto.titulo_producto, producto.img_producto, figura.id_figura, figura.titulo_figura');
        $builder->join('producto', 'producto.id_producto = cliente.tipo_producto', 'left');
        $builder->join('figura', 'figura.id_figura = cliente.tipo_figura', 'left');
        $builder->where('id_cliente', $id);
        $query = $builder->get();
        return $query->getResultArray();
    }


}