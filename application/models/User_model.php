<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function getUser($publisher_id) {
        return $this->db->where('id', $publisher_id)->get('users')->row();
    }
}
