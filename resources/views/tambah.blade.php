<!DOCTYPE html>
<html>
<head>
    <meta name=""csrf-token content="{{ csrf_token() }}">

    <title>Tambah Data</title>
</head>
<body>

    <form action="{{ route('post.tambah') }}" method="POST">
        @csrf  
        <input type="text" name="nim" placeholder="NIM">
        @error('nim')
            <p style="color:red">{{ $message }}</p>
        @enderror
        <br><br>

        <input type="text" name="nama" placeholder="Nama">
        @error('nama')
            <p style="color:red">{{ $message }}</p>
        @enderror
        <br><br>

        <input type="submit" value="Simpan">

    </FORM>

</body>
</html>