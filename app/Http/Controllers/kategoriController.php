<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use PHPUnit\Framework\TestSize\Known;

class kategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategori = Kategori::all();
        return view('admin.kategori.index', compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:45'
        ],
        //custom pesan errornya
        [
            'nama.required'=>'Nama Wajib Diisi'
        ]
        );
        Kategori::create($request->all());
        return redirect()->route('kategori.index')
                        ->with('success','Data Kategori Baru Berhasil Disimpan');
    }
    public function edit(string $id)
    {
        $kategori= Kategori::find($id);
        return view('admin.kategori.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required|max:45'
        ],
        //custom pesan errornya
        [
            'nama.required'=>'Nama Wajib Diisi'
        ]);
        $kategori = Kategori::find($id);
        $kategori->nama = $request->nama;
        $kategori->save();
        return redirect()->route('kategori.index')
        ->with('success','Data Kategori Baru Berhasil Disimpan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Kategori::where('id',$id)->delete();
        return redirect()->route('kategori.index')
                        ->with('success','Data Kategori Berhasil Dihapus');
    }
}
