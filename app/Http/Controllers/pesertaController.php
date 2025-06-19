<?php

namespace App\Http\Controllers;
use App\Models\Peserta;
use PHPUnit\Framework\TestSize\Known;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class pesertaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->has('search')){
            $peserta = Peserta::where('nama', 'LIKE', '%' .$request->search.'%')->paginate(5);
            Session::put('halaman_url', request()->fullUrl());
        }else{
            $peserta = Peserta::paginate(5);
            Session::put('halaman_url', request()->fullUrl());
        }
        //$peserta = Peserta::all();
        return view('admin.peserta.index', compact('peserta'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.peserta.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:45',
            'gender' => 'required',
            'telp' => 'required|max:15|min:10',
            'email' => 'required|max:45|unique:peserta',
            'alamat' => 'required',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|min:2|max:280'
        ],
        //custom pesan errornya
        [
            'nama.required'=>'Nama Wajib Diisi',
            'nama.max'=>'Maksimal 45 karakter',
            'gender.required'=>'Gender Wajib Diisi',
            'telp.required'=>'telp Wajib Diisi',
            'telp.max'=>'Maksimal 15 karakter',
            'telp.min'=>'Minimal 10 Karakter',
            'email.required'=>'Email Wajib Diisi',
            'email.max'=>'Maksimal 45 Karakter',
            'email.unique'=>'Email Telah digunakan',
            'alamat.required'=>'alamat Wajib Diisi',
            //'foto.required' =>'Foto Wajib Diisi'
            'foto.min' => 'Ukuran file kurang 2 KB',
            'foto.max' => 'Ukuran file melebihi 2 MB',
            'foto.image' => 'File foto bukan gambar',
            'foto.mimes' => 'File harus jpg,jpeg,png,gif,svg'
        ]
        );

        if (!empty($request->foto)) {
            $fileName = 'peserta_' . $request->email . '.' . $request->foto->extension();

            $request->foto->move(public_path('admin/assets/images'), $fileName);
        } else {
            $fileName = '';
        }

        try{
            DB::table('peserta')->insert(
                [
                    'nama' => $request->nama,
                    'gender' => $request->gender,
                    'telp' => $request->telp,
                    'email' => $request->email,
                    'alamat' => $request->alamat,
                    //'foto' => 'required'
                    'foto' => $fileName
                ]);

            return redirect()->route('peserta.index')
                            ->with('success','New Participant Data Saved Successfully');
        }
        catch(\Exception $e){
            return redirect()->route('peserta.index')
                            ->with('Error', 'So An Error When Inputting Data!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $peserta= Peserta::find($id);
        return view('admin.peserta.detail',compact('peserta'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $peserta= Peserta::find($id);
        return view('admin.peserta.edit', compact('peserta'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required|max:45',
            'gender' => 'required',
            'telp' => 'required|max:15|min:10',
            'email' => 'required|max:45',
            'alamat' => 'required',
            //'foto' => 'required'
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|min:2|max:280'
        ],
        //custom pesan errornya
        [
            'nama.required'=>'Nama Wajib Diisi',
            'gender.required' => 'Gender Wajib Diisi',
            'telp.required' => 'Telp Wajib Diisi',
            'email.required' => 'Email Wajib Diisi',
            'alamat.required' => 'Alamat Wajib Diisi',
            //'foto.required' => 'Foto Wajib Diisi'
            'foto.min' => 'Ukuran file kurang 2 KB',
            'foto.max' => 'Ukuran file melebihi 2 MB',
            'foto.image' => 'File foto bukan gambar',
            'foto.mimes' => 'File harus jpg,jpeg,png,gif,svg'
        ]);

        $foto = DB::table('peserta')->select('foto')->where('id', $id)->get();
        foreach ($foto as $f) {
            $namaFileFotoLama = $f->foto;
        }

        if (!empty($request->foto)) {
            //jika ada foto lama, hapus foto lamanya terlebih dahulu
            if (!empty($namaFileFotoLama)) unlink('admin/assets/images/' . $namaFileFotoLama);
            //lalukan proses ubah foto lama menjadi foto baru
            $fileName = 'peserta_' . $request->email . '.' . $request->foto->extension();
            //$fileName = $request->foto->getClientOriginalName();
            $request->foto->move(public_path('admin/assets/images'), $fileName);
        } else {
            $fileName = $namaFileFotoLama;
        }

        try{
            DB::table('peserta')->where('id', $id)->update(
                [
                    'nama' => $request->nama,
                    'gender' => $request->gender,
                    'telp' => $request->telp,
                    'email' => $request->email,
                    'alamat' => $request->alamat,
                    //'foto' => 'required'
                    'foto' => $fileName
                ]);

                if(session('halaman_url')){
                    return Redirect(session('halaman_url'))->with('success','Update Participant Data Saved Successfully');
                }

            return redirect()->route('peserta.index')
                            ->with('success','Update Participant Data Saved Successfully');
        }
        catch(\Exception $e){
            return redirect()->route('peserta.index')
                            ->with('Error', 'So An Error When Inputting Data!');
        };
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $peserta = Peserta::find($id);
        if(!empty($peserta->foto)) unlink('admin/assets/images/'.$peserta->foto);
        Peserta::where('id',$id)->delete();
        return redirect()->route('peserta.index')
                        ->with('success','Data Peserta Berhasil Dihapus');
    }

}
