<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;
use App\Models\Materi;
use App\Models\Pengajar;
use App\Models\jadwal;
use Illuminate\Support\Facades\Auth;

class LandingPageController extends Controller
{
    public function hero(){
        $kelas = Kelas::all();
        return view('users.hero',compact('kelas'));

    }
    public function about(){
        $kelas = Kelas::all();
        return view('users.about',compact('kelas'));

    }
    public function contact(){
        $kelas = Kelas::all();
        return view('users.contact',compact('kelas'));

    }
    public function team(){
        $kelas = Kelas::all();
        return view('users.team',compact('kelas'));

    }
    public function teacher(){
        $pengajar = Pengajar::all();
        $kelas = Kelas::all();
        return view('users.teacher', compact('pengajar','kelas'));

    }
    
    public function kelas(){
        $materi = Materi::all();
        $kelas = Kelas::all();
        return view('users.kelas',compact('kelas','materi'));
    }
    public function jadwal(){
        $kelas = Kelas::all();
        if(empty(Auth::user()->role_access)){
            $jadwal = \Illuminate\Support\Facades\DB::table('penjadwalan_kelas')
            ->join('materi', 'materi.id', '=', 'penjadwalan_kelas.materi_id')
            ->join('peserta', 'peserta.id', '=', 'penjadwalan_kelas.peserta_id')
            ->join('pengajar', 'pengajar.id', '=', 'penjadwalan_kelas.pengajar_id')
            ->select('penjadwalan_kelas.*', 'materi.nama as materi','pengajar.nama as pengajar','peserta.nama as peserta')
            ->orderBy('penjadwalan_kelas.id', 'desc')->get();
        }elseif ( Auth::user()->role_access == 'admin') {
            $jadwal = \Illuminate\Support\Facades\DB::table('penjadwalan_kelas')
            ->join('materi', 'materi.id', '=', 'penjadwalan_kelas.materi_id')
            ->join('peserta', 'peserta.id', '=', 'penjadwalan_kelas.peserta_id')
            ->join('pengajar', 'pengajar.id', '=', 'penjadwalan_kelas.pengajar_id')
            ->select('penjadwalan_kelas.*', 'materi.nama as materi','pengajar.nama as pengajar','peserta.nama as peserta')
            ->orderBy('penjadwalan_kelas.id', 'desc')
            ->get();
        }elseif( Auth::user()->role_access == 'pengajar'){
            $jadwal = \Illuminate\Support\Facades\DB::table('penjadwalan_kelas')
            ->join('materi', 'materi.id', '=', 'penjadwalan_kelas.materi_id')
            ->join('peserta', 'peserta.id', '=', 'penjadwalan_kelas.peserta_id')
            ->join('pengajar', 'pengajar.id', '=', 'penjadwalan_kelas.pengajar_id')
            ->select('penjadwalan_kelas.*', 'materi.nama as materi','pengajar.nama as pengajar','peserta.nama as peserta')
            ->orderBy('penjadwalan_kelas.id', 'desc')->where('penjadwalan_kelas.pengajar_id','=',Auth::user()->pengajar_id)
            ->get();
        }elseif( Auth::user()->role_access == 'peserta'){
            $jadwal = \Illuminate\Support\Facades\DB::table('penjadwalan_kelas')
            ->join('materi', 'materi.id', '=', 'penjadwalan_kelas.materi_id')
            ->join('peserta', 'peserta.id', '=', 'penjadwalan_kelas.peserta_id')
            ->join('pengajar', 'pengajar.id', '=', 'penjadwalan_kelas.pengajar_id')
            ->select('penjadwalan_kelas.*', 'materi.nama as materi','pengajar.nama as pengajar','peserta.nama as peserta')
            ->orderBy('penjadwalan_kelas.id', 'desc')->where('penjadwalan_kelas.peserta_id','=',Auth::user()->peserta_id)
            ->get();
        }
      
        return view('users.schedule', compact('jadwal','kelas'));
    }
    public function show_class(string $id){
        $materi = Materi::all();
        $kelas_detail = Kelas::find($id);
        $kelas = Kelas::all();
        return view('users.detail_kelas',compact('kelas_detail','kelas','materi'));
    }
}
