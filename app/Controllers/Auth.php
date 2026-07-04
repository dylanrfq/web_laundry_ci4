<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        return view('auth/login');
    }

    public function process()
    {
        $users = new UserModel();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Ambil data user dari database berdasarkan username
        $dataUser = $users->where('username', $username)->first();

        if ($dataUser) {
            // Mengecek kecocokan password
            if (password_verify($password, $dataUser['password'])) {
                // Set session jika berhasil login
                session()->set([
                    'username'   => $dataUser['username'],
                    'isLoggedIn' => true
                ]);
                return redirect()->to('/pelanggan');
            } else {
                session()->setFlashdata('error', 'Password salah!');
                return redirect()->back();
            }
        } else {
            session()->setFlashdata('error', 'Username tidak ditemukan!');
            return redirect()->back();
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }

    // ... kode login dan process yang sudah ada ...

    // Menampilkan form registrasi
    public function register()
    {
        return view('auth/register');
    }

    // Memproses data registrasi
    public function registerProcess()
    {
        $users = new UserModel();

        // Aturan validasi (pastikan username unik dan tidak boleh kosong)
        $rules = [
            'username' => [
                'rules'  => 'required|min_length[4]|is_unique[users.username]',
                'errors' => [
                    'required'   => 'Username wajib diisi.',
                    'min_length' => 'Username minimal 4 karakter.',
                    'is_unique'  => 'Username sudah terdaftar, silakan pilih yang lain.'
                ]
            ],
            'password' => [
                'rules'  => 'required|min_length[6]',
                'errors' => [
                    'required'   => 'Password wajib diisi.',
                    'min_length' => 'Password minimal 6 karakter.'
                ]
            ]
        ];

        // Jika validasi gagal
        if (!$this->validate($rules)) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        // Jika validasi sukses, simpan user baru dengan password yang di-hash
        $users->save([
            'username' => $this->request->getPost('username'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT)
        ]);

        session()->setFlashdata('success', 'Akun berhasil didaftarkan! Silakan login.');
        return redirect()->to('/login');
    }
}