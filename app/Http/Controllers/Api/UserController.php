<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::all();
        return new UserResource(true,'Data User',$user);
    }

    public function store(Request $request)
    {
        $validator = FacadesValidator::make($request->all(),[
            'name' => 'required|max:45',
            'email' => 'required|max:45',
            'role_access' =>'required',
            'password' => 'required|confirmed|min:8',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|min:2|max:2048',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors(),422);
        }
        if (!empty($request->foto)) {
            $fileName = 'user_' . $request->name . '.' . $request->foto->extension();
            //$fileName = $request->foto->getClientOriginalName();
            $request->foto->move(public_path('admin/assets/images/profile'), $fileName);
        } else {
            $fileName = '';
        }
        $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' =>Hash::make($request->password),
                'role_access' =>$request->role_access,
                'pengajar_id' =>$request->pengajar_id,
                'peserta_id' =>$request->peserta_id,
                'foto' => $fileName,

        ]);
        return new UserResource(true, 'Data User Berhasil diinput',$user);
    }

    public function show(string $id)
    {
        $user = User::find($id);
        return new UserResource(true,'Data User',$user);
    }

    public function update(Request $request, string $id)
    {
            $validator = FacadesValidator::make($request->all(),[
                'name' => 'required|max:45',
                'email' => 'required|max:45',
                'role_access' =>'required',
                'foto' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|min:2|max:2048',
            ]);
            if($validator->fails()){
                return response()->json($validator->errors(),422);
            }
            $foto = DB::table('users')->select('foto')->where('id', $id)->get();
        foreach ($foto as $f) {
            $namaFileFotoLama = $f->foto;
        }
        //------------apakah user  ingin ubah upload foto baru-----------
        if (!empty($request->foto)) {
            //jika ada foto lama, hapus foto lamanya terlebih dahulu
            if (!empty($namaFileFotoLama)) unlink('admin/assets/images/profile' . $namaFileFotoLama);
            //lalukan proses ubah foto lama menjadi foto baru
            $fileName = 'user_' . $request->email . '.' . $request->foto->extension();
            //$fileName = $request->foto->getClientOriginalName();
            $request->foto->move(public_path('admin/assets/images/profile'), $fileName);
        } else {
            $fileName = $namaFileFotoLama;
        }
        $user =  User::whereId($id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'role_access' =>$request->role_access,
                'pengajar_id' =>$request->pengajar_id,
                'peserta_id' =>$request->peserta_id,
                'foto' => $fileName,
    ]);
    return new UserResource(true,'Data Materi Berhasil Diubah! ',$user);
}

    public function destroy(string $id)
    {
        $user = User::whereId($id)->first();
        $user->delete();

        //return response
        return new UserResource(true, 'Data User Berhasil Dihapus!', $user);
    }
}
