<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pengaduan Masyarakat</title>
</head>

<body>
  @include('layouts.sidebar')
  <div style=" padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); background-color: #ffffff; display: flex; align-items: center; margin-top: 6rem; align-items: flex-start;">
    <!-- Bagian kiri -->
    <div style="flex: 1;">

      <h1>Nama : @foreach($detail as $item) {{$item->nama}} @break @endforeach</h1>

      <p>Tanggal Pengaduan: {{$pengaduan->tgl_pengaduan}} Nik :{{$pengaduan->nik}}</p>
      <img style="border-radius: 5px;width:500px;height:300px" src='{{asset("storage/image/" .$pengaduan->foto)}}'>
      <h5 style="margin-top: 1rem;">isi pengaduan :</h5>
      <h4>{{$pengaduan->isi_laporan}}</h4>
    </div>

    <!-- Bagian kanan -->
    <div style="flex: 1; margin-top:4rem;">
      <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th style="text-align: center;">Tanggapan Petugas</th>
          </tr>
        </thead>
        <tbody>@foreach($tanggapan as $item)
          <tr data-bs-toggle="modal" data-bs-target="#myModal1">
            <td> {{$item->tanggapan}} </td>
          </tr>@endforeach
        </tbody>
      </table>
    </div>

  </div>
</body>

</html>