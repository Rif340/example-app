<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaduan Masyarakat</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }

        form {
            max-width: 600px;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            height: 47px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            resize: none;
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
    @include('layouts.sidebar')
    <div style="display: flex; align-items: center; margin-top: 6rem; align-items: flex-start;">
    <!-- Bagian kiri -->
    <div style="flex: 1;">
        <h1>Nik Masyrakat: <span style="color:#6610f2;">{{$pengaduan->nik}}</span></h1>
        <p>Tanggal Pengaduan: {{$pengaduan->tgl_pengaduan}}</p>
        <form method="post" enctype="multipart/form-data">
        @method('post')
                @csrf
            <label for="image">Ganti Gambar:</label><br>
            <input type="file" id="image" name="foto"><br><br>

            <label for="message">Ganti Laporan:</label>
            <textarea id="message" name="isi_laporan" oninput="autoExpand(this)"></textarea>

            <button type="submit" style="background-color: #6610f2; color: #ffffff; border-radius: 6px;">Update</button>
        </form>
    </div>

    <!-- Bagian kanan -->
    <div style="flex: 1; margin-top:4rem;">
    <img src='{{asset("storage/image/" .$pengaduan->foto)}}'>
        <!-- Ganti 'path/ke/gambar.jpg' dengan path yang sesuai dengan lokasi gambar -->
        <p>{{$pengaduan->isi_laporan}}</p>
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