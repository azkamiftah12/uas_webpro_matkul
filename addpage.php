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
    <div class="container my-5 border rounded-5" style="background-color: #f0f0f0;">
        <div class="row p-5">
            <div class="col-lg-12 text-center mb-5">
                <h1 class="text-capitalize fw-bolder " style="font-size: 42pt">Add Jadwal</h1>
            </div>
            <form method="post" action="add.php" style="background-color: white;">
                <div class="container p-5">

                    <table class="table table-striped fw-semibold" style="font-size: 14px;">
                        <tr>
                            <td>hari</td>
                            <td><input type="text" name="hari"></td>
                        </tr>
                        <tr>
                            <td>waktu</td>
                            <td><input type="text" name="slotwaktu"></td>
                        </tr>
                        <tr>
                            <td>matkul</td>
                            <td><input type="text" name="matkul"></td>
                        </tr>
                        <tr>
                            <td>dosen</td>
                            <td><input type="text" name="dosen"></td>
                        </tr>
                        <tr>
                            <td>ruang</td>
                            <td><input type="text" name="ruang"></td>
                        </tr>
                        <tr>
                            <td>jj</td>
                            <td><input type="text" name="jj"></td>
                        </tr>
                        <tr>
                            <td>TA</td>
                            <td><input type="text" name="TA"></td>
                        </tr>
                        <tr>
                            <td>semester</td>
                            <td><input type="text" name="semester"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" value="Submit" class="submit btn btn-success">
                                <a class="btn btn-danger" href="admin.php">Back</a>
                            </td>
                        </tr>
                    </table>
                </div>
            </form>
        </div>
    </div>




</body>

</html>