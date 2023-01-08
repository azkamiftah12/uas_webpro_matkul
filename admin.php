<?php
session_start();

if (!isset($_SESSION["Login"])) {
    header("Location: index.php");
    exit;
}

require('connection.php');
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

<body style="background-color: #073b4c;">

    <?php
    //fetch table rows from mysql db
    $sql = "select * from mahasiswa";
    $result = mysqli_query($connection, $sql) or die("Error in Selecting " . mysqli_error($connection));

    //create an array
    $array = array();
    $isiarray = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $isiarray[] = $row;
    }

    ?>
    <div class="container-fluid">
        <div class="container my-5 border rounded-5" style="background-color: #f0f0f0;">
            <div class="row p-5">
                <div class="col-lg-12 text-center mb-5">
                    <h1 class="text-capitalize fw-bolder " style="font-size: 42pt">Jadwal Mata Kuliah</h1>
                </div>
                <form action="" method="post" style="background-color: white;">
                    <div class="text-center my-4">
                        <input type="text" name="keyword" class="text-center" size="40" autofocus placeholder="search"
                            autocomplete="off" id="keyword">
                        <br>
                        <br>
                    </div>
                    <div id="container">

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
                            $data = mysqli_query($connection, "select * from mahasiswa");
                            foreach ($isiarray as $data => $d) {
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

                    </div>
                </form>
            </div>
            <div class="col-lg-12 text-center">
                <a class="btn btn-warning my-3" style="width: 20rem;" href="addpage.php">Add Jadwal</a>
            </div>
            <div class="col-lg-12 text-center mb-5">
                <a class="btn btn-danger btn-outline-danger text-light" style="width: 20rem;" href=" logout.php">Log
                    out</a>
            </div>
        </div>
    </div>

    <script src="script.js"></script>
</body>

</html>