@extends('admin.layout.index')
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <body>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    @empty($peserta->foto)
                    <img src="{{asset('admin/assets/images/nophoto.jpg')}}" width="300" height="300" class="img-thumbnail">
                    @else
                    <img src="{{asset('admin/assets/images/profile/Auth::user()->foto')}}" width="300" height="300" class="img-thumbnail">
                    @endempty
                    <h3 align="center">{{Auth::user()->name}}</h3>
                </div>

                <div class="col-md-8">
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Overview</a>
                        </li>
                    </ul>
                    <hr>
                    <h4>Profile Details</h4> </br>
                    <div class="row">
                        <div class="col-md-4">
                            <p><b>Full Name</b></p>
                            <p><b>Email</b></p>
                            <p><b>Role Access</b></p>
                        </div>
                        <div class="col-md-8">
                            <p>{{Auth::user()->name}}</p>
                            <p>{{Auth::user()->email}}</p>
                            <p>{{Auth::user()->role_access}}</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </body>

    </html>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
@endsection
