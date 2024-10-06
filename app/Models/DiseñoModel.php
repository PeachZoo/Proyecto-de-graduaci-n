<?php
namespace App\Models;
use CodeIgniter\Model;

class DiseñoModel extends Model
{
    protected $table      = 'diseno';
    protected $primaryKey = 'id_diseno';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['titulo_diseno',
    'img_diseno','status', 'id_usuario',
     'id_cliente'];

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
        $usuarioModel= $this->db->table('diseno');
        $usuarioModel->insert($data);
        return $this->db->InsertID();

    }
    public function modificar($id, $data)
    {
        $usuarioModel= $this->db->table('diseno');
        $usuarioModel->set($data);
        $usuarioModel->where('id_diseno',$id);
        return $usuarioModel->update();

    }
    public function borrar($id)
    {
        $usuarioModel= $this->db->table('diseno');
        $usuarioModel->where('id_diseno',$id);
        return $usuarioModel->delete();
    }
}