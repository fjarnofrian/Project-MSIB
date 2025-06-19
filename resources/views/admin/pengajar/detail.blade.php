@extends('admin.layout.index')
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <body>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    @empty($pengajar->foto)
                    <img src="{{asset('admin/assets/images/nophoto.jpg')}}" width="500" height="500" class="rounded-circle">
                    @else
                    <img src="{{asset('admin/assets/images')}}/{{$pengajar->foto}}" width="500" height="500" class="img-thumbnail">
                    @endempty
                    <h3 align="center">{{$pengajar->name}}</h3>
                    <p align="center">{{$pengajar->role_access}}
                </div>

                <div class="col-md-8">
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Overview</a>
                        </li>
                    </ul>
                    <hr>
                    <h4>Deskirpsi</h4>
                    <p>{{$pengajar->desk}}</p> </br>

                    <h4>Profile Details</h4> </br>
                    <div class="row">
                        <div class="col-md-4">
                            <p><b>NIP</b></p>
                            <p><b>Full Name</b></p>
                            <p><b>Email</b></p>
                            <p><b>Telp</b></p>
                            <p><b>Alamat</b></p>
                            <p><b>Gender</b></p>
                        </div>
                        <div class="col-md-8">
                            <p>{{$pengajar->nip}}</p>
                            <p>{{$pengajar->nama}}</p>
                            <p>{{$pengajar->email}}</p>
                            <p>{{$pengajar->telp}}</p>
                            <p>{{$pengajar->alamat}}</p>
                            <p>
                                @if($pengajar->gender == 'P')
                                    Perempuan
                                @else
                                    Laki-Laki
                                @endif
                            </p>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-md-2">
                        <a id='continer-view' href="{{route('pengajar.index')}}" class="btn btn-secondary">
                           Kembali<i class="ti ti-arrow-back-up"></i>
                        </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </body>

    </html>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
@endsection
