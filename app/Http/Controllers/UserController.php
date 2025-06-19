<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pengajar;
use App\Models\Peserta;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        $user = User::all();
        return view('admin.user.index', compact('user'));
    }
    public function create()
    {
        $pengajar = Pengajar::all();
        $peserta = Peserta::all();
        return view('admin.user.create',compact('pengajar','peserta'));
    }
    public function store(Request $request)
    {
        $request->validate(
            [
                // 'id_card' => 'required|unique:pengajar|max:5',
                'name' => 'required|max:45',
                'email' => 'required|max:45',
                'role_access' =>'required',
                'password' => 'required|confirmed|min:8',
                'foto' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|min:2|max:2048',
            ],
            //custom pesan errornya
            [
                // 'id_card.required' => 'NIP/NIK Wajib Diisi',
                // 'id_card.unique' => 'NIP/NIK Sudah Ada (Terduplikasi)',
                // 'id_card.max' => 'NIP/NIK Maksimal 5 karakter',
                'name.required' => 'Nama Wajib Diisi',
                'name.max' => 'Nama Maksimal 45 karakter',
                'email.required' => 'Email Wajib Diisi',
                'email.max' => 'Email maksimal 45 karakter',
                'password.required' => 'Password Wajib Diisi',
                'password.confirmed' => 'Password tidak cocok',
                'password.min' => 'Password minimal 8 karakter',
                'role_access.required' => 'Role Access Wajib Diisi',
                'foto.min' => 'Ukuran file kurang 2 KB',
                'foto.max' => 'Ukuran file melebihi 2 MB',
                'foto.image' => 'File foto bukan gambar',
                'foto.mimes' => 'File harus jpg,jpeg,png,gif,svg',
            ]
        );

        //Produk::create($request->all());
        //------------apakah user  ingin upload foto--------- --
        if (!empty($request->foto)) {
            $fileName = 'user_' . $request->name . '.' . $request->foto->extension();
            //$fileName = $request->foto->getClientOriginalName();
            $request->foto->move(public_path('admin/assets/images/profile'), $fileName);
        } else {
            $fileName = '';
        }

        //lakukan update data dari request form edit
        DB::table('users')->insert(
            [
                // 'id_card' => $request->id_card,
                'name' => $request->name,
                'email' => $request->email,
                'password' =>Hash::make($request->password),
                'role_access' =>$request->role_access,
                'pengajar_id' =>$request->pengajar_id,
                'peserta_id' =>$request->peserta_id,
                'foto' => $fileName,
            ]
        );

        return redirect()->route('user.index')
            ->with('success', 'Data Users Berhasil Disimpan');
    }
    public function show(string $id)
    {
        $user = User::find($id);
        $pengajar = Pengajar::all();
        $peserta = Peserta::all();
        return view('admin.user.detail',compact('user','pengajar','peserta'));
    }
    public function edit(string $id)
    {
        $user = User::find($id);
        $pengajar = Pengajar::all();
        $peserta = Peserta::all();
        return view('admin.user.edit',compact('user','pengajar','peserta'));
    }

    public function update(Request $request, string $id)
    {
        //proses input produk dari form
        $request->validate(
            [
                // 'id_card' => 'required|unique:pengajar|max:5',
                'name' => 'required|max:45',
                'email' => 'required|max:45',
                'role_access' =>'required',
                // 'password' => 'required|confirmed|min:8',
                'foto' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|min:2|max:2048',
            ],
            //custom pesan errornya
            [
                // 'id_card.required' => 'NIP/NIK Wajib Diisi',
                // 'id_card.unique' => 'NIP/NIK Sudah Ada (Terduplikasi)',
                // 'id_card.max' => 'NIP/NIK Maksimal 5 karakter',
                'name.required' => 'Nama Wajib Diisi',
                'name.max' => 'Nama Maksimal 45 karakter',
                'email.required' => 'Email Wajib Diisi',
                'email.max' => 'Email maksimal 45 karakter',
                // 'password.required' => 'Password Wajib Diisi',
                // 'password.confirmed' => 'Password tidak cocok',
                // 'password.min' => 'Password minimal 8 karakter',
                'role_access.required' => 'Password Wajib Diisi',
                'foto.min' => 'Ukuran file kurang 2 KB',
                'foto.max' => 'Ukuran file melebihi 2 MB',
                'foto.image' => 'File foto bukan gambar',
                'foto.mimes' => 'File harus jpg,jpeg,png,gif,svg',
            ]
        );
        //------------ambil foto lama apabila user ingin ganti foto-----------
        $foto = DB::table('users')->select('foto')->where('id', $id)->get();
        foreach ($foto as $f) {
            $namaFileFotoLama = $f->foto;
        }
        //------------apakah user  ingin ubah upload foto baru-----------
        if (!empty($request->foto)) {
            //jika ada foto lama, hapus foto lamanya terlebih dahulu
            if (!empty($namaFileFotoLama)) unlink('admin/assets/images/profile/' . $namaFileFotoLama);
            //lalukan proses ubah foto lama menjadi foto baru
            $fileName = 'user_' . $request->email . '.' . $request->foto->extension();
            //$fileName = $request->foto->getClientOriginalName();
            $request->foto->move(public_path('admin/assets/images/profile/'), $fileName);
        } else {
            $fileName = $namaFileFotoLama;
        }

        //lakukan update data dari request form edit
        DB::table('users')->where('id', $id)->update(
            [
                'name' => $request->name,
                'email' => $request->email,
                'role_access' =>$request->role_access,
                'pengajar_id' =>$request->pengajar_id,
                'peserta_id' =>$request->peserta_id,
                'foto' => $fileName,
            ]
        );
        return redirect()->route('user.index')
        ->with('success','Data Kategori Baru Berhasil Disimpan');
    }


    public function destroy(string $id)
    {
         //sebelum hapus data, hapus terlebih dahulu fisik file fotonya jika ada
         $user = user::find($id);
         if (!empty($user->foto)) unlink('admin/assets/images/profile/' . $user->foto);
         //hapus data di database
         User::where('id', $id)->delete();
         return redirect()->route('user.index')
             ->with('success', 'Data user Berhasil Dihapus');
    }
}
