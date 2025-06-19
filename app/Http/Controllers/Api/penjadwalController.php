<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\jadwalResource;
use App\Models\jadwal;
use Illuminate\Support\Facades\Validator;
use Db;

class penjadwalController extends Controller
{
    public function index(){
        $jadwal = jadwal::join('materi', 'materi.id', '=', 'penjadwalan_kelas.materi_id')
                ->join('peserta', 'peserta.id', '=', 'penjadwalan_kelas.peserta_id')
                ->join('pengajar', 'pengajar.id', '=', 'penjadwalan_kelas.pengajar_id')
                ->select('penjadwalan_kelas.kode_kelas',
                'penjadwalan_kelas.kelas','pengajar.nama as pengajar','materi.nama as materi',
                'penjadwalan_kelas.tgl_mulai','penjadwalan_kelas.tgl_akhir')
                ->get();
                return new jadwalResource(true, 'Penjadwalan Pengajar', $jadwal);
    }
    public function show($id){
        $jd = jadwal::join('materi', 'materi.id', '=', 'penjadwalan_kelas.materi_id')
        ->join('peserta', 'peserta.id', '=', 'penjadwalan_kelas.peserta_id')
        ->join('pengajar', 'pengajar.id', '=', 'penjadwalan_kelas.pengajar_id')
        ->select('penjadwalan_kelas.*', 'materi.nama as materi','pengajar.nama as pengajar')
        ->where('penjadwalan_kelas.id', '=',$id)
        ->get();
        return new jadwalResource(true, 'Detail Jadwal Pengajar', $jd);
    }
    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'kode_kelas' => 'required|max:45',
            'pengajar_id'=>'required|max:11',
            'peserta_id'=>'required|max:11',
            'kelas' => 'required|max:45',
            'jam_masuk' => 'required',
            'jam_keluar' => 'required',
            'tgl_mulai' => 'required',
            'tgl_akhir' => 'required',
            
        ]);
        if ($validator->fails()){
            return response()->json($validator->errors(), 422);
        }
        $jadwalan = jadwal::create([
        'pengajar_id' => $request->pengajar_id,
        'peserta_id' => $request->peserta_id,
        'materi_id' => $request->materi_id,
        'kode_kelas' => $request->kode_kelas,
        'kelas' => $request->kelas,
        'jam_masuk' => $request->jam_masuk,
        'jam_keluar' => $request->jam_keluar,
        'tgl_mulai' => $request->tgl_mulai,
        'tgl_akhir' => $request->tgl_akhir,

        ]);
        return new jadwalResource(true,'Penjadwalan Berhasil di Tambahkan', $jadwalan);
    }

    public function update(Request $request,$id){
        $validator = Validator::make($request->all(),[
            'kode_kelas' => 'required|max:45',
            'pengajar_id'=>'required|max:11',
            'peserta_id'=>'required|max:11',
            'kelas' => 'required|max:45',
            'jam_masuk' => 'required',
            'jam_keluar' => 'required',
            'tgl_mulai' => 'required',
            'tgl_akhir' => 'required',
            
        ]);
        if ($validator->fails()){
            return response()->json($validator->errors(), 422);
        }
        $jadwalan = jadwal::whereId($id)->update([
        'pengajar_id' => $request->pengajar_id,
        'peserta_id' => $request->peserta_id,
        'materi_id' => $request->materi_id,
        'kode_kelas' => $request->kode_kelas,
        'kelas' => $request->kelas,
        'jam_masuk' => $request->jam_masuk,
        'jam_keluar' => $request->jam_keluar,
        'tgl_mulai' => $request->tgl_mulai,
        'tgl_akhir' => $request->tgl_akhir,

        ]);
        return new jadwalResource(true,'Penjadwalan Berhasil di Update', $jadwalan);
    }
    public function destroy($id){
        $jadwalan = jadwal::whereId($id)->first();
        $jadwalan->delete();

        return new jadwalResource(true,'Jadwal Berhasil di hapus!',$jadwalan);
    }

}
