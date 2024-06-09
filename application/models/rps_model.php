<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Rps_model extends CI_Model {

    public function GET_DATA($table)
    {
        return $this->db->GET($table);
    }

    public function INSERT_DATA($data, $table)
    {
        $this->db->INSERT($table, $data);
    }

    public function UPDATE_DATA($data, $table)
    {
        $this->db->WHERE('id_rps', $data['id_rps']);
        $this->db->UPDATE($table, $data);
    }

    public function DELETE($where, $table)
    {
        $this->db->WHERE($where);
        $this->db->DELETE($table);
    }

}

/* End of file Rps_model.php */
/* Location: ./application/models/Rps_model.php */
?>