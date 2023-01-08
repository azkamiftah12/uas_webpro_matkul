<?php
session_start();

if (!isset($_SESSION["Login"])) {
    header("Location: index.php");
    exit;
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
</head>

<style>
    .editt {
        text-align: center;
        margin: auto;
        background-color: #F5D8D8;
        width: 15%;
    }

    td {
        font-size: 18px;
        padding-left: auto;
    }
</style>

<?php
require('connection.php');
$id = $_GET['id'];
$data = mysqli_query($connection, "select * from mahasiswa where id='$id'");
while ($d = mysqli_fetch_array($data)) {
    ?>

    <body style="background-color: #073b4c;">
        <div class="container my-5 border rounded-5" style="background-color: #f0f0f0;">
            <div class="row p-5">
                <div class="col-lg-12 text-center mb-5">
                    <h1 class="text-capitalize fw-bolder " style="font-size: 42pt">Edit Jadwal</h1>
                </div>
                <form method="post" action="update.php" style="background-color: white;">
                    <div class="container py-5">
                        <table class="table table-striped">
                            <input type="hidden" name="id" value="<?php echo $d['id']; ?>">
                            <tr>
                                <td>Hari</td>
                                <td>
                                    <input type="text" name="hari" value="<?php echo $d['hari']; ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>Waktu</td>
                                <td><input type="text" name="slotwaktu" value="<?php echo $d['slotwaktu']; ?>"></td>
                            </tr>
                            <tr>
                                <td>Matkul</td>
                                <td><input type="text" name="matkul" value="<?php echo $d['matkul']; ?>"></td>
                            </tr>
                            <tr>
                                <td>Dosen</td>
                                <td><input type="text" name="dosen" value="<?php echo $d['dosen']; ?>"></td>
                            </tr>
                            <tr>
                                <td>Ruang</td>
                                <td><input type="text" name="ruang" value="<?php echo $d['ruang']; ?>"></td>
                            </tr>
                            <tr>
                                <td>jj</td>
                                <td><input type="text" name="jj" value="<?php echo $d['jj']; ?>"></td>
                            </tr>
                            <tr>
                                <td>TA</td>
                                <td><input type="text" name="TA" value="<?php echo $d['TA']; ?>"></td>
                            </tr>
                            <tr>
                                <td>semester</td>
                                <td><input type="text" name="semester" value="<?php echo $d['semester']; ?>"></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input onclick="return confirm('yakin ingin mengubah data?')" type="submit"
                                        value="SIMPAN" class="tombol btn btn-success">
                                    <a class="btn btn-danger" href="admin.php">Back</a>
                                </td>
                            </tr>
                        </table>
                    </div>
                </form>

            </div>
        </div>
    </body>
    <?php
}
?>

</html>