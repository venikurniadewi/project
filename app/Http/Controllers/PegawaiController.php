<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;

class PegawaiController extends Controller
{
    public function data()
    {
        $pegawai = Pegawai::all();
        return view('pegawai.index', ['pegawai' => $pegawai]);
    }
    // Menampilkan halaman tambah data karyawan
    public function tambah()
    {
        return view('pegawai.tambah');
    }

    // Menyimpan data karyawan baru
    public function store(Request $request)
    {
        // Validasi data yang dikirimkan dari formulir
        $validatedData = $request->validate([
            'no' => 'required',
            'kode' => 'required|unique:pegawais',
            'nama' => 'required',
            'jabatan' => 'required',
        ]);

        // Simpan data karyawan baru ke dalam database
        Pegawai::create($validatedData);

        // Redirect kembali ke halaman data karyawan setelah data berhasil disimpan
        return redirect()->route('pegawai.index')->with('success', 'Pegawai berhasil ditambahkan.');
    }

    // Menampilkan detail karyawan
    public function lihat($id)
    {
        $pegawai = Pegawai::findOrFail($id);
        return view('pegawai.lihat', ['pegawai' => $pegawai]);
    }

    // Menampilkan halaman edit data karyawan
    public function edit($id)
    {
        $pegawai = Pegawai::findOrFail($id);
        return view('pegawai.edit', ['pegawai' => $pegawai]);
    }

    // Mengupdate data karyawan
    public function update(Request $request, $id)
    {
        // Validasi data yang dikirimkan dari formulir
        $validatedData = $request->validate([
            'no' => 'required',
            'kode' => 'required|unique:pegawais,kode,'.$id,
            'nama' => 'required',
            'jabatan' => 'required',
        ]);

        // Temukan karyawan yang ingin diupdate
        $pegawai = Pegawai::findOrFail($id);

        // Update data karyawan
        $pegawai->update($validatedData);

        // Redirect kembali ke halaman data karyawan setelah data berhasil diupdate
        return redirect()->route('pegawai.index')->with('success', 'Data Pegawai berhasil diperbarui.');
    }

    // Menghapus data karyawan
    public function hapus($id)
    {
        $pegawai = Pegawai::findOrFail($id);
        $pegawai->delete();
        return redirect()->route('pegawai.index')->with('success', 'Pegawai berhasil dihapus.');
    }
}
