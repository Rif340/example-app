<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
      td{
        text-align: center;
      }
      th{
        text-align: center;
      }

      body{
        overflow: hidden;
      }
    </style>
    <title>Pengaduan Masyarakat</title>
</head>
<body>
@include('layouts.sidebar')
<br>
@if (session()->has('info'))
        <div class="alert alert-success" role="alert" style="text-align: center; width:50%; margin:auto;">
            {{ session('info') }}
        </div>
        @endif
        @if(session('info'))
           <script>
               setTimeout(function () {
                   document.querySelector('.alert').style.display = 'none';
               }, 3000); // Menyembunyikan alert setelah 3 detik
           </script>
           @endif
           @if (session()->has('info2'))
        <div class="alert alert-danger" role="alert" style="text-align: center; width:50%; margin:auto;">
            {{ session('info2') }}
        </div>
        @endif
        @if(session('info2'))
           <script>
               setTimeout(function () {
                   document.querySelector('.alert').style.display = 'none';
               }, 3000); // Menyembunyikan alert setelah 3 detik
           </script>
           @endif
<div class="container " style="overflow: scroll; width:100%; height:550px; ">
  <h2 style="margin-bottom: 2rem;margin-top:2rem;">Data Pengaduan</h2>
  <table class="table table-striped table-bordered" style="padding:25%;">
    <thead>
      <tr>
        <th style="text-align: center;">ID</th>
        <th style="text-align: center;">Nik</th>
        <th style="text-align: center;">Tanggal Pengaduan</th>
        <th style="text-align: center;">isi Pengaduan</th>
        <th style="text-align: center;">Bukti</th>
        <th style="text-align: center;">status</th>
        <th >opsi</th>
      </tr>
    </thead>
    <tbody>
        
        @foreach ($pengaduan as $pengaduan)
      <tr data-bs-toggle="modal" data-bs-target="#myModal1">
      <td style="padding-top: 65px;">{{$pengaduan->id_pengaduan}}</td>
        <td style="padding-top: 65px;">{{$pengaduan->nik}}</td>
        <td style="padding-top: 65px;">{{$pengaduan->tgl_pengaduan}}</td>
        <td style="padding-top: 65px;">{{$pengaduan->isi_laporan}}</td>
        <td><img src='{{asset("storage/image/" .$pengaduan->foto)}}'width="150px"height="150px"></td>
        <td style="padding-top: 65px;">{{$pengaduan->status}}</td>
        <td style="padding-top: 65px;">
        <a href="/update-pengaduan/{{$pengaduan->id_pengaduan}}" class="btn btn-primary">update</a>
        <a href="/detail-pengaduan/{{$pengaduan->id_pengaduan}}" class="btn btn-info">detail</a>
        <a href="/hapus-pengaduan/{{$pengaduan->id_pengaduan}}" class="btn btn-danger">delete</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

    </div>
</body>
</html>