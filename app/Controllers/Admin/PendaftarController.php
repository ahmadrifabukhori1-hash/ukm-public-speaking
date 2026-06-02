<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PendaftarModel;

class PendaftarController extends BaseController
{
    protected PendaftarModel $pendaftarModel;

    public function __construct()
    {
        $this->pendaftarModel = new PendaftarModel();
    }

    public function index()
    {
        $keyword = $this->request->getGet('keyword');

        $query = $this->pendaftarModel;

        if ($keyword) {
            $query = $query
                ->groupStart()
                ->like('nama_lengkap', $keyword)
                ->orLike('nim', $keyword)
                ->orLike('prodi', $keyword)
                ->orLike('status', $keyword)
                ->groupEnd();
        }

       $data = [
    'pendaftar' => $query->orderBy('id', 'DESC')->findAll(),
    'keyword'   => $keyword,

    'total'     => (new PendaftarModel())->countAllResults(),
    'menunggu'  => (new PendaftarModel())->where('status', 'Menunggu Seleksi')->countAllResults(),
    'diterima'  => (new PendaftarModel())->where('status', 'Diterima')->countAllResults(),
    'ditolak'   => (new PendaftarModel())->where('status', 'Ditolak')->countAllResults(),
];

        return view('admin/pendaftar/index', $data);
    }

    public function create()
    {
        return view('admin/pendaftar/form', [
            'title' => 'Tambah Pendaftar',
            'pendaftar' => null,
        ]);
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
            'status'        => 'required',
        ];

        if (! $this->validate($rules)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $this->pendaftarModel->save($this->request->getPost());

        return redirect()
            ->to('/admin/pendaftar')
            ->with('success', 'Data pendaftar berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $pendaftar = $this->pendaftarModel->find($id);

        if (! $pendaftar) {
            return redirect()
                ->to('/admin/pendaftar')
                ->with('error', 'Data tidak ditemukan.');
        }

        return view('admin/pendaftar/form', [
            'title' => 'Edit Pendaftar',
            'pendaftar' => $pendaftar,
        ]);
    }

    public function update($id)
    {
        $pendaftar = $this->pendaftarModel->find($id);

        if (! $pendaftar) {
            return redirect()
                ->to('/admin/pendaftar')
                ->with('error', 'Data tidak ditemukan.');
        }

        $rules = [
            'nama_lengkap'  => 'required|min_length[3]',
            'nim'           => 'required',
            'prodi'         => 'required',
            'semester'      => 'required|integer',
            'whatsapp'      => 'required|min_length[10]',
            'email'         => 'required|valid_email',
            'alasan'        => 'required|min_length[10]',
            'jadwal_pilihan'=> 'required',
            'status'        => 'required',
        ];

        if (! $this->validate($rules)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $this->pendaftarModel->update($id, $this->request->getPost());

        return redirect()
            ->to('/admin/pendaftar')
            ->with('success', 'Data pendaftar berhasil diperbarui.');
    }

    public function delete($id)
    {
        $pendaftar = $this->pendaftarModel->find($id);

        if (! $pendaftar) {
            return redirect()
                ->to('/admin/pendaftar')
                ->with('error', 'Data tidak ditemukan.');
        }

        $this->pendaftarModel->delete($id);

        return redirect()
            ->to('/admin/pendaftar')
            ->with('success', 'Data pendaftar berhasil dihapus.');
    }
    public function show($id)
{
    $pendaftar = $this->pendaftarModel->find($id);

    if (! $pendaftar) {
        return redirect()
            ->to('/admin/pendaftar')
            ->with('error', 'Data tidak ditemukan.');
    }

    return view('admin/pendaftar/show', [
        'pendaftar' => $pendaftar,
    ]);
}
}