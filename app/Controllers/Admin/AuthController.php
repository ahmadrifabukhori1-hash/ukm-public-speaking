<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AdminModel;

class AuthController extends BaseController
{
    public function login()
    {
        if (session()->get('admin_logged_in')) {
            return redirect()->to(base_url('/admin/pendaftar'));
        }

        return view('admin/auth/login');
    }

    public function processLogin()
    {
        $rules = [
            'username' => 'required',
            'password' => 'required',
        ];

        if (! $this->validate($rules)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Username dan password wajib diisi.');
        }

        $adminModel = new AdminModel();

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $admin = $adminModel->where('username', $username)->first();

        if (! $admin) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Username tidak ditemukan.');
        }

        if (! password_verify($password, $admin['password'])) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Password salah.');
        }

        session()->set([
            'admin_logged_in' => true,
            'admin_id'        => $admin['id'],
            'admin_nama'      => $admin['nama'],
            'admin_username'  => $admin['username'],
        ]);

        return redirect()
            ->to(base_url('/admin/pendaftar'))
            ->with('success', 'Berhasil login sebagai admin.');
    }

    public function logout()
    {
        session()->remove([
            'admin_logged_in',
            'admin_id',
            'admin_nama',
            'admin_username',
        ]);

        return redirect()
            ->to(base_url('/admin/login'))
            ->with('success', 'Berhasil logout.');
    }
}