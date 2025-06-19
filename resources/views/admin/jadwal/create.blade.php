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
    <form method="POST" action="{{route('jadwal.store')}}">
        @csrf
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Kode Kelas</label>
            <select class="form-control" name="kode_kelas" id="kelas">
                <option value="">Kode Kelas</option>
                @foreach($kelas as $data)
                <option value="{{$data->kode_kelas}}">{{$data->kode_kelas}}</option>
                @endforeach
            </select>
    </div>
    <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Kelas</label>
          <select class="form-control" name="kelas" id="kelas">
            <option value="">Kelas</option>
            @foreach($kelas as $data)
            <option value="{{$data->nama}}">{{$data->nama}}</option>
            @endforeach
          </select>
    </div>
    <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Peserta</label>
          <select class="form-control" name="peserta_id" id="">
            <option value="">Nama Peserta</option>
            @foreach($peserta as $data)
            <option value="{{$data->id}}">{{$data->nama}}</option>
            @endforeach
          </select>
    </div>
    <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Materi</label>
          <select class="form-control" name="materi_id" id="">
            <option value="">Pilih Materi</option>
            @foreach($materi as $data)
            <option value="{{$data->id}}">{{$data->nama}}</option>
            @endforeach
          </select>
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Pengajar</label>
        <select class="form-control" name="pengajar_id" id="">
            <option value="">Pilih Pengajar</option>
            @foreach($pengajar as $data)
            <option value="{{$data->id}}">{{$data->nama}}</option>
            @endforeach
          </select>
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Jam Masuk</label>
        <input type="time" name="jam_masuk" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Jam Keluar</label>
        <input type="time" name="jam_keluar" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Tanggal Mulai</label>
        <input type="date" name="tgl_mulai" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Tanggal Berakhir</label>
        <input type="date" name="tgl_akhir" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    
    
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</div>
@endsection