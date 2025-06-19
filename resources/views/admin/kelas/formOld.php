@extends('admin.layout.index')
@section('content')
<!-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif -->
<div class="card">
<div class="card-title">
    <h2>Form Data Kelas</h2>
</div>
<div class="card-body">
    <form method="POST" action="{{route('kelas.store')}}">
        @csrf
        <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Kode kelas</label>
        <input type="text" value="{{ old('kode_kelas') }}" name="kode_kelas" class="form-control @error('kode_kelas') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp">
        @error('kode_kelas')
        <div id="validationServer03Feedback" class="invalid-feedback">
            {{$message}}
            </div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Nama</label>
        <input type="text" value="{{ old('nama') }}" name="nama" class="form-control @error('nama') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp">
        @error('nama')
        <div id="validationServer03Feedback" class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Deskripsi</label>
        <textarea value="{{ old('desk') }}" class="form-control @error('desk') is-invalid @enderror" name="desk" id="" cols="30" rows="10"></textarea>
        @error('desk')
        <div id="validationServer03Feedback" class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</div>
@endsection








@extends('admin.layout.index')
@section('content')
<!-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif -->
<div class="card">
<div class="card-title">
    <h2>Form Edit Data Kelas</h2>
</div>
<div class="card-body">
    <form method="POST" action="{{route('kelas.update',$kelas->id)}}">
        @csrf
        @method('PUT')
        <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Kode kelas</label>
        <input type="text" name="kode_kelas" value="{{$kelas->kode_kelas}}" class="form-control @error('kode_kelas') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp">
        @error('kode_kelas')
        <div id="validationServer03Feedback" class="invalid-feedback">
            {{$message}}
            </div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Nama</label>
        <input type="text" name="nama" class="form-control  @error('nama') is-invalid @enderror" value="{{$kelas->nama}}" id="exampleInputEmail1" aria-describedby="emailHelp">
        @error('nama')
        <div id="validationServer03Feedback" class="invalid-feedback">
            {{$message}}
            </div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Deskripsi</label>
        <textarea class="form-control @error('nama') is-invalid @enderror" name="desk" id="" cols="30" rows="10">{{$kelas->desk}}</textarea>
        @error('nama')
        <div id="validationServer03Feedback" class="invalid-feedback">
            {{$message}}
            </div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</div>
@endsection