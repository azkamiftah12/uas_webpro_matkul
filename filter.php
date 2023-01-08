<?php

require 'connection.php';
$keyword = $_GET['keyword'];
$query = "SELECT * FROM mahasiswa WHERE hari LIKE '%$keyword%' 
OR  slotwaktu LIKE '%$keyword%' 
OR matkul LIKE '%$keyword%' 
OR dosen LIKE '%$keyword%' 
OR ruang LIKE '%$keyword%' 
OR jj LIKE '%$keyword%' 
OR ta LIKE '%$keyword%' 
OR semester LIKE '%$keyword%'";
$mahasiswa = mysqli_query($connection, $query);



?>

<form action="" method="post">
    <table class="border table table-striped">
        <tr>
            <th>NO</th>
            <th>Hari</th>
            <th>Waktu</th>
            <th>Matkul</th>
            <th>Dosen</th>
            <th>Ruang</th>
            <th>jj</th>
            <th>TA</th>
            <th>Semester</th>
            <th>Interaksi</th>
        </tr>
        <?php
        $no = 1;
        while ($d = mysqli_fetch_array($mahasiswa)) {
        ?>
        <tr>
            <td>
                <?php echo $no++; ?>
            </td>
            <td>
                <?php echo $d['hari']; ?>
            </td>
            <td>
                <?php echo $d['slotwaktu']; ?>
            </td>
            <td>
                <?php echo $d['matkul']; ?>
            </td>
            <td>
                <?php echo $d['dosen']; ?>
            </td>
            <td>
                <?php echo $d['ruang']; ?>
            </td>
            <td>
                <?php echo $d['jj']; ?>
            </td>
            <td>
                <?php echo $d['TA']; ?>
            </td>
            <td>
                <?php echo $d['semester']; ?>
            </td>
            <td>
                <a class="btn btn-warning me-3" href="edit.php?id=<?php echo $d['id']; ?>">EDIT</a>
                <a class="btn btn-danger" href="delete.php?id=<?php echo $d['id']; ?>"
                    onclick="return confirm('yakin ingin menghapus mata kuliah?')">HAPUS</a>
            </td>
        </tr>
        <?php
        }
        ?>
    </table>