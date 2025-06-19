@extends('admin.layout.index')
@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="card">
<div class="card-body">
    <form method="POST" action="{{route('jadwal.update',$jadwal->id)}}">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Kode Kelas</label>
            <select class="form-control" name="kode_kelas" id="kelas">
                <option value="">Kode Kelas</option>
                @foreach($kelas as $data)
                    @if($data->kode_kelas == $jadwal->kode_kelas)
                    <option value="{{$data->kode_kelas}}" selected>{{$data->kode_kelas}}</option>
                    @endif
                    <option value="{{$data->kode_kelas}}">{{$data->kode_kelas}}</option>
                @endforeach
            </select>
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Kelas</label>
            <select class="form-control" name="kelas" id="kelas">
                <option value="">Kode Kelas</option>
                @foreach($kelas as $data)
                    @if($data->nama == $jadwal->kelas)
                    <option value="{{$data->nama}}" selected>{{$data->nama}}</option>
                    @endif
                    <option value="{{$data->nama}}">{{$data->nama}}</option>
                @endforeach
            </select>
    </div>
    <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Peserta</label>
        <select class="form-control" name="peserta_id" id="">
            @foreach($peserta as $data)
            @if($data->id == $jadwal->peserta_id)
            <option value="{{$data->id}}" checked>{{$data->nama}}</option>
            @endif
            <option value="{{$data->id}}">{{$data->nama}}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Materi</label>
        <select class="form-control" name="materi_id" id="">
            @foreach($materi as $data)
            @if($data->id == $jadwal->materi_id)
            <option value="{{$data->id}}" checked>{{$data->nama}}</option>
            @endif
            <option value="{{$data->id}}">{{$data->nama}}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Pengajar</label>
        <select class="form-control" name="pengajar_id" id="">
            @foreach($pengajar as $data)
            @if($data->id == $jadwal->pengajar_id)
            <option value="{{$data->id}}" checked>{{$data->nama}}</option>
            @endif
            <option value="{{$data->id}}">{{$data->nama}}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Jam Masuk</label>
        <input type="time" name="jam_masuk" value="{{$jadwal->jam_masuk}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Jam Keluar</label>
        <input type="time" name="jam_keluar" value="{{$jadwal->jam_keluar}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Tanggal Mulai</label>
        <input type="date" name="tgl_mulai" value="{{$jadwal->tgl_mulai}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Tanggal Berakhir</label>
        <input type="date" name="tgl_akhir" value="{{$jadwal->tgl_akhir}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</div>
@endsection