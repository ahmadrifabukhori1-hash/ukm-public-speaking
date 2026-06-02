<?php

namespace App\Controllers;

use App\Models\PendaftarModel;

class PendaftaranController extends BaseController
{
    public function index()
    {
        return view('pendaftaran/index');
    }

    public function store()
    {
        $rules = [
            'nama_lengkap'  => 'required|min_length[3]',
            'nim'           => 'required',
            'prodi'         => 'required',
            'semester'      => 'required|integer',
            'whatsapp'      => 'required|min_length[10]',
            'email'         => 'required|valid_email',
            'alasan'        => 'required|min_length[10]',
            'jadwal_pilihan'=> 'required',
        ];

        if (! $this->validate($rules)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $model = new PendaftarModel();

        $model->save([
            'nama_lengkap'   => $this->request->getPost('nama_lengkap'),
            'nim'            => $this->request->getPost('nim'),
            'prodi'          => $this->request->getPost('prodi'),
            'semester'       => $this->request->getPost('semester'),
            'whatsapp'       => $this->request->getPost('whatsapp'),
            'email'          => $this->request->getPost('email'),
            'pengalaman'     => $this->request->getPost('pengalaman'),
            'alasan'         => $this->request->getPost('alasan'),
            'jadwal_pilihan' => $this->request->getPost('jadwal_pilihan'),
            'status'         => 'Menunggu Seleksi',
        ]);

        return redirect()
            ->to('/')
            ->with('success', 'Pendaftaran berhasil dikirim. Tunggu informasi seleksi dari panitia.');
    }
}