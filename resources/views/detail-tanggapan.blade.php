<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pengaduan masyarakat</title>
    <style>
        textarea {
            width: 80%;
            padding: 10px;
            height: 47px;
            margin-bottom: 16px;
            margin-top: 2rem;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            resize: none;
        }

        select{
            width: 85%;
            padding: 10px;
            height: 47px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            resize: none;
            background-color: #6610f2; 
            color: #ffffff; 
        }

        button {
            background-color: #6610f2;
            color: #ffffff;
            padding: 12px 20px;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }
    </style>
</head>

<body>
    @include('layouts.sidebar-petugas')
    <h1 style="text-align: center;margin-top: 6rem;">{{$pengaduan->isi_laporan}}</h1>
    <div style=" padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); background-color: #ffffff; display: flex; align-items: center; margin-top: 2rem; align-items: flex-start;">
        <!-- Bagian kiri -->
        <div style="flex: 1;">

            <h4>Nama : @foreach($detail as $item) {{$item->nama}} @break @endforeach</h4>
            <p>Tanggal Pengaduan: {{$pengaduan->tgl_pengaduan}} Nik :{{$pengaduan->nik}}</p>
            
                <img style="border-radius: 5px;width:500px;height:300px" src='{{asset("storage/image/" .$pengaduan->foto)}}'>
        
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
    <script>
        function autoExpand(element) {
            element.style.height = "auto";
            element.style.height = (element.scrollHeight) + "px";
        }
    </script>
</body>

</html>