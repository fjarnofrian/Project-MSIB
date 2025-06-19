<?php

namespace App\Http\Controllers;

use App\Models\jadwal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Peserta;
use App\Models\Pengajar;
use App\Models\Kelas;

class DashboardController extends Controller
{
    public function index()
    {
        $pesertacount = Peserta::count();
        $pengajartacount = Pengajar::count();
        $kelascount = Kelas::count();
        $penjadwalan = jadwal::all();

        return view('admin.dashboard.index', ['penjadwalan'=>$penjadwalan, 'peserta'=>$pesertacount, 'pengajar'=>$pengajartacount, 'kelas'=>$kelascount]);
    }
}
