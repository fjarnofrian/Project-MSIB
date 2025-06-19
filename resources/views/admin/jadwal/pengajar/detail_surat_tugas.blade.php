<h2>Surat Tugas Mengajar</h2>
<p>No.111/PUB/NFC/VIII/2023</p>
<br>

<p><i>Bismillaahir rahmaanir rahiim</i></p>

<p>
    Yang bertangda tanggan dibawah ini :<br>
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
        
    @foreach($jadwal as $data)
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td>{{$data->pengajar}}</td>
        </tr>
        <tr>
            <td>Email</td>
            <td>:</td>
            <td>{{$data->email}}</td>
        </tr>
        <tr>
            <td>Unit Kerja</td>
            <td>:</td>
            <td>NF Computer</td>
        </tr>
        @endforeach
    </table>
    <p>Pada </p>
    <table border="1" cellpadding="10" cellspacing="0" width="100%">
        
    @foreach($jadwal as $j)
    @foreach($jml as $p)
    @if($p->materi_id == $j->materi_id)
        <tr>
            <td bgcolor="#cbdad5">Kelas</td>
            <td>{{$j->kelas}}</td>
        </tr>
        <tr>
            <td bgcolor="#cbdad5">Kode Kelas</td>
            <td>{{$j->kode_kelas}}</td>
        </tr>
        <tr>
            <td bgcolor="#cbdad5">Materi</td>
            <td>{{$j->materi}}</td>
        </tr>
        @php
            $start = strtotime($j->jam_masuk);
            $end = strtotime($j->jam_keluar);
            $diff = $end - $start;
            $durasi = floor($diff/(60*60));
        @endphp
        <tr>
            <td bgcolor="#cbdad5">Durasi</td>
            <td>{{$durasi}} Jam ({{$j->jam_masuk}} - {{$j->jam_keluar}})</td>
        </tr>
        <tr>
            <td bgcolor="#cbdad5"> Tempat Pelaksanaan</td>
            <td>Kampus B1 Ruang 103</td>
        </tr>
        <tr>
            <td bgcolor="#cbdad5">Status</td>
            @php 
                if(now() < $data->tgl_mulai){
                    $status = 'Akan Datang';
                }elseif(now()->between($data->tgl_mulai,$data->tgl_akhir)){
                    $status = 'Berjalan';
                }else{
                    $status = 'Selasai';
                }
            @endphp
            <td>
                @if(now() < $j->tgl_mulai)
                <span class="badge bg-warning rounded-3 fw-semibold">{{$status}}</span>
                @elseif(now()->between($j->tgl_mulai,$j->tgl_akhir))
                <span class="badge bg-primary rounded-3 fw-semibold">{{$status}}</span>
                @else
                <span class="badge bg-danger rounded-3 fw-semibold">{{$status}}</span>
                @endif
            </td>
        </tr>
        <tr>
        @if($status == 'Akan Datang')
            <td bgcolor="#cbdad5">Tanggal Mulai</td>
            <td>{{$j->tgl_mulai}} - {{$j->tgl_akhir}}</td>
        @else
            <td bgcolor="#cbdad5">Berakhir Pada</td>
            <td>{{$j->tgl_akhir}}</td>
        @endif
        </tr>
        <tr>
            <td bgcolor="#cbdad5">Jumlah Peserta</td>
            <td>{{$p->peserta}}</td>
        </tr>
        @endif
        @endforeach
        @endforeach
    </table>
    Mohon dipersiapkan kelengkapan mengajar dengan baik. Terima kasih atas kerjasamanya.
</p>
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