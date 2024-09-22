<?php
class Landing_model extends CI_Model {

    public function getLandingByFileId($file_id, $type) {
        return $this->db->where('id', $file_id)
                        ->where('landing_type', $type)
                        ->where('landing_status', 'ACTV')
                        ->get('landings')
                        ->row();
    }

    public function getActiveRandomLanding($type) {
        return $this->db->where('landing_type', $type)
                        ->where('landing_status', 'ACTV')
                        ->order_by('RAND()')
                        ->get('landings', 1)
                        ->row();
    }
}
