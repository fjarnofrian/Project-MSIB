@extends('admin.layout.index')
@section('content')
        <div class="card w-100">
              <div class="card-body p-4">
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                <p>{{ $message }}</p>
                </div>
                @endif
                <a id='container-CratKt' href="{{route('kategori.create')}}" class="btn">Tambah Data</a>
                <h5 id='container-ketgH5' class="card-title fw-semibold mb-4">Data Kategori</h5>
                <div class="table-responsive">
                  <table class="table text-nowrap mb-0 align-middle">
                    <thead class="text-dark fs-4">
                      <tr>
                        <th class="border-bottom-0">
                          <h6 id='container-THHH' class="fw-semibold mb-0">No</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 id='container-THHH' class="fw-semibold mb-0">Kode Kelas</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 id='container-THHH' class="fw-semibold mb-0">nama</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 id='container-THHH' class="fw-semibold mb-0">Deskripsi</h6>
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
                        @foreach($kategori as $data)
                      <tr>
                        <td class="border-bottom-0"><h6 id='container-THHH' class="fw-semibold mb-0">{{$no++}}</h6></td>
                        <td id='container-THHH' class="border-bottom-0">{{$data->kode_kelas}}</td>
                        <td id='container-THHH' class="border-bottom-0">{{$data->nama}}</td>
                        <td>
                            <form action="{{route('kategori.destroy',$data->id)}}" method="POST">
                            <a id='continer-editpengje' href="{{route('kategori.edit',$data->id)}}" class="btn">
                            <i class="ti ti-pencil"></i>
                            </a>
                            <a id='continer-viewpengje' href="{{route('kategori.edit',$data->id)}}" class="btn">
                            <i class="ti ti-eye"></i>
                            </a>
                            @csrf
                            @method('DELETE')
                            <button id='container-dletepengje' type="submit" class="btn" onclick="alert('anda yakin ingin menghapus data ini?')">
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
