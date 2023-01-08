<?php
//koneksi database
include 'connection.php';

//menangkap data yang di kirim dari form 
$id = $_POST['id'];
$hari = $_POST['hari'];
$slotwaktu = $_POST['slotwaktu'];
$matkul = $_POST['matkul'];
$dosen = $_POST['dosen'];
$ruang = $_POST['ruang'];
$jj = $_POST['jj'];
$TA = $_POST['TA'];
$semester = $_POST['semester'];

//update data ke database 
mysqli_query($connection, "update mahasiswa set hari='$hari', slotwaktu='$slotwaktu', matkul='$matkul', dosen='$dosen', ruang='$ruang', jj='$jj', TA='$TA' , semester='$semester' where id='$id'");

//mengalihkan halaman balik ke admin.php
header("location:admin.php");

?>