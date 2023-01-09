<?php
//koneksi database
include 'conn.php';

//menangkap data id yang dikirim dari url
$id = $_GET['id'];


//menghapus data dari database 
mysqli_query($connection, "delete from mahasiswa where id='$id'");

//mengalihkan halaman kembali ke admin.php
header("location:admin.php");

?>