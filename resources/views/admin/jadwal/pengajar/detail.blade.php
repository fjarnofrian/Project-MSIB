@extends('admin.layout.index')
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <body>
        @foreach($jadwal as $data)
        @foreach($jml as $j)
        @if($j->materi_id == $data->materi_id)
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    @empty($data->foto)
                    <img src="{{asset('admin/assets/images/nophoto.jpg')}}" width="500" height="500" class="rounded-circle">
                    @else
                    <img src="{{asset('admin/assets/images')}}/{{$data->foto}}" width="500" height="500" class="img-thumbnail">
                    @endempty
                    <h3 align="center">{{$data->pengajar}}</h3>
                </div>

                <div class="col-md-8">
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Overview</a>
                        </li>
                    </ul>
                    <hr>
                    <h4>Deskirpsi</h4>
                    <p>{{$data->desk}}</p> </br>

                    <h4>Profile Details</h4> </br>
                    <div class="row">
                        <div class="col-md-4">
                            <p><b>Kode Kelas</b></p>
                            <p><b>Kelas</b></p>
                            <p><b>Materi</b></p>
                            <p><b>Durasi</b></p>
                            <p><b>Tanggal Mulai</b></p>
                            <p><b>Jumlah peserta</b></p>
                            <p><b>Status</b></p>
                        </div>
                        <div class="col-md-8">
                            <p>{{$data->kode_kelas}}</p>
                            <p>{{$data->kelas}}</p>
                            <p>{{$data->materi}}</p>
                            @php
                                $start = strtotime($data->jam_masuk);
                                $end = strtotime($data->jam_keluar);
                                $diff = $end - $start;
                                $durasi = floor($diff/(60*60));
                            @endphp

                            <p>{{$durasi}} Jam </p>
                            <p>{{$data->tgl_mulai}} - {{$data->tgl_akhir}}</p>
                            <p>{{$j->peserta}}</p>
                            @php 
                            if(now() < $data->tgl_mulai){
                                $status = 'Akan Datang';
                            }elseif(now()->between($data->tgl_mulai,$data->tgl_akhir)){
                                $status = 'Berjalan';
                            }else{
                                $status = 'Selasai';
                            }
                            @endphp

                            <p>
                            @if(now() < $data->tgl_mulai)
                            <span class="badge bg-warning rounded-3 fw-semibold">{{$status}}</span>
                            @elseif(now()->between($data->tgl_mulai,$data->tgl_akhir))
                            <span class="badge bg-primary rounded-3 fw-semibold">{{$status}}</span>
                            @else
                            <span class="badge bg-danger rounded-3 fw-semibold">{{$status}}</span>
                            @endif
                            </p>
                        </div>
                        <div class="col-md-2">
                        <a id='continer-view' href="{{url('detail_surat_tugas', $data->id)}}" class="btn btn-secondary">
                           Cetak<i class="ti ti-printer"></i>
                        </a>
                        </div>
                        <div class="col-md-2">
                        <a id='continer-view' href="{{url('index_pengajar')}}" class="btn btn-secondary">
                           Kembali<i class="ti ti-arrow-back-up"></i>
                        </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        @endif
        @endforeach
        @endforeach
    </body>

    </html>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
@endsection
