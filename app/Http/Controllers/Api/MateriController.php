<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MateriResource;
use App\Models\Materi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class MateriController extends Controller
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
                return new MateriResource(true,'Data Materi',$materi);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'kode_materi'=>'required|unique:materi',
            'nama' => 'required|max:45',
            'kelas_id' => 'required',
            'desk' => 'required'
        ]);

        //cek error atau tidak inputan data
        if($validator->fails()){
            return response()->json($validator->errors(),422);
        }
        //proses menyimpan data yg diinput
        $materi = Materi::create([
            'kode_materi' => $request->kode_materi,
            'nama' => $request->nama,
            'kelas_id' => $request->kelas_id,
            'desk' => $request->desk,
        ]);

        return new MateriResource(true, 'Data Materi Berhasil diinput',$materi);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $materi = DB::table('materi')
        ->join('kelas', 'kelas.id', '=', 'materi.kelas_id')
        ->select('materi.*', 'kelas.nama as kelas')
        ->orderBy('materi.id', 'desc')->where('materi.id',$id)->get();
        return new MateriResource(true,'Data Materi',$materi);
    }

    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'kode_materi' => 'required',
            'nama' => 'required|max:45',
            'kelas_id' => 'required|',
            'desk' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        $materi = Materi::whereId($id)->update([
            'kode_materi'=>$request->kode_materi,
            'nama'=>$request->nama,
            'kelas_id'=>$request->kelas_id,
            'desk'=>$request->desk
        ]);

        return new MateriResource(true,'Data Materi Berhasil Diubah! ',$materi);
    }

    public function destroy(string $id)
    {
        $materi = Materi::whereId($id)->first();
        $materi->delete();

        //return response
        return new MateriResource(true, 'Data materi Berhasil Dihapus!', $materi);

    }
}
