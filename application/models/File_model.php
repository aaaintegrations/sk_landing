<?php
class File_model extends CI_Model {

    public function getFileForUser() {
        return $this->db->select('f.*, l.*')->join('landings l', 'f.id=l.id_file', 'INNER')
						->where('f.file_type', 'USER')
                        ->where('f.file_status', 'ACTV')
                        ->where('l.landing_status', 'ACTV')
                        ->order_by('RAND()')
                        ->get('files f', 1)
                        ->row();
    }

    public function getFileForGeneral() {
        return $this->db->where('f.file_type', 'GNRL')
                        ->where('f.file_status', 'ACTV')
                        ->get('files f')
                        ->row();
    }
}
