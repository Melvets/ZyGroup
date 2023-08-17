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
    $gambar_error = null;

    if ( $error === 4 ) {
        echo "
            <script>
                alert ('pilih gambar terlebih dahulu!');
            </script>
        ";

        // $gambar_error = "Harap pilih gambar terlebih dahulu!";

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

function delete($id) {
    global $db;
    mysqli_query($db, "DELETE FROM tbl_member WHERE id = $id");

    return mysqli_affected_rows($db);
}

function edit($data) {
    global $db;

    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $jenis_kelamin = htmlspecialchars($data["jenis_kelamin"]);
    $kota = htmlspecialchars($data["kota"]);
    $tanggal_lahir = htmlspecialchars($data["tanggal_lahir"]);
    $telp = htmlspecialchars($data["telp"]);
    $jabatan = htmlspecialchars($data["jabatan"]);
    $gambarLama = $data["gambarLama"];

    if ( $_FILES['gambar']['error'] === 4 ) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }

    $query = "UPDATE tbl_member SET
                nama = '$nama',
                jenis_kelamin = '$jenis_kelamin',
                kota = '$kota',
                tanggal_lahir = '$tanggal_lahir',
                telp = '$telp',
                jabatan = '$jabatan',
                gambar = '$gambar' 
            WHERE id = $id";

    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}

function register($data) {
    global $db;

    $firstName = $data["first_name"];
    $lastName = $data["last_name"];
    $username = strtolower(stripcslashes($data["username"]));
    $email = $data["email"];
    $password = mysqli_real_escape_string($db, $data["password"]);
    $password2 = mysqli_real_escape_string($db, $data["password2"]);

    $result = mysqli_query($db, "SELECT username FROM tbl_user WHERE username = '$username' ");
    if ( mysqli_fetch_assoc($result) ) {
        echo "
            <script>
                alert('username sudah terdaftar!');
            </script>
        ";
        return false;
    }

    if ( $password !== $password2 ) {
        echo "
            <script>
                alert('konfirmasi password tidak sesuai!');
            </script>
        ";
        return false;
    } 

    $password = password_hash($password, PASSWORD_DEFAULT);

    mysqli_query($db, "INSERT INTO tbl_user ( first_name, last_name, username, email, password ) VALUES ( '$firstName', '$lastName', '$username', '$email', '$password' )");

    return mysqli_affected_rows($db);

}


?>