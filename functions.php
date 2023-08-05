<?php 
// Koneksi database
$db = mysqli_connect("localhost", "admin", "admin123", "zygroup");

function query($query){
    global $db;
    $data = mysqli_query($db, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($data)) {
        $rows[] = $row;
    }
    return $rows;
}

function create($data){
    global $db;
    $nama = htmlspecialchars($data["nama"]);
    $jenis_kelamin = htmlspecialchars($data["jenis_kelamin"]);
    $kota = htmlspecialchars($data["kota"]);
    $tanggal_lahir = htmlspecialchars($data["tanggal_lahir"]);
    $telp = htmlspecialchars($data["telp"]);
    $jabatan = htmlspecialchars($data["jabatan"]);

    $gambar = upload();
    if ( !$gambar ){
        return false;
    }

    $query = "INSERT INTO tbl_member (gambar, nama, jenis_kelamin, kota, tanggal_lahir, telp, jabatan) VALUES ('$gambar', '$nama', '$jenis_kelamin', '$kota', '$tanggal_lahir', '$telp', '$jabatan')";

    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}

function upload(){
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    if ( $error === 4 ) {
        echo "
            <script>
                alert ('pilih gambar terlebih dahulu!');
            </script>
        ";

        return false;
    }

    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    $namaFileDepan = explode('.', $namaFile);
    $namaFileDepan = $namaFileDepan[0];

    if ( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
        echo "
            <script>
                alert ('Gunakan ekstensi JPG, JPEG, atau PNG!');
            </script>
        ";

        return false;
    }

    if ( $ukuranFile > 1000000 ) {
        echo "
            <script>
                alert ('Ukuran gambar terlalu besar!');
            </script>
        ";

        return false;
    }

    $namaFileBaru = $namaFileDepan;
    $namaFileBaru .= uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, 'dist/img/upload/' . $namaFileBaru);

    return $namaFileBaru;

}


?>