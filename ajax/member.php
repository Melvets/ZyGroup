<?php 
include '../functions.php';

$keyword = $_GET["keyword"];

$query = "SELECT * FROM tbl_member WHERE nama LIKE '%$keyword%' OR
                                         jenis_kelamin LIKE '%$keyword%' OR
                                         kota LIKE '%$keyword%' OR
                                         tanggal_lahir LIKE '%$keyword%' OR
                                         telp LIKE '%$keyword%' OR
                                         jabatan LIKE '%$keyword%'";

$datamember = query($query);                                         
?>

<table class="table card-table table-vcenter text-nowrap datatable">
    <thead>
        <tr>
            <th class="w-1">No.</th>
            <th>Gambar</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Kota</th>
            <th>Tanggal Lahir</th>
            <th>No Telepon</th>
            <th>Jabatan</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>

        <?php $i = 1; ?>
        <?php foreach($datamember as $member) : ?>
            
        <tr>
            <td><span class="text-secondary"><?= $i; ?></span></td>
            <td><img src="dist/img/upload/<?php echo $member["gambar"]; ?>" alt="" width="60" class="img-fluid img-thumbnail"></td>
            <td><?= $member["nama"]; ?></td>
            <td><?= $member["jenis_kelamin"]; ?></td>
            <td><?= $member["kota"]; ?></td>
            <td><?= $member["tanggal_lahir"]; ?></td>
            <td><?= $member["telp"]; ?></td>
            <td><?= $member["jabatan"]; ?></td>
            <td>
                <a href="v_edit.php?id=<?= $member["id"] ?>" class="btn btn-default text-green btn-lg shadow rounded-2 p-2" title="update"><i class="fas fa-pen"></i></a>
                <a href="v_delete.php?id=<?= $member["id"]; ?>" onclick="return confirm('Are you sure?');" class="btn btn-default text-red btn-lg shadow rounded-2 p-2" title="delete"><i class="fas fa-trash"></i></a>
            </td>
        </tr>

        <?php $i++; ?>
        <?php endforeach; ?>

    </tbody>
</table>