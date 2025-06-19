<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\jadwal;
use App\Models\Kategori;
use App\Models\Kelas;
use App\Models\Materi;
use App\Models\Pengajar;
use App\Models\Peserta;
use PHPUnit\Framework\TestSize\Known;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Dompdf\Dompdf;

class jadwalController extends Controller
{
    public function index(Request $request)
{
    $query = DB::table('penjadwalan_kelas')
        ->join('materi', 'materi.id', '=', 'penjadwalan_kelas.materi_id')
        ->join('peserta', 'peserta.id', '=', 'penjadwalan_kelas.peserta_id')
        ->join('pengajar', 'pengajar.id', '=', 'penjadwalan_kelas.pengajar_id')
        ->select('penjadwalan_kelas.*', 'materi.nama as materi', 'pengajar.nama as pengajar', 'peserta.nama as peserta')
        ->orderBy('penjadwalan_kelas.id', 'desc');

    if ($request->has('search')) {
        $searchTerm = $request->input('search');
        $query->where(function ($q) use ($searchTerm) {
            $q->where('penjadwalan_kelas.kode_kelas', 'LIKE', '%' . $searchTerm . '%')
                ->orWhere('penjadwalan_kelas.kelas', 'LIKE', '%' . $searchTerm . '%')
                ->orWhere('materi.nama', 'LIKE', '%' . $searchTerm . '%')
                ->orWhere('pengajar.nama', 'LIKE', '%' . $searchTerm . '%')
                ->orWhere('peserta.nama', 'LIKE', '%' . $searchTerm . '%');
        });
        $jadwal =DB::table('penjadwalan_kelas')
            ->join('materi', 'materi.id', '=', 'penjadwalan_kelas.materi_id')
            ->join('peserta', 'peserta.id', '=', 'penjadwalan_kelas.peserta_id')
            ->join('pengajar', 'pengajar.id', '=', 'penjadwalan_kelas.pengajar_id')
            ->select('penjadwalan_kelas.*', 'materi.nama as materi','pengajar.nama as pengajar','peserta.nama as peserta')
            ->orderBy('penjadwalan_kelas.kelas', 'desc')
            ->get();
    }
    $materi = Materi::all();   
    $jadwal = $query->get();
        return view('admin.jadwal.index', compact('jadwal','materi'));
    }


