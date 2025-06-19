@extends('admin.layout.index')
@section('content')
@include('sweetalert::alert')
        <div class="card w-100">
              <div class="card-body p-4">
                <a href="{{route('user.create')}}" class="btn btn-success" title="Tambah Data"> 
                  Tambah Data
                  <i class="ti ti-plus"></i>
               </a>
                <h5 id='container-mterH5' class="card-title fw-semibold mb-4">Data Pengguna</h5>
                <div class="table-responsive">
                  <table class="table text-nowrap mb-0 align-middle">
                    <thead class="text-dark fs-4">
                      <tr>
                        <th class="border-bottom-0">
                          <h6 id='container-THHH' class="fw-semibold mb-0">No</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 id='container-THHH' class="fw-semibold mb-0">Nama</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 id='container-THHH' class="fw-semibold mb-0">Email</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 id='container-THHH' class="fw-semibold mb-0">Role</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 id='container-THHH' class="fw-semibold mb-0">Action</h6>
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                        @php 
                        $no = 1;
                        @endphp
                        @foreach($user as $data)
                      <tr>
                        <td id='container-THHH' class="border-bottom-0"><h6 id='container-THHH' class="fw-semibold mb-0">{{$no++}}</h6></td>
                        <td id='container-THHH' class="border-bottom-0">{{$data->name}}</td>
                        <td id='container-THHH' class="border-bottom-0">{{$data->email}}</td>
                        <td id='container-THHH' class="border-bottom-0">{{$data->role_access}}</td>
                        <td>
                          <a id='continer-viewMTT' href="{{route('user.show',$data->id)}}" title="Edit Data" class="btn btn-warning">
                            <i class="ti ti-eye"></i>
                            </a>
                            <form action="{{route('user.destroy',$data->id)}}" method="POST">
                            <a id='continer-editMTT' href="{{route('user.edit',$data->id)}}" title="Detail Data" class="btn btn-info">
                            <i class="ti ti-pencil"></i>
                            </a>
                            @csrf
                            @method('DELETE')
                            <button id='continer-dtelwMTT' type="submit" title="Hapus Data" class="btn btn-danger delete-confirm" >   
                                <i class="ti ti-trash"></i>
                            </button>
                            </form>
                        </td>
                      </tr>
                      @endforeach                       
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
@endsection