@extends('admin.layout.index')
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <body>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                @empty($user->foto)
                    <img src="{{asset('admin/assets/images/nophoto.jpg')}}" width="35" height="35" class="rounded-circle">
                    @else
                    <img src="{{asset('admin/assets/images/profile')}}/{{$user->foto}}"  class="img-thumbnail">
                    @endempty
                    <h3 align="center">{{$user->name}}</h3>
                    <p align="center">{{$user->role_access}}</p>
                </div>

                <div class="col-md-8">
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Overview</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Edit Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Settings</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Change Password</a>
                        </li>
                    </ul>
                    <hr>
                    <h4>About</h4>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus error unde deleniti nobis laborum
                        a doloremque, odio placeat, ut, quo illum quae nesciunt temporibus odit repellat facilis dolor
                        reiciendis sunt?</p> </br>

                    <h4>Profile Details</h4> </br>
                    <div class="row">
                        
                        <div class="col-md-4">
                            <p><b>Full Name</b></p>
                            <p><b>Email </b></p>
                            <p><b>role_access</b></p>
                        </div>
                        <div class="col-md-8">
                            <p>{{$user->name}}</p>
                            <p>{{$user->email}}</p>
                            <p>{{$user->role_access}}</p>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-md-2">
                        <a id='continer-view' href="{{route('user.index')}}" class="btn btn-secondary">
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
