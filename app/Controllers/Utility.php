<?php

namespace App\Controllers;
use App\Controllers\getPost;
use App\Models\UserModel;

class Utility extends BaseController
{
    public function add_user()
    {
        $data = [
            'nama' => "Kasir",
            'username' => "kasir",
            'password' => md5("password")
        ];

        $userModel = new UserModel();
        $userModel->insert($data);

        return $this->response->setJSON(['success' => true]);
    }
}
