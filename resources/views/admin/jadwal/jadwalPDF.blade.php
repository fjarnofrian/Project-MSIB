      
                <h5 >Jadwal Kelas</h5>
                <table border="1" cellpadding="10" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Kode Kelas</th>
                      <th>Kelas</th>
                      <th>Materi </th>
                      <th>Pengajar </th>
                      <th>Jam Masuk </th>
                      <th>Jam Keluar </th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                      @php 
                      $no = 1;
                      @endphp
                      @foreach($jadwal as $data)
                    <tr>
                      <td  >{{$no++}} </td>
                      <td  >{{$data->kode_kelas}}</td>
                      <td  >{{$data->kelas}}</td>
                      <td  >{{$data->materi}}</td>
                      <td  >{{$data->pengajar}}</td>
                      <td  >{{$data->jam_masuk}}</td>
                      <td  >{{$data->jam_keluar}}</td>
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
                    @endforeach                       
                  </tbody>
                </table>
              </div>
            </div>
          </div>
