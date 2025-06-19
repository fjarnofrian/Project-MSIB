<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\KelasResource;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kelas = Kelas::all();
        return new KelasResource(true,'Data Kelas',$kelas);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'kode_kelas'=>'required|unique:kelas',
            'nama' => 'required|max:45',
            'desk' => 'required'
        ]);

        //cek error atau tidak inputan data
        if($validator->fails()){
            return response()->json($validator->errors(),422);
        }
        //proses menyimpan data yg diinput
        $kelas = Kelas::create([
            'kode_kelas' => $request->kode_kelas,
            'nama' => $request->nama,
            'desk' => $request->desk,
        ]);

        return new KelasResource(true, 'Data kelas Berhasil diinput',$kelas);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $kelas = Kelas::find($id);
        return new KelasResource(true,'Data Materi',$kelas);
    }
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'kode_kelas' => 'required',
            'nama' => 'required|max:45',
            'desk' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        $kelas = Kelas::whereId($id)->update([
            'kode_kelas'=>$request->kode_kelas,
            'nama'=>$request->nama,
            'desk'=>$request->desk
        ]);

        return new KelasResource(true,'Data Kelas Berhasil Diubah! ',$kelas);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $materi = Kelas::whereId($id)->first();
        $materi->delete();

        //return response
        return new KelasResource(true, 'Data materi 
	        Berhasil Dihapus!', $materi);
    }
}
