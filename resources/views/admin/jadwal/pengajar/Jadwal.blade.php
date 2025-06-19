<h2>Jadwal Pengajar</h2>
<p>No.111/PUB/NFC/VIII/2023</p>
<br>

                <h5 >Jadwal Kelas</h5>
                <table border="1" cellpadding="10" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Kelas</th>
                      <th>Materi </th>
                      <th>Durasi </th>
                      <th>Jam Masuk </th>
                      <th>Jam Keluar </th>
                      <th>Tgl Mulai </th>
                      <th>Tgl Akhir </th>
                      <th>Jumlah Peserta</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                      @php 
                      $no = 1;
                      @endphp
                      @foreach($jadwal as $data)
                      @foreach($materi as $m)
                      @if($data->materi_id == $m->id)
                    <tr>
                    <td>{{$no++}} </td>
                    <td>{{$data->kelas}}</td>
                    <td>{{$data->materi}}</td>
                      @php
                                $start = strtotime($data->jam_masuk);
                                $end = strtotime($data->jam_keluar);
                                $diff = $end - $start;
                                $durasi = floor($diff/(60*60));
                        @endphp
                    <td>{{$durasi}} Jam</td>
                    <td>{{$data->jam_masuk}}</td>
                    <td>{{$data->jam_keluar}}</td>
                    <td>{{$data->tgl_mulai}}</td>
                    <td>{{$data->tgl_akhir}}</td>
                    <td>{{$data->peserta}}</td>
                      @php 
                        if(now() < $data->tgl_mulai){
                          $status = 'Pending';
                        }elseif(now()->between($data->tgl_mulai,$data->tgl_akhir)){
                          $status = 'Running';
                        }else{
                          $status = 'Done';
                        }
                      @endphp
                      <td >
                     {{$status}}
                      </td>
                    </tr>
                    @endif  
                    @endforeach  
                    @endforeach                       
                  </tbody>
                </table>
              </div>
            </div>
          </div>
