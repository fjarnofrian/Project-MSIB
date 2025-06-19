@extends('admin.layout.index')
@section('content')
<h3>Form Update Pengajar</h3>
<!-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif -->
<div class="container px-5 my-5">
    <form method="POST" action="{{ route('pengajar.update',$pengajar->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
        <div class="form-floating mb-3">
            <input class="form-control  @error('nip') is-invalid @enderror" name="nip" value="{{ $pengajar->nip }}" id="nipPengajar" type="text" placeholder="NIP Pengajar" data-sb-validations="required" />
            <label for="nipPengajar">NIP</label>
            @error('nip')
                <div id="validationServer03Feedback" class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="form-floating mb-3">
            <input class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ $pengajar->nama }}" id="nama" type="text" placeholder="nama" data-sb-validations="required" />
            <label for="nama">Nama</label>
            @error('nama')
                <div id="validationServer03Feedback" class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="form-control mb-3">
            <label class="mb-2" for="gender">Gender</label> <br>
            @if($pengajar->gender == 'L')
            <input class="@error('gender') is-invalid @enderror" name="gender" value="L" id="gender" type="radio" placeholder="gender" data-sb-validations="required" checked/> L <br>
            <input class="@error('gender') is-invalid @enderror" name="gender" value="P" id="gender" type="radio" placeholder="gender" data-sb-validations="required" /> P
            @else
            <input class="@error('gender') is-invalid @enderror" name="gender" value="L" id="gender" type="radio" placeholder="gender" data-sb-validations="required" /> L <br>
            <input class="@error('gender') is-invalid @enderror" name="gender" value="P" id="gender" type="radio" placeholder="gender" data-sb-validations="required" checked/> P
            @endif
            @error('gender')
                <div id="validationServer03Feedback" class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="form-floating mb-3">
            <input class="form-control @error('telp') is-invalid @enderror" name="telp" value="{{$pengajar->telp}}" id="telp" type="text" placeholder="telp" data-sb-validations="required" />
            <label for="telp">Telpon</label>
            @error('telp')
                <div id="validationServer03Feedback" class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="form-floating mb-3">
            <input class="form-control @error('email') is-invalid @enderror" name="email" value="{{$pengajar->email}}" id="email" type="text" placeholder="email" data-sb-validations="required" />
            <label for="email">Email</label>
            @error('email')
                <div id="validationServer03Feedback" class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="form-floating mb-3">
            <input class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{$pengajar->alamat}}" id="alamat" type="text" placeholder="alamat" data-sb-validations="required" />
            <label for="alamat">Alamat</label>
            @error('alamat')
                <div id="validationServer03Feedback" class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="form-control mb-3">
            <label for="foto">Foto</label>
            <input class="form-control @error('foto') is-invalid @enderror" name="foto" value="{{$pengajar->foto}}" id="foto" type="file" data-sb-validations="required" />
            @error('foto')
                <div id="validationServer03Feedback" class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="form-floating mb-3">
            <textarea class="form-control" name="desk" value="" id="desk" type="text" placeholder="desk"
                data-sb-validations="required">{{$pengajar->desk}}</textarea>
            <label for="desk">Deskripsi</label>
            <div class="invalid-feedback" data-sb-feedback="desk:required">Deskripsi is required.</div>
        </div>
        <button class="btn btn-success" name="proses" value="update" id="update" type="submit">Update</button>
        <input type="hidden" name="id" value="{{ $pengajar->id }}"/>
        <a href="{{ url('/pengajar') }}" class="btn btn-info">Batal</a>
    </form>
</div>
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
@endsection
