<?php
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
    $jumlahItemPerPage = 20;
    $resultpaginasi = mysqli_query($connection, "select * from mahasiswa");
    $jumlahItem = mysqli_num_rows($resultpaginasi);
    $jumlahPage = ceil($jumlahItem / $jumlahItemPerPage);
    if (isset($_GET["page"])) {
        $pageAktiv = $_GET["page"];
    } else {
        $pageAktiv = 1;
    }
    $itemAwal = ($jumlahItemPerPage * $pageAktiv) - $jumlahItemPerPage;

    //query(ambil data)
    $query = "select * from mahasiswa limit $itemAwal, $jumlahItemPerPage";
    $result = mysqli_query($connection, $query) or die("Error in Selecting " . mysqli_error($connection));

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
                    <h1 class="text-capitalize fw-bolder " style="font-size: 42pt">Jadwal Perkuliahan</h1>
                </div>
                <form action="" method="post" style="background-color: white;">
                    <div class="text-center my-5">
                        <input type="text" name="keyword" class="text-center" size="40" autofocus placeholder="search"
                            autocomplete="off" id="keyword">
                    </div>

                    <div>
                        <?php
                        $arrowleft = 0;
                        if ($pageAktiv <= 1) {
                            $arrowleft = $pageAktiv;
                        } else {
                            $arrowleft = $pageAktiv - 1;
                        }

                        $arrowright = 0;
                        if ($pageAktiv >= $jumlahPage) {
                            $arrowright = $pageAktiv;
                        } else {
                            $arrowright = $pageAktiv + 1;
                        }
                        ?>
                        <a href="?page=<?=
                            $arrowleft ?>" class="btn btn-info">&lt;</a>

                        <?php for ($i = 1; $i <= $jumlahPage; $i++): ?>
                            <?php if ($i == $pageAktiv): ?>
                                <a href="?page=<?= $i; ?>" class="btn btn-warning">
                                    <?= $i; ?>
                                </a>
                            <?php else: ?>
                                <a href="?page=<?= $i; ?>" class="btn btn-info">
                                    <?= $i; ?>
                                </a>
                            <?php endif; ?>
                        <?php endfor; ?>
                        <a href="?page=<?= $arrowright ?>" class="btn btn-info">&gt;</a>
                    </div>

                    <div id="container" class="mt-5">
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
                                </tr>
                                <?php
                            }
                            ?>
                        </table>

                    </div>
                </form>
            </div>

            <div class="col-lg-12 text-center mb-5">
                <a class="btn btn-danger btn-outline-danger text-light" style="width: 20rem;"
                    href=" index.php">Keluar</a>
            </div>
        </div>
    </div>

    <script src="script.js"></script>

</body>

</html>