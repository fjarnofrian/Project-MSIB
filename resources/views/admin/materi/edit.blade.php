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
<div class="card-title">
    <h2>Form Edit Data Materi</h2>
</div>
<div class="card-body">
    <form method="POST" action="{{route('materi.update',$materi->id)}}">
        @csrf
        @method('PUT')
        <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Kode Materi</label>
        <input type="text" name="kode_materi" value="{{$materi->kode_materi}}" class="form-control  @error('kode_materi') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp">
        @error('kode_materi')
        <div id="validationServer03Feedback" class="invalid-feedback">
            {{$message}}
            </div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Nama</label>
        <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{$materi->nama}}" id="exampleInputEmail1" aria-describedby="emailHelp">
        @error('nama')
        <div id="validationServer03Feedback" class="invalid-feedback">
            {{$message}}
            </div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">desk</label>
        <textarea name="desk" class="form-control  @error('desk') is-invalid @enderror" cols="30" rows="10">{{$materi->desk}}</textarea>
        @error('desk')
        <div id="validationServer03Feedback" class="invalid-feedback">
            {{$message}}
            </div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Kelas</label>
          <select class="form-control" name="kelas_id" id="">
            @foreach($kelas as $data)
            @if($data->id == $materi->kelas_id)
            <option value="{{$data->id}}" checked>{{$data->nama}}</option>
            @endif
            <option value="{{$data->id}}">{{$data->nama}}</option>
            @endforeach
          </select>
    </div>
    <button type="submit" class="btn btn-success">Update</button>
    <a href="{{ url('/materi') }}" class="btn btn-warning">Batal</a>
    </form>
</div>
</div>
@endsection