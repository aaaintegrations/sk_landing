<?php

namespace App\Controllers;

class Home extends BaseController
{
    protected $userModel;
    protected $fileModel;
    protected $landingModel;

    public function __construct() {
        // Load models
        $this->userModel = model('App\Models\UserModel');
        $this->fileModel = model('App\Models\FileModel');
        $this->landingModel = model('App\Models\LandingModel');
    }

    public function index() {
        $request = $this->request->getGet(); // Correct place to use $this->request

        if (isset($request['uid']) && !empty($request['uid']) && isset($request['sid']) && !empty($request['sid'])) {
            $publisher_id = $request['uid'];
            $pub_id = $this->userModel->getUser($publisher_id);

            $file = '';
            if ($pub_id) {
                $files = $this->fileModel->getFileForUser();

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
                    $file = $this->fileModel->getFileForGeneral();
                }
            } else {
                $file = $this->fileModel->getFileForGeneral();
            }

            if ($file) {
                // Get the UserAgent inside the method where $this->request is available
                $agent = $this->request->getUserAgent();

                if ($agent->isBrowser('Macintosh')) {
                    $file->url = $file->mac_url;
                } else {
                    $file->url = $file->windows_url;
                }

                $dynamic = substr(md5(mt_rand()), 0, 35);
                $fileId = isset($file->id_file) ? $file->id_file : '';
                $viewFile = $this->getLandingViewFile($fileId);

                return view($viewFile, compact('file', 'dynamic'));
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
