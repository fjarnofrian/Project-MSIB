@extends('admin.layout.index')
@section('content')
@include('sweetalert::alert')
<h3>Daftar Pengajar</h3></br>
<a href="{{route('pengajar.create')}}" class="btn btn-success" title="Tambah Data">Tambah Data
<i class="ti ti-plus"></i>
</a></br></br>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach ($pengajar as $data)
            <div class="col" style="width : 25%">
                <div class="card h-100">
                    @empty($data->foto)
                    <img src="{{asset('admin/assets/images/nophoto.jpg')}}" class="img-thumbnail card-img-top"  alt="...">
                    @else
                    <img src="{{asset('admin/assets/images')}}/{{$data->foto}}" class="img-thumbnail card-img-top" alt="{{$data->foto}}">
                    @endempty
                    <div class="card-body">
                        <h5 class="card-title">{{ $data->nama }}</h5>
                        <p class="card-text">NIP : {{$data->nip}}</p>
                        <p class="card-text">Gender : {{$data->gender}}</p>
                        <p class="card-text">No HP : {{$data->telp}}</p>
                        <p class="card-text">Email : {{$data->email}}</p>
                        <p class="card-text">Alamat : {{$data->alamat}}</p>
                        <p class="card-text">Deskripsi : {{$data->desk}}</p>
                    </div>
                    <div class="card-footer text-muted">
                        <form align="center" method="POST" action="{{ route('pengajar.destroy',$data->id) }}">
                          @csrf
                          @method('DELETE')
                          <a  class="btn btn-warning" href="{{ route('pengajar.edit',$data->id) }}" title="Edit Data">
                            <i class="ti ti-pencil"></i>
                          </a>
                          <a  class="btn btn-primary" href="{{ route('pengajar.show',$data->id) }}" title="Detail Data">
                            <i class="ti ti-eye"></i>
                          </a>
                          <!-- hapus data -->
                          <button  class="btn btn-danger delete-confirm" type="submit" title="Hapus Data"
                          name="proses" value="hapus">
                          <i class="ti ti-trash"></i>
                        </button>
                        <input type="hidden" name="idx" value="" />
                      </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
