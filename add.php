<?php
//koneksi database
include 'conn.php';

//menangkap data yang dikirim  dari form 
$hari = $_POST['hari'];
$slotwaktu = $_POST['slotwaktu'];
$matkul = $_POST['matkul'];
$dosen = $_POST['dosen'];
$ruang = $_POST['ruang'];
$jj = $_POST['jj'];
$TA = $_POST['TA'];
$semester = $_POST['semester'];


//input data ke database
mysqli_query($connection, "insert into mahasiswa values('','$hari','$slotwaktu','$matkul','$dosen','$ruang','$jj','$TA','$semester')");

//mengalihkan ke halaman kembali ke admin.php
header("location:admin.php");

?>