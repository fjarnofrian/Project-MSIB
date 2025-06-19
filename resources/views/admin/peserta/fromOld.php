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
    <h2>Form Create Peserta</h2>
    <form method="POST" action="{{route('peserta.store')}}">
        @csrf
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Nama</label>
        <input type="text" name="nama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="form-floating mb-3">
            Gender <br>
            <input name="gender" value="l" id="gender" type="radio" placeholder="gender" data-sb-validations="required" /> L <br>
            <input name="gender" value="p" id="gender" type="radio" placeholder="gender" data-sb-validations="required" /> P
            <div class="invalid-feedback" data-sb-feedback="telp:required">Gender is required.</div>
        </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">telp</label>
        <input type="text" name="telp" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">email</label>
        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">alamat</label>
        <textarea class='form-control' name="alamat" id="" cols="30" rows="10"></textarea>
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">foto</label>
        <input type="file" name="foto" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</div>
@endsection



@extends('admin.layout.index')
@section('content')

<div id='container-viewss' class="card">
	@empty($pesert->foto)
    	<img src="{{url('admin/assets/images/arvian.jpg')}}" class="card-img-top">
    @else
        <img src="{{url('admin/assets/images')}}/{{$pesert->foto}}" class="card-img-top">
    @endempty
	<div class="card-body">
		<h5 class="card-title">{{ $pesert->nama }}</h5>
		<p class="card-text">
			Gender: {{ $pesert->gender }}
			<br/>Telp : {{ $pesert->telp }}
			<br/>Email : {{ $pesert->email }}
			<br/>Alamat : {{ $pesert->alamat }}
		</p>
		<a href="{{ url('/peserta') }}" class="btn">Go Back</a>
	</div>
</div>

@endsection





==================================== Old Form Create Peserta ====================================



<div class="container px-5 my-5">
<h2 id='creH21'>Form Create Peserta</h2>
    <form id="contactForm" method="POST" action="{{route('peserta.store')}}" enctype="multipart/form-data" data-sb-form-api-token="API_TOKEN">
    @csrf
        <div class="form-floating mb-3">
            <input value="{{ old('nama') }}" class="form-control @error('nama') is-invalid @enderror" id="name" name="nama" type="text" placeholder="name" data-sb-validations="required" />
            <label for="name">Name</label>
            @error('nama')
            <div id="validationServer03Feedback" class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label id="gender" class="form-label d-block">Gender</label>
            <div class="form-check form-check-inline">
            <input id='inp-gender' class="@error('gender') is-invalid @enderror" name="gender" value="l" id="gender" type="radio" placeholder="gender" data-sb-validations="required" /> L 
            <input id='inp-gender' class="@error('gender') is-invalid @enderror" name="gender" value="p" id="gender" type="radio" placeholder="gender" data-sb-validations="required" /> P
            @error('gender')
            <div id="validationServer03Feedback" class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
            </div>
        </div>
        <div class="form-floating mb-3">
            <input value="{{ old('telp') }}" class="form-control @error('telp') is-invalid @enderror" id="telephone" name="telp" type="text" placeholder="telephone" data-sb-validations="required" />
            <label for="telephone">Telephone</label>
            @error('telp')
            <div id="validationServer03Feedback" class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="form-floating mb-3">
            <input  value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" id="email" type="email" name="email" placeholder="email" data-sb-validations="required,email" />
            <label for="email">E-Mail</label>
            @error('email')
            <div id="validationServer03Feedback" class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="form-floating mb-3">
            <textarea value="{{ old('alamat') }}" class="form-control @error('alamat') is-invalid @enderror" id="address" type="text" name="alamat" placeholder="Address" style="height: 10rem;" data-sb-validations="required"></textarea>
            <label for="address">Address</label>
            @error('alamat')
            <div id="validationServer03Feedback" class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="form-floating mb-3">
            <input value="{{ old('foto') }}" class="form-control @error('foto') is-invalid @enderror" id="photo" value='' type="file" name="foto" placeholder="photo" data-sb-validations="required" />
            <label for="foto">Photo</label>
            @error('foto')
            <div id="validationServer03Feedback" class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
            
        </div>
            <button id='tbn-prst' class="btn btn-success btn-lg" name='proses' id="submit" value='submit' type="submit">Create</button>
            <a href="{{ url('/peserta') }}" id='tbn-ccncl' class="btn btn-warning btn-lg">Cancel</a>
    </form>
</div>
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>