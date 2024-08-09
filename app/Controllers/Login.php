<?php

namespace App\Controllers;
use App\Controllers\getPost;
use App\Models\UserModel;


class Login extends BaseController
{

    public function index()
    {
        return view('frontend/login');
    }
    public function proses_login()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $userModel = new UserModel();
        $user = $userModel->where('username', $username)->first();

        if ($user) {
            if ($user['password'] == md5($password)) {
                $userdata = [
                    'id' => $user['id'],
                    'nama' => $user['nama'],
                    'username' => $user['username'],
                    'logged_in' => TRUE
                ];
                $session = session();
                $session->set($userdata);
                return $this->response->setJSON(['success' => true, 'message' => 'Login berhasil']);
            } else {
                return $this->response->setJSON(['success' => false, 'message' => 'Password salah']);
            }
        } else {
            return $this->response->setJSON(['success' => false, 'message' => 'Username tidak ditemukan']);
        }

        return $this->response->setJSON($postData);
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }
}
