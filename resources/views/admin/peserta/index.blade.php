@extends('admin.layout.index')
@section('content')
@include('sweetalert::alert')
<div class="card w-100">
              <div class="card-body p-4">

                <h5 id='container-pesertaH5' class="card-title fw-semibold mb-4">Data Peserta</h5>

                <a id='container-CratPeserta' href="{{route('peserta.create')}}" class="btn">Tambah Data</a>

                <div id="seac-container" class="row g-3 align-items-center">
                <div id="search" class="col-auto">
                  <form action="/peserta" method="GET">
                      <input type="search" name="search" class="form-control" placeholder="Search">
                  </form>
                </div>
              </div>

                <div class="table-responsive">
                  <table id='container-Tble' class="table text-nowrap mb-0 align-middle">
                    <thead class="text-dark fs-4">
                      <tr>
                        <th class="border-bottom-0">
                          <h6 id='container-THHH' class="fw-semibold mb-0">No</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 id='container-THHH' class="fw-semibold mb-0">Nama</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 id='container-THHH' class="fw-semibold mb-0">Gender</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 id='container-THHH' class="fw-semibold mb-0">Telp</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 id='container-THHH' class="fw-semibold mb-0">E-Mail</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 id='container-THHH' class="fw-semibold mb-0">Alamat</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 id='container-THHH' class="fw-semibold mb-0">Foto</h6>
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
                        @foreach($peserta as $index => $dbpeserta)
                      <tr>

                        <td class="border-bottom-0"><h6 id='container-THHH1' class="fw-semibold mb-0">{{ $index + $peserta->firstItem() }}</h6></td>
                        <td id='container-THHH1' class="border-bottom-0">{{$dbpeserta->nama}}</td>
                        <td id='container-THHH1' class="border-bottom-0">{{$dbpeserta->gender}}</td>
                        <td id='container-THHH1' class="border-bottom-0">{{$dbpeserta->telp}}</td>
                        <td id='container-THHH1' class="border-bottom-0">{{$dbpeserta->email}}</td>
                        <td id='container-THHH1' class="border-bottom-0">{{$dbpeserta->alamat}}</td>
                        <td id='container-LLL' class="border-bottom-0">
                        @empty($dbpeserta->foto)
                          <img src="{{url('admin/assets/images/nophoto.jpg')}}">
                        @else
                          <img src="{{url('admin/assets/images')}}/{{$dbpeserta->foto}}">
                        @endempty
                        </td>
                        <td>
                            <form action="{{route('peserta.destroy',$dbpeserta->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a id='continer-edit' href="{{route('peserta.edit',$dbpeserta->id)}}" class="btn">
                            <i class="ti ti-pencil"></i>
                            </a>
                            <a id='continer-view' href="{{route('peserta.show',$dbpeserta->id)}}" class="btn">
                            <i class="ti ti-eye"></i>
                            </a>
                            <button id='container-dlete' type="submit" class="btn delete-confirm">   
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
              <div id="pagane">
              {{ $peserta->links() }}
              </div>
            </div>
@endsection