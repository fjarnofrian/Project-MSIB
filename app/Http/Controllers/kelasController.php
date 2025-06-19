<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;
class kelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kelas = Kelas::all();
        return view('admin.kelas.index', compact('kelas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.kelas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_kelas'=>'required',
            'nama'=>'required|max:45',
            'desk'=>'required'
        ],
        [
            'kode_kelas.required'=>'Kode Materi Wajib diisi',
            'nama.required'=>'Nama Wajib Diisi',
            'nama.max'=>'Maksimal 45 Karakter',
            'desk'=>'Deskripsi Wajib diisi'
        ]
        );
        // dd($request);
        try{
        Kelas::create($request->all());
        return redirect()->route('kelas.index')
                        ->with('success','Data Kelas Baru Berhasil Disimpan');
        } catch(\Exception $e){
            return redirect()->route('produk.index')
            ->with('error', 'Terjadi Kesalahan Saat Input Data!');


        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $kelas = Kelas::find($id);
        return view('admin.kelas.detail', compact('kelas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kelas = Kelas::find($id);
        return view('admin.kelas.edit',compact('kelas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'kode_kelas'=>'required',
            'nama'=>'required|max:45',
            'desk'=>'required'
        ],
        [
            'kode_kelas.required'=>'Kode Materi Wajib diisi',
            'nama.required'=>'Nama Wajib Diisi',
            'nama.max'=>'Maksimal 45 Karakter',
            'desk'=>'Deskripsi Wajib diisi'
        ]
        );
        try{
        $kelas = Kelas::find($id);
        $kelas->kode_kelas = $request->kode_kelas;
        $kelas->nama = $request->nama;
        $kelas->desk = $request->desk;
        $kelas->save();
        return redirect()->route('kelas.index')
        ->with('success','Data Kelas Baru Berhasil Diupdate');
        }  catch(\Exception $e){
            return redirect()->route('produk.index')
            ->with('error', 'Terjadi Kesalahan Saat Update Data!');


        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Kelas::where('id',$id)->delete();
        return redirect()->route('kelas.index')
                        ->with('success','Data kelas Berhasil Dihapus');
    }
}
