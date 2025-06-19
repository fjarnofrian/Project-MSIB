<h2>Surat Tugas Mengajar</h2>
<p>No.111/PUB/NFC/VIII/2023</p>
<br>

<p><i>Bismillaahir rahmaanir rahiim</i></p>

<p>
    Yang bertanda tanggan dibawah ini :<br>
    <table>
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td> Drs. Rusmnato, MM</td>
        </tr>
        <tr>
            <td>Jabatan</td>
            <td>:</td>
            <td> Manager Divisi Learning Center</td>
        </tr>
        <tr>
            <td>Unit Kerja</td>
            <td>:</td>
            <td> NF Computer</td>
        </tr>
    </table>
    <p>Sesuai dengan kebutuhan kelas yang akan berjalan dan sesuai dengan komptensi pengajar, memberikan tugas sebagai  kepada:</p>
    <table>
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td>{{Auth::user()->name}}</td>
        </tr>
        <tr>
            <td>Email</td>
            <td>:</td>
            <td>{{Auth::user()->email}}</td>
        </tr>
        <tr>
            <td>Unit Kerja</td>
            <td>:</td>
            <td>NF Computer</td>
        </tr>
       
    </table>
    <p>Pada </p>

    <div class="table-responsive">
                  <table class="table text-nowrap mb-0 align-middle" border="1" cellpadding="10" cellspacing="0" width="100%">
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
                      </tr>
                    </thead>
                    <tbody>
                      
                        @foreach($jadwal as $data)
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
                      </tr>
                      @endif
                      @endforeach
                      @endforeach                       
                    </tbody>
                  </table>
                </div>

                <br>
<br>
<br>
<br>
<br>
<table cellpadding="10" cellspacing="0" width="100%">
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td>(.................................)</td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td>Drs. Rusmnato, MM</td>
    </tr>
</table>