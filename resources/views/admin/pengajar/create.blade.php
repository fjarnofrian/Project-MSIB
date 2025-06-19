@extends('admin.layout.index')
@section('content')
    <h3>Input Pengajar</h3>
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
        <form method="POST" action="{{ route('pengajar.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-floating mb-3">
                <input value="{{ old('nip') }}" class="form-control @error('nip') is-invalid @enderror" name="nip" value="" id="nipPengajar" type="text"
                    placeholder="NIP Pengajar" data-sb-validations="required" />
                <label for="nipPengajar">NIP</label>
                @error('nip')
                <div id="validationServer03Feedback" class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-floating mb-3">
                <input value="{{ old('nama') }}" class="form-control @error('nama') is-invalid @enderror" name="nama" value="" id="nama" type="text" placeholder="nama"
                    data-sb-validations="required" />
                <label for="nama">Nama</label>
                @error('nama')
                <div id="validationServer03Feedback" class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-control mb-3">
                <label class="mb-2" for="gender">Gender</label> <br>
                <input class="@error('gender') is-invalid @enderror" name="gender" value="l" id="gender" type="radio" placeholder="gender"
                    data-sb-validations="required" /> L <br>
                <input class="@error('gender') is-invalid @enderror" name="gender" value="p" id="gender" type="radio" placeholder="gender"
                    data-sb-validations="required" /> P
                    @error('gender')
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
            </div>
            <div class="form-floating mb-3">
                <input value="{{ old('telp') }}" class="form-control @error('telp') is-invalid @enderror" name="telp" value="" id="telp" type="text" placeholder="telp"
                    data-sb-validations="required" />
                <label for="telp">Telepon</label>
                @error('telp')
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div class="form-floating mb-3">
                <input value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" class="form-control" name="email" value="" id="email" type="text" placeholder="email"
                    data-sb-validations="required" />
                <label for="email">Email</label>
                @error('email')
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div class="form-floating mb-3">
                <input value="{{ old('alamat') }}" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="" id="alamat" type="text" placeholder="alamat"
                    data-sb-validations="required" />
                <label for="alamat">Alamat</label>
                @error('alamat')
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div class="form-control mb-3">
                <label for="foto">Foto</label>
                <input type="file" id="foto" name="foto" value="{{ old('foto') }}" class="form-control @error('foto') @enderror" data-sb-validations="required"/>
                @error('foto')
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div class="form-floating mb-3">
                <textarea class="form-control" name="desk" value="" id="desk" type="text" placeholder="desk"
                    data-sb-validations="required"></textarea>
                <label for="desk">Deskripsi</label>
                <div class="invalid-feedback" data-sb-feedback="desk:required">Deskripsi is required.</div>
            </div>
            <button class="btn btn-success" name="proses" value="simpan" id="simpan" type="submit">Submit</button>
            <a href="{{ url('/pengajar') }}" class="btn btn-warning">Batal</a>
        </form>
    </div>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
@endsection