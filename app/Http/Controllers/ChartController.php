<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peserta;
use PHPUnit\Framework\TestSize\Known;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class ChartController extends Controller
{
    public function index()
    {
       return view('admin.dashboard.index');
    }
}
