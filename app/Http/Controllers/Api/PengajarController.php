<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengajar; //panggil model
use App\Http\Resources\PengajarResource; //panggil resource
use Illuminate\Support\Facades\DB; // jika pakai query builder
use Illuminate\Database\Eloquent\Model; //jika pakai eloquent
use Illuminate\Support\Facades\Validator;

class PengajarController extends Controller
{
    public function index()
    {
        $pengajar = Pengajar::all();
        return new PengajarResource(true, 'Data pengajar', $pengajar);
    }

    public function show($id)
    {
        $pengajar = Pengajar::find($id);
        return new PengajarResource(true, 'Detail pengajar', $pengajar);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nip' => 'required|unique:pengajar|max:3',
            'nama' => 'required|max:45',
            'gender' => 'required',
            'telp' => 'required|max:20',
            'email' => 'required|max:45',
            'alamat' => 'required|max:70',
            'desk' => 'required',
        ]);

        //cek error atau tidak inputan data
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        //proses menyimpan data yg diinput
        $pengajar = Pengajar::create([
            'nip' => $request->nip,
            'nama' => $request->nama,
            'gender' => $request->gender,
            'telp' => $request->telp,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'desk' => $request->desk,
        ]);

        return new PengajarResource(true, 'Data Pengajar Berhasil diinput', $pengajar);
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nip' => 'required|unique:pengajar|max:3',
            'nama' => 'required|max:45',
            'gender' => 'required',
            'telp' => 'required|max:20',
            'email' => 'required|max:45',
            'alamat' => 'required|max:70',
            'desk' => 'required',
        ]);

        //cek error atau tidak inputan data
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        //proses menyimpan data yg diinput
        $pengajar = Pengajar::whereId($id)->update([
            'nip' => $request->nip,
            'nama' => $request->nama,
            'gender' => $request->gender,
            'telp' => $request->telp,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'desk' => $request->desk,
        ]);

        return new PengajarResource(true, 'Data Pengajar Berhasil diubah', $pengajar);

    }

    public function destroy($id)
    {
        $pengajar = Pengajar::whereId($id)->first();
        $pengajar->delete();
        return new PengajarResource(true, 'Data pengajar Berhasil Dihapus', $pengajar);
    }
}
