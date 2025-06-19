@extends('admin.layout.index')
@section('content')        
@include('sweetalert::alert')
<h5 id='container-jadwlH5' class="card-title fw-semibold mb-4">Jadwal Kelas</h5>
              <div class="card w-100">
              <div class="card-body p-4">
              <a href="{{url('jadwal_pengajar')}}" class="btn btn-success">
                Download Jadwal
              <i class="ti ti-file"></i></a>
                <a href="{{url('surat_tugas')}}" class="btn btn-success">
                Cetak Surat 
                <i class="ti ti-printer"></i></a>
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                <p>{{ $message }}</p>
                </div>
                @endif
              <div class="table-responsive">
                  <table class="table text-nowrap mb-0 align-middle">
                    <thead class="text-dark fs-4">
                      <tr>
                        <th class="border-bottom-0">
                          <h6 id="fw-semibold mb-0" class="fw-semibold mb-0">No</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 id="fw-semibold mb-0" class="fw-semibold mb-0">Kode Kelas</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 id="fw-semibold mb-0" class="fw-semibold mb-0">Kelas</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Materi</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Durasi</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Status</h6>
                        </th>
                        
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Jumlah Peserta</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Action</h6>
                        </th>
                      </tr>
                    </thead>
                    <tbody>

                        @foreach($jadwal_P as $data)
                        @foreach($materi as $m)
                        @if($data->materi_id == $m->id)
                      <tr>
                        <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{$loop->iteration}}</h6></td>
                        <td class="border-bottom-0">{{$data->kode_kelas}}</td>
                        <td class="border-bottom-0">{{$data->kelas}}</td>
                        <td class="border-bottom-0">{{$data->materi}}</td>
                        @php
                                $start = strtotime($data->jam_masuk);
                                $end = strtotime($data->jam_keluar);
                                $diff = $end - $start;
                                $durasi = floor($diff/(60*60));
                        @endphp
                        <td class="border-bottom-0">{{$durasi}} Jam</td>
                        @php 
                          if(now() < $data->tgl_mulai){
                            $status = 'Pending';
                          }elseif(now()->between($data->tgl_mulai,$data->tgl_akhir)){
                            $status = 'Running';
                          }else{
                            $status = 'Done';
                          }
                        @endphp

                        <td class="border-bottom-0">
                        <span class="badge {{ ($status == 'Running')? 'bg-success' : 'bg-danger' }} rounded-3 fw-semibold">{{$status}}</span>
                        </td>
                        <td class="border-bottom-0">{{$data->peserta}}</td>
                        <td>
                        <a id='continer-view' href="{{route('jadwal.show',$data->id)}}" class="btn">
                            <i class="ti ti-eye"></i>
                        </a>
                        </td>
                      </tr>
                      @endif
                      @endforeach
                      @endforeach                       
                    </tbody>
                  </table>
                </div> 
                @endsection