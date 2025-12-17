<?php

namespace App\Http\Controllers;

use App\Models\Kategori; // <--- GANTI dengan nama Model Kategori Anda (misal: KategoriPengaduan)
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        // Ambil data kategori, diurutkan terbaru dengan paginasi
        $kategoris = Kategori::latest()->paginate(10);

        // Asumsi path view: resources/views/pages/kategori/index.blade.php
        return view('pages.kategori.index', compact('kategoris'));
    }

    public function create()
    {
        return view('pages.kategori.create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama'      => 'required|string|max:255|unique:kategoris,nama', // Asumsi nama tabel adalah 'kategoris'
            'sla_hari'  => 'required|integer|min:1',
            'prioritas' => 'required|in:Rendah,Sedang,Tinggi',
        ]);

        Kategori::create($request->all());

        return redirect()->route('kategori.index')
                         ->with('success', 'Data kategori berhasil ditambahkan!');
    }

    // Fungsi show tidak digunakan dalam kasus ini, bisa dihilangkan
    // public function show(Kategori $kategori)
    // {
    //     return view('pages.kategori.show', compact('kategori'));
    // }

    public function edit(Kategori $kategori)
    {
        return view('pages.kategori.edit', compact('kategori'));
    }

    public function update(Request $request, Kategori $kategori)
    {
        // Validasi input
        $request->validate([
            // Pengecualian pada unique:kategoris,nama menggunakan primary key: kategori_id
            'nama'      => 'required|string|max:255|unique:kategoris,nama,' . $kategori->kategori_id . ',kategori_id',
            'sla_hari'  => 'required|integer|min:1',
            'prioritas' => 'required|in:Rendah,Sedang,Tinggi',
        ]);

        $kategori->update($request->all());

        return redirect()->route('kategori.index')
                         ->with('success', 'Data kategori berhasil diperbarui!');
    }

    public function destroy(Kategori $kategori)
    {
        $kategori->delete();

        return redirect()->route('kategori.index')
                         ->with('success', 'Data kategori berhasil dihapus!');
    }
}