    public function index_pengajar(Request $request){
        $jadwal_P =DB::table('penjadwalan_kelas')
        ->join('materi', 'materi.id', '=', 'penjadwalan_kelas.materi_id')
        ->join('peserta', 'peserta.id', '=', 'penjadwalan_kelas.peserta_id')
        ->join('pengajar', 'pengajar.id', '=', 'penjadwalan_kelas.pengajar_id')
        ->select('penjadwalan_kelas.*', 'materi.nama as materi','pengajar.nama as pengajar',DB::raw('COUNT(peserta_id) as peserta'))
        ->where('penjadwalan_kelas.pengajar_id', '=',Auth::user()->pengajar_id)
        ->groupBy('penjadwalan_kelas.kelas')->orderBy('penjadwalan_kelas.kelas', 'desc')
        ->get();
        $materi = Materi::all();
        return view('admin.jadwal.pengajar.index', compact('materi','jadwal_P'));
    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $materi = Materi::all();
        $pengajar = Pengajar::all();
        $peserta = Peserta::all();
        $kelas = Kelas::all();
        return view('admin.jadwal.create',compact('materi','pengajar','peserta','kelas'));


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kelas' => 'required|max:45'
        ],
        //custom pesan errornya
        [
            'kelas.required'=>'Nama Wajib Diisi'
        ]
        );
        jadwal::create($request->all());
        return redirect()->route('jadwal.index')
                        ->with('success','Data jadwal Baru Berhasil Disimpan');
    }
    public function show(string $id){
        
        $jml = DB::table('penjadwalan_kelas')
        ->join('materi', 'materi.id', '=', 'penjadwalan_kelas.materi_id')
        ->join('peserta', 'peserta.id', '=', 'penjadwalan_kelas.peserta_id')
        ->join('pengajar', 'pengajar.id', '=', 'penjadwalan_kelas.pengajar_id')
        ->select('penjadwalan_kelas.*', 'materi.nama as materi','pengajar.nama as pengajar',DB::raw('COUNT(peserta_id) as peserta'))
        ->where('penjadwalan_kelas.pengajar_id', '=',Auth::user()->pengajar_id)
        ->groupBy('penjadwalan_kelas.kelas')->orderBy('penjadwalan_kelas.kelas', 'desc')
        ->get();

        $jadwal = DB::table('penjadwalan_kelas')
        ->join('materi', 'materi.id', '=', 'penjadwalan_kelas.materi_id')
        ->join('peserta', 'peserta.id', '=', 'penjadwalan_kelas.peserta_id')
        ->join('pengajar', 'pengajar.id', '=', 'penjadwalan_kelas.pengajar_id')
        ->select('penjadwalan_kelas.*', 'materi.nama as materi','pengajar.nama as pengajar','materi.desk as desk','pengajar.foto as foto','peserta.nama as peserta')
        ->where('penjadwalan_kelas.id','=', $id)
        ->orderBy('penjadwalan_kelas.kelas', 'desc')
        ->get();
        // dd($jadwal);
        if(Auth::user()->role_access == 'admin'){
            return view('admin.jadwal.detail', compact('jadwal'));
        }else{
        
            return view('admin.jadwal.pengajar.detail', compact('jadwal','jml'));
        }
    }
    public function edit(string $id)
    {
        $jadwal= jadwal::find($id);
        $materi = Materi::all();
        $pengajar = Pengajar::all();
        $peserta = Peserta::all();
        $kelas = Kelas::all();
        return view('admin.jadwal.edit', compact('jadwal','materi','pengajar','peserta', 'kelas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'kode_kelas' => 'required|max:45',
            'pengajar_id'=>'required|max:11',
            'peserta_id'=>'required|max:11',
            'kelas' => 'required|max:45',

        ],
        //custom pesan errornya
        [
            'kode_kelas.required'=>'Nama Wajib Diisi',
            'kode_kelas.max'=>'maksimal 45 kata',
            'pengajar_id.required'=>'Wajib Diisi',
            'pengajar_id.max'=>'maksimal 11 angka',
            'peserta_id.required'=>'Wajib Diisi',
            'peserta_id.max'=>'maksimal 11 angka',
            'kelas.required'=>'Wajib Diisi',
            'kelas.max'=>'maksimal 45 kata',
        ]);
        $jadwal = jadwal::find($id);
        $jadwal->pengajar_id = $request->pengajar_id;
        $jadwal->peserta_id = $request->peserta_id;
        $jadwal->materi_id = $request->materi_id;
        $jadwal->kode_kelas = $request->kode_kelas;
        $jadwal->kelas = $request->kelas;
        $jadwal->jam_masuk = $request->jam_masuk;
        $jadwal->jam_keluar = $request->jam_keluar;
        $jadwal->tgl_mulai = $request->tgl_mulai;
        $jadwal->tgl_akhir = $request->tgl_akhir;
        $jadwal->save();
        return redirect()->route('jadwal.index')
        ->with('success','Data jadwal Baru Berhasil Disimpan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        jadwal::where('id',$id)->delete();
        return redirect()->route('jadwal.index')
                        ->with('success','Data jadwal Berhasil Dihapus');
    }

    public function jadwalPDF(){
        $jadwal = DB::table('penjadwalan_kelas')
                ->join('materi', 'materi.id', '=', 'penjadwalan_kelas.materi_id')
                ->join('peserta', 'peserta.id', '=', 'penjadwalan_kelas.peserta_id')
                ->join('pengajar', 'pengajar.id', '=', 'penjadwalan_kelas.pengajar_id')
                ->select('penjadwalan_kelas.*', 'materi.nama as materi','pengajar.nama as pengajar','peserta.nama as peserta')
                ->orderBy('penjadwalan_kelas.id', 'desc')
                ->get();
        $pdf = PDF::loadView('admin.jadwal.jadwalPDF',['jadwal'=>$jadwal]);
       return $pdf->download('Penjadwalan.pdf');

    }

    public function jadwal_pengajar(){
        $jadwal = DB::table('penjadwalan_kelas')
        ->join('materi', 'materi.id', '=', 'penjadwalan_kelas.materi_id')
        ->join('peserta', 'peserta.id', '=', 'penjadwalan_kelas.peserta_id')
        ->join('pengajar', 'pengajar.id', '=', 'penjadwalan_kelas.pengajar_id')
        ->select('penjadwalan_kelas.*', 'materi.nama as materi','pengajar.nama as pengajar',DB::raw('COUNT(peserta_id) as peserta'))
        ->where('penjadwalan_kelas.pengajar_id', '=',Auth::user()->pengajar_id)
        ->groupBy('penjadwalan_kelas.kelas')->orderBy('penjadwalan_kelas.kelas', 'desc')
        ->get();
        $materi = Materi::all();
        $pdf = PDF::loadView('admin.jadwal.pengajar.Jadwal',['jadwal'=>$jadwal,'materi'=>$materi]);
       return $pdf->download('Jadwal.pdf');
    }
    public function suratTugas(string $id){
        $jadwal = DB::table('penjadwalan_kelas')
        ->join('materi', 'materi.id', '=', 'penjadwalan_kelas.materi_id')
        ->join('peserta', 'peserta.id', '=', 'penjadwalan_kelas.peserta_id')
        ->join('pengajar', 'pengajar.id', '=', 'penjadwalan_kelas.pengajar_id')
        ->select('penjadwalan_kelas.*', 'materi.nama as materi','pengajar.email as email','pengajar.nama as pengajar','materi.desk as desk','pengajar.foto as foto','peserta.nama as peserta', DB::raw('COUNT(peserta_id) as jumlah'))
        ->where('penjadwalan_kelas.id','=', $id)
        ->orderBy('penjadwalan_kelas.kelas', 'desc')
        ->get();
        $jml = DB::table('penjadwalan_kelas')
        ->join('materi', 'materi.id', '=', 'penjadwalan_kelas.materi_id')
        ->join('peserta', 'peserta.id', '=', 'penjadwalan_kelas.peserta_id')
        ->join('pengajar', 'pengajar.id', '=', 'penjadwalan_kelas.pengajar_id')
        ->select('penjadwalan_kelas.*', 'materi.nama as materi','pengajar.nama as pengajar',DB::raw('COUNT(peserta_id) as peserta'))
        ->where('penjadwalan_kelas.pengajar_id', '=',Auth::user()->pengajar_id)
        ->groupBy('penjadwalan_kelas.kelas')->orderBy('penjadwalan_kelas.kelas', 'desc')
        ->get();
        if(Auth::user()->role_access == 'admin'){
            $pdf = PDF::loadView('admin.jadwal.detail_surat_tugas',['jadwal'=>$jadwal, 'jml' => $jml]);
        }else{
            $pdf = PDF::loadView('admin.jadwal.pengajar.detail_surat_tugas',['jadwal'=>$jadwal, 'jml' => $jml]);
        }

        return $pdf->download('Surat-tugas.pdf');

    }
    public function suratTugasAll(){
        $jadwal = DB::table('penjadwalan_kelas')
        ->join('materi', 'materi.id', '=', 'penjadwalan_kelas.materi_id')
        ->join('peserta', 'peserta.id', '=', 'penjadwalan_kelas.peserta_id')
        ->join('pengajar', 'pengajar.id', '=', 'penjadwalan_kelas.pengajar_id')
        ->select('penjadwalan_kelas.*', 'materi.nama as materi','pengajar.email as email','pengajar.nama as pengajar',DB::raw('COUNT(peserta_id) as peserta'))
        ->where('penjadwalan_kelas.pengajar_id', '=',Auth::user()->pengajar_id)
        ->groupBy('penjadwalan_kelas.kelas')->orderBy('penjadwalan_kelas.kelas', 'desc')
        ->get();
        $materi = Materi::all();
        $pdf = PDF::loadView('admin.jadwal.pengajar.surat_tugas',['jadwal'=>$jadwal,'materi'=>$materi]);
       return $pdf->download('Surat-tugas_all.pdf');

    }
   
}
