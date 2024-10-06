<?php
namespace App\Models;
use CodeIgniter\Model;

class FiguraModel extends Model
{
    protected $table      = 'Figura';
    protected $primaryKey = 'id_figura';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['titulo_figura',
    'img_figura','status'];

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
        $usuarioModel= $this->db->table('figura');
        $usuarioModel->insert($data);
        return $this->db->InsertID();

    }
    public function modificar($id, $data)
    {
        $usuarioModel= $this->db->table('figura');
        $usuarioModel->set($data);
        $usuarioModel->where('id_figura',$id);
        return $usuarioModel->update();

    }
    public function borrar($id)
    {
        $usuarioModel= $this->db->table('figura');
        $usuarioModel->where('id_figura',$id);
        return $usuarioModel->delete();
    }
}