<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function __construct() {
        parent::__construct();
		$this->load->model("user_model");
		$this->load->model("file_model");
		$this->load->model("landing_model");
        $this->load->library('user_agent');
    }

    public function index() {
        $request = $this->input->get();

        if (isset($request['pub_id']) && !empty($request['pub_id']) && isset($request['site_id']) && !empty($request['site_id'])) {
            $publisher_id = $request['pub_id'];
            $pub_id = $this->user_model->getUser($publisher_id);
			
            if ($pub_id) {
                $file = '';
                $files = $this->file_model->getFileForUser();

                foreach ($files as $fl) {
                    if (!empty($fl->id_users)) {
                        $users = explode(',', $fl->id_users);
                        if (in_array($publisher_id, $users)) {
                            $file = $fl;
                            break;
                        }
                    }
                }

                if (empty($file)) {
                    $file = $this->file_model->getFileForGeneral();
                }
            } else {
                $file = $this->file_model->getFileForGeneral();
            }

            if ($file) {
                if ($this->agent->platform() == 'Mac OS X') {
                    $file->url = $file->mac_url;
                } else {
                    $file->url = $file->windows_url;
                }

                $dynamic = substr(md5(mt_rand()), 0, 35);
				$fileId = isset($file->id_file) ? $file->id_file : '';
				$viewFile = $this->getLandingViewFile($fileId);
				
                $this->load->view($viewFile, compact('file', 'dynamic'));
            }
        } else {
            echo 'Sorry you are in the wrong place!';
            exit;
        }
    }

    private function getLandingViewFile($landingId) {
        $views = [
            2 => 'one',
            3 => 'two',
            4 => 'three',
            5 => 'four',
            6 => 'five',
            7 => 'six',
            8 => 'seven',
            9 => 'eight',
            10 => 'nine',
        ];

        return isset($views[$landingId]) ? $views[$landingId] : 'index';
    }

    
}
