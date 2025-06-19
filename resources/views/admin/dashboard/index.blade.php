@extends('admin.layout.index')
@section('content')
@if(Auth::user()->role_access == 'peserta')
@include('access_denied')
@endif
<!--  Row 1 -->     
 <div class="container-fluid">
     @include('admin.dashboard.table_count')
     <div class="card">
     <div class="card-body"> 
     <div class="row">
    @include('admin.dashboard.table_jadwal_run')
     </div>
     <div class="row">
    @include('admin.dashboard.table_jadwal_pen')
    </div>
    <div class="row">
    @include('admin.dashboard.table_jadwal_don')
    </div>

     </div>
     </div>
</div>
@endsection