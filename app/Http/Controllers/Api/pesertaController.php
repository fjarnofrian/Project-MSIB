<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Peserta;
use PHPUnit\Framework\TestSize\Known;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Database\eloquent\Model;
use App\Http\Resources\PesertaResource;
use Illuminate\Support\Facades\Validator;

class pesertaController extends Controller
{
    public function index(){
        $peserta = Peserta::all();
        return new PesertaResource(true,'Data Peserta',$peserta);
    }

    public function show($id){
        $peserta = Peserta::find($id);
        return new PesertaResource(true,'Views Peserta',$peserta);
    }

    public function store(Request $request){
        $Validator = Validator::make($request->all(),[
            'nama' => 'required|max:45',
            'gender' => 'required',
            'telp' => 'required|max:15|min:10',
            'email' => 'required|max:45|unique:peserta',
            'alamat' => 'required',
        ]);
        
        if($Validator->fails()){
            return response()->json($Validator->errors(),422);
        }

        $peserta = Peserta::create([
            'nama' => $request->nama,
            'gender' => $request->gender,
            'telp' => $request->telp,
            'email' => $request->email,
            'alamat' => $request->alamat,
        ]);

        return new PesertaResource(true,'Data Peserta Berhasil Di Create',$peserta);
    }

    public function update(Request $request, $id){
        $Validator = Validator::make($request->all(),[
            'nama' => 'required|max:45',
            'gender' => 'required',
            'telp' => 'required|max:15|min:10',
            'email' => 'required|max:45|unique:peserta',
            'alamat' => 'required',
        ]);
        
        if($Validator->fails()){
            return response()->json($Validator->errors(),422);
        }

        $peserta = Peserta::whereId($id)->update([
            'nama' => $request->nama,
            'gender' => $request->gender,
            'telp' => $request->telp,
            'email' => $request->email,
            'alamat' => $request->alamat,
        ]);

        return new PesertaResource(true,'Data Peserta Berhasil Di Update',$peserta);
    }

    public function destroy($id){
        $peserta = Peserta::whereId($id)->first();
        $peserta->delete();

        return new PesertaResource(true,'Data Peserta Berhasil Di Delete',$peserta);
    }
}
