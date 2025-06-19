@extends('admin.layout.index')
@section('content')
    <h3>Edit User</h3>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container px-5 my-5">
        <form method="POST" action="{{ route('user.update',$user->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
            <div class="form-floating mb-3">
                <input class="form-control" name="name" value="{{$user->name}}" id="nama" type="text" placeholder="nama"
                    data-sb-validations="required" />
                <label for="nama">Nama</label>
                <div class="invalid-feedback" data-sb-feedback="users:required">Nama is required.</div>
            </div>
            <!-- <div class="form-floating mb-3">
                <input class="form-control" name="id_card" value="" id="nipPengajar" type="text"
                    placeholder="NIP Pengajar" data-sb-validations="required" />
                <label for="nipPengajar">NIP/NIK</label>
                <div class="invalid-feedback" data-sb-feedback="users:required">NIP/NIK is required.</div>
            </div> -->
            <div class="form-floating mb-3">
                <input class="form-control" name="email" value="{{$user->email}}" id="email" type="text" placeholder="email"
                    data-sb-validations="required" />
                <label for="email">Email</label>
                <div class="invalid-feedback" data-sb-feedback="email:required">Email is required.</div>
            </div>
            <!-- <div class="form-floating mb-3">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="new-password" autofocus>
                <label for="alamat">Password</label> 
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>  
            <div class="form-floating mb-3">
            <input id="password-confirm" type="password" class="form-control form-control-lg" name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password" autofocus>
                <label for="alamat">Password Confirmation</label> 
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div> -->
            @if($user->role_access == 'pengajar')
            <div class="form-floating mb-3">
                <select class="form-control" name="pengajar_id" id="">
                    <option value="">Pilih Pengajar</option>
                    @foreach($pengajar as $data)
                    @if($data->id == $user->pengajar_id)
                    <option value="{{$data->id}}" selected>{{$data->nama}}</option>
                    @endif
                    <option value="{{$data->id}}">{{$data->nama}}</option>
                    @endforeach
                </select>
                <label for="email">identitas</label>
            </div>
            @elseif($user->role_access == 'peserta')
            <div class="form-floating mb-3">
                <select class="form-control" name="peserta_id" id="">
                    <option value="">Pilih Peserta</option>
                    @foreach($peserta as $data)
                    @if($data->id == $user->peserta_id)
                    <option value="{{$data->id}}" selected>{{$data->nama}}</option>
                    @endif
                    <option value="{{$data->id}}">{{$data->nama}}</option>
                    @endforeach
                </select>
                <label for="email">identitas</label>
            </div>
            @endif
            <div class="form-floating mb-3">
                <select class="form-control" name="role_access" id="">
                    <option value="">Pilih Role</option>
                    @if($user->role_access == 'pengajar')
                    <option value="pengajar" selected>Pengajar</option>
                    <option value="peserta">Peserta</option>
                    <option value="admin">Administrator</option>
                    @endif
                    @if($user->role_access == 'peserta')
                    <option value="pengajar">Pengajar</option>
                    <option value="peserta" selected>Peserta</option>
                    <option value="admin">Administrator</option>
                    @endif
                    @if($user->role_access == 'admin')
                    <option value="pengajar">Pengajar</option>
                    <option value="peserta">Peserta</option>
                    <option value="admin"selected>Administrator</option>
                    @endif
                </select>
            </div>
            <div class="form-control mb-3">
                <label for="foto">Foto</label>
                <input type="file" id="foto" name="foto" value="{{$user->fot}}" class="form-control @error('foto') @enderror" data-sb-validations="required"/>
                @error('foto')
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <button class="btn btn-primary" name="proses" value="simpan" id="simpan" type="submit">Simpan</button>
            <a href="{{ url('/user') }}" class="btn btn-warning">Batal</a>
        </form>
    </div>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
@endsection
