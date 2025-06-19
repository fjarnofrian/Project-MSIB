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
    Sesuai dengan kebutuhan kelas yang akan berjalan dan sesuai dengan komptensi pengajar, memberikan tugas sebagai  kepada:
    <table>
        <tr>
            <td>Nama</td>
            <td>:</td>
            @foreach($pengajar as $data)
            <td>{{$data->nama}}</td>
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
            @endforeach
        </tr>
    </table>
    <br>
    pada
    <table border="1" cellpadding="10" cellspacing="0" width="100%">
        <tr>
        @foreach($jadwal as $j)
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
        @endforeach
        <tr>
            <td bgcolor="#cbdad5">Jumlah Peserta</td>
            <td>{{$jumlahPeserta}}</td>
        </tr>
        <tr>
            <td bgcolor="#cbdad5"> Tempat Pelaksanaan</td>
            <td>Kampus B1 Ruang 103</td>
        </tr>
    </table>
    Mohon dipersiapkan kelengkapan mengajar dengan baik. Terima kasih atas kerjasamanya.
</p>