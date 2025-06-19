@extends('users.layout.index')
@section('content')

<div class="container" data-aos="fade-up">

  <div class="section-title text-center">

    <h2 id='container-schd'>schedule</h2>
    <p id='container-scd' class="separator">My Class Schedule</p>
    <div class="table-responsive">
                  <table class="table table-sm">
                    <thead class="text-dark fs-4">
                      <tr>
                        <th class="border-bottom-0">
                          <h6 id="fw-semibold mb-0" class="fw-semibold mb-0">No</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Materi</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 id="fw-semibold mb-0" class="fw-semibold mb-0">Kelas</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Pengajar</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Tanggal Mulai</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Tanggal Berakhir</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Jam Masuk</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Jam Keluar</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Status</h6>
                        </th>
                      </tr>
                    </thead>
                    <tbody>

                        
                        @foreach($jadwal as $data)
                      <tr>
                        <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{$loop->iteration}}</h6></td>
                        <td class="border-bottom-0">{{$data->materi}}</td>
                        <td class="border-bottom-0">{{$data->kelas}}</td>
                        <td class="border-bottom-0">{{$data->pengajar}}</td>
                        <td class="border-bottom-0">{{$data->tgl_mulai}}</td>
                        <td class="border-bottom-0">{{$data->tgl_akhir}}</td>
                        <td class="border-bottom-0">{{$data->jam_masuk}}</td>
                        <td class="border-bottom-0">{{$data->jam_keluar}}</td>
                        @php
                        if(now() < $data->tgl_mulai){
                            $status = 'Akan dimulai';
                            $bg = 'bg-warning';
                          }elseif(now()->between($data->tgl_mulai,$data->tgl_akhir)){
                            $status = 'Sedang Berlangsung';
                            $bg = 'bg-success';
                        }else{
                            $status = 'Telah Berakhir';
                            $bg = 'bg-secondary';
                        }
                        @endphp

                        <td class="border-bottom-0">
                        <span class="badge {{ $bg }} rounded-3 fw-semibold">{{$status}}</span>
                        </td>
                      </tr>
                      @endforeach                       
                    </tbody>
                  </table>
                </div>
  </div>
  
</div>

@endsection