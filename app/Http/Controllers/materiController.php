<?php

namespace App\Http\Controllers;

// use App\Models\Kategori;
use App\Models\Kelas;
use App\Models\Materi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class materiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $materi = Materi::all();
        $materi = DB::table('materi')
                ->join('kelas', 'kelas.id', '=', 'materi.kelas_id')
                ->select('materi.*', 'kelas.nama as kelas')
                ->orderBy('materi.id', 'desc')
                ->get();
        return view('admin.materi.index', compact('materi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kelas = Kelas::all();
        return view('admin.materi.create',compact('kelas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_materi'=>'required|unique:materi',
            'nama' => 'required|max:45',
            'kelas_id' => 'required',
            'desk' => 'required'
        ],
        //custom pesan errornya
        [
            'kode_materi.required'=>'Kode Materi Wajib diisi',
            'kode_materi.unique'=>'Kode Sudah digunakan',
            'nama.required'=>'Nama Wajib Diisi',
            'nama.max'=>'Maksimal 45 Karakter',
            'kelas_id.required'=>'kelas Wajib diisi',
            'desk.required'=>'deskripsi wajib di isi'
        ]
        );
        Materi::create($request->all());
        return redirect()->route('materi.index')
                        ->with('success','Data Materi Baru Berhasil Disimpan');
    }
    
    public function edit(string $id)
    {
        $materi= Materi::find($id);
        $kelas = Kelas::all();
        return view('admin.materi.edit', compact('materi', 'kelas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'kode_materi'=>'required|',
            'nama' => 'required|max:45',
            'kelas_id' => 'required',
            'desk' => 'required'
        ],
        //custom pesan errornya
        [
            'kode_materi.required'=>'Kode Materi Wajib diisi',
            'kode_materi.unique'=>'Kode Sudah digunakan',
            'nama.required'=>'Nama Wajib Diisi',
            'nama.max'=>'Maksimal 45 Karakter',
            'kelas_id.required'=>'kelas Wajib diisi',
            'desk.required'=>'deskripsi wajib di isi'
        ]
        );
        $materi = Materi::find($id);
        $materi->kode_materi = $request->kode_materi;
        $materi->nama = $request->nama;
        $materi->desk = $request->desk;
        $materi->kelas_id = $request->kelas_id;
        $materi->save();
        return redirect()->route('materi.index')
        ->with('success','Data materi Baru Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Materi::where('id',$id)->delete();
        return redirect()->route('materi.index')
                        ->with('success','Data materi Berhasil Dihapus');
    }
}
