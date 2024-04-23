<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;

class PegawaiController extends Controller
{
    // Menampilkan semua data pegawai
    public function data()
    {
        $pegawai = Pegawai::all();
        return view('pegawai.index', ['pegawai' => $pegawai]);
    }

    // Menampilkan halaman tambah data pegawai
    public function tambah()
    {
        return view('pegawai.tambah');
    }

    // Menyimpan data pegawai baru
    public function store(Request $request)
    {
        // Validasi data yang dikirimkan dari formulir
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:pegawais',
            'password' => 'required',
            'phone_number' => 'required',
            'job_title' => 'required',
            'address' => 'required',
        ]);

        // Simpan data pegawai baru ke dalam database
        Pegawai::create($validatedData);

        // Redirect kembali ke halaman data pegawai setelah data berhasil disimpan
        return redirect()->route('pegawai.index')->with('success', 'Pegawai berhasil ditambahkan.');
    }

    // Menampilkan detail pegawai
    public function show($id)
    {
        $pegawai = Pegawai::findOrFail($id);
        return view('pegawai.lihat', ['pegawai' => $pegawai]);
    }

    // Menampilkan halaman edit data pegawai
    public function edit($id)
    {
        $pegawai = Pegawai::findOrFail($id);
        return view('pegawai.edit', ['pegawai' => $pegawai]);
    }

    // Mengupdate data pegawai
    public function update(Request $request, $id)
    {
        // Validasi data yang dikirimkan dari formulir
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:pegawais,email,'.$id,
            'password' => 'required',
            'phone_number' => 'required',
            'job_title' => 'required',
            'address' => 'required',
        ]);

        // Temukan pegawai yang ingin diupdate
        $pegawai = Pegawai::findOrFail($id);

        // Update data pegawai
        $pegawai->update($validatedData);

        // Redirect kembali ke halaman data pegawai setelah data berhasil diupdate
        return redirect()->route('pegawai.index')->with('success', 'Data pegawai berhasil diperbarui.');
    }

    // Menghapus data pegawai
    public function hapus($id)
    {
        $pegawai = Pegawai::findOrFail($id);
        $pegawai->delete();
        return redirect()->route('pegawai.index')->with('success', 'Pegawai berhasil dihapus.');
    }
}
