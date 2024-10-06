<?php
namespace App\Models;
use CodeIgniter\Model;

class UsuarioModel extends Model
{
    protected $table      = 'usuario';
    protected $primaryKey = 'id_usuario';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['nombre','apellido', 'telefono','email',
    'password','status'];

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
        $usuarioModel= $this->db->table('usuario');
        $usuarioModel->insert($data);
        return $this->db->InsertID();

    }
    public function modificar($id, $data)
    {
        $usuarioModel= $this->db->table('usuario');
        $usuarioModel->set($data);
        $usuarioModel->where('id_usuario',$id);
        return $usuarioModel->update();

    }
    public function borrar($id)
    {
        $usuarioModel= $this->db->table('usuario');
        $usuarioModel->where('id_usuario',$id);
        return $usuarioModel->delete();
    }
}