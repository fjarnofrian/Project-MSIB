<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB; // jika pakai query builder
use Illuminate\Http\Request;
use App\Models\Pengajar;
use PHPUnit\Framework\TestSize\Known;

class pengajarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengajar = Pengajar::all();
        return view('admin.pengajar.index', compact('pengajar'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pengajar.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //proses input produk dari form
        $request->validate(
            [
                'nip' => 'required|unique:pengajar|max:3',
                'nama' => 'required|max:45',
                'gender' => 'required',
                'telp' => 'required|max:20',
                'email' => 'required|max:45',
                'alamat' => 'required|max:70',
                'foto' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|min:2|max:2048',
                'desk' => 'required',

            ],
            //custom pesan errornya
            [
                'nip.required' => 'NIP Wajib Diisi',
                'nip.unique' => 'NIP Sudah Ada (Terduplikasi)',
                'nip.max' => 'NIP Maksimal 3 karakter',
                'nama.required' => 'Nama Wajib Diisi',
                'nama.max' => 'Nama Maksimal 45 karakter',
                'gener.required' => 'Gender Wajib Diisi',
                'telp.required' => 'Telp Wajib Diisi',
                'telp.integer' => 'Telpon Harus Berupa Angka',
                'email.required' => 'Email Wajib Diisi',
                'alamat.required' => 'Alamat Wajib Diisi',
                'foto.min' => 'Ukuran file kurang 2 KB',
                'foto.max' => 'Ukuran file melebihi 2 MB',
                'foto.image' => 'File foto bukan gambar',
                'foto.mimes' => 'File harus jpg,jpeg,png,gif,svg',
                'desk.required' => 'Deskripsi Wajib Diisi',
            ]
        );

        //Produk::create($request->all());
        //------------apakah user  ingin upload foto--------- --
        if (!empty($request->foto)) {
            $fileName = 'pengajar_' . $request->nip . '.' . $request->foto->extension();
            //$fileName = $request->foto->getClientOriginalName();
            $request->foto->move(public_path('admin/assets/images'), $fileName);
        } else {
            $fileName = '';
        }

        //lakukan update data dari request form edit
        DB::table('pengajar')->insert(
            [
                'nip' => $request->nip,
                'nama' => $request->nama,
                'gender' => $request->gender,
                'telp' => $request->telp,
                'email' => $request->email,
                'alamat' => $request->alamat,
                'foto' => $fileName,
                'desk' => $request->desk,
                //'updated_at'=>now(),
            ]
        );

        return redirect()->route('pengajar.index')
            ->with('success', 'Data Pengajar Berhasil Disimpan');
    }

    public function show(string $id)
    {
        $pengajar = Pengajar::find($id);
        return view('admin.pengajar.detail', compact('pengajar'));
    }

    public function edit(string $id)
    {
        $pengajar = Pengajar::find($id);
        return view('admin.pengajar.edit', compact('pengajar'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //proses input produk dari form
        $request->validate(
            [
                'nip' => 'required|max:3',
                'nama' => 'required|max:45',
                'gender' => 'required',
                'telp' => 'required|max:20',
                'email' => 'required|max:45',
                'alamat' => 'required|max:70',
                'foto' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|min:2|max:2048',
                'desk' => 'required',
            ],
            //custom pesan errornya
            [
                'nip.required' => 'NIP Wajib Diisi',
                'nip.unique' => 'NIP Sudah Ada (Terduplikasi)',
                'nip.max' => 'NIP Maksimal 3 karakter',
                'nama.required' => 'Nama Wajib Diisi',
                'nama.max' => 'Nama Maksimal 45 karakter',
                'gender.required' => 'Gender Wajib Diisi',
                'telp.required' => 'Telp Wajib Diisi',
                'telp.integer' => 'Telpon Harus Berupa Angka',
                'email.required' => 'Email Wajib Diisi',
                'alamat.required' => 'Alamat Wajib Diisi',
                'foto.min' => 'Ukuran file kurang 2 KB',
                'foto.max' => 'Ukuran file melebihi 2 MB',
                'foto.image' => 'File foto bukan gambar',
                'foto.mimes' => 'File harus jpg,jpeg,png,gif,svg',
                'desk.required' => 'Deskripsi Wajib Diisi',
            ]
        );

        //------------ambil foto lama apabila user ingin ganti foto-----------
        $foto = DB::table('pengajar')->select('foto')->where('id', $id)->get();
        foreach ($foto as $f) {
            $namaFileFotoLama = $f->foto;
        }
        //------------apakah user  ingin ubah upload foto baru-----------
        if (!empty($request->foto)) {
            //jika ada foto lama, hapus foto lamanya terlebih dahulu
            if (!empty($namaFileFotoLama)) unlink('admin/assets/images/' . $namaFileFotoLama);
            //lalukan proses ubah foto lama menjadi foto baru
            $fileName = 'pengajar_' . $request->nip . '.' . $request->foto->extension();
            //$fileName = $request->foto->getClientOriginalName();
            $request->foto->move(public_path('admin/assets/images'), $fileName);
        } else {
            $fileName = $namaFileFotoLama;
        }

        //lakukan update data dari request form edit
        DB::table('pengajar')->where('id', $id)->update(
            [
                'nip' => $request->nip,
                'nama' => $request->nama,
                'gender' => $request->gender,
                'telp' => $request->telp,
                'email' => $request->email,
                'alamat' => $request->alamat,
                'foto' => $fileName,
                'desk' => $request->desk,
                //'updated_at'=>now(),
            ]
        );
        return redirect()->route('pengajar.index')
        ->with('success','Data Kategori Baru Berhasil Disimpan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //sebelum hapus data, hapus terlebih dahulu fisik file fotonya jika ada
        $pengajar = Pengajar::find($id);
        if (!empty($pengajar->foto)) unlink('admin/assets/images/' . $pengajar->foto);
        //hapus data di database
        Pengajar::where('id', $id)->delete();
        return redirect()->route('pengajar.index')
            ->with('success', 'Data Pengajar Berhasil Dihapus');
    }


}
