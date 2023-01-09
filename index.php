<?php
session_start();

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Web Project UAS</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
    crossorigin="anonymous"></script>
  <style>
    body {
      height: 100%;
      background-color: #073b4c
    }

    form {
      padding: 10px;
      font-size: 14px;
      margin-top: 30px;
    }

    .global-container {
      height: 100%;
      display: flex;
      background-color: #073b4c;
    }
  </style>
</head>


<body>
  <div class="global-container justify-content-center">
    <div class="card justify-content-center rounded-5 my-5" style="width: 50rem; background-color: #f0f0f0;">
      <div class="card-body p-3">
        <h1 class="card-title text-center text-capitalize fw-bolder mb-2" style="font-size: 42pt">Login</h1>
        <div class="card-text p-5" style="background-color: white; color: #073b4c;">

          <?php
          require('conn.php');
          $rand = rand(9999, 1000);
          if (isset($_REQUEST['login'])) {
            $username = $_REQUEST['username'];
            $pwd = $_REQUEST['pwd'];
            $captcha = $_REQUEST['captcha'];
            $captcharandom = $_REQUEST['captcha-rand'];
            if ($captcha != $captcharandom) {
              ?>
              <div class="col-lg-4 text-center">
                <h5 style="color: red;">Invalid captcha!! </h5>
              </div>
              <?php
            } else {
              $select_query = mysqli_query($connection, "select * from admin where username='$username' and password='$pwd'");
              $result = mysqli_num_rows($select_query);
              if ($result == 1) {
                $_SESSION["Login"] = true;
                header("Location: admin.php");
                exit;
              } else {
                ?>
                <div class="col-lg-6 text-center">
                  <h5 style="color: red;">Invalid Username & Password!! </h5>
                </div>
                <?php
              }
            }
          }
          ?>

          <form method="post">
            <div class="username form-group">
              <label>Username</label>
              <input class="form-control form-control-sm" type="text" id="username" name="username">
            </div>
            <div class="password form-group my-3">
              <label>Password</label>
              <input class="form-control form-control-sm" type="password" id="pwd" name="pwd">
            </div>
            <div class="captcha form-group my-3">
              <label for="exampleInputPassword1">Captcha</label>
              <input class="form-control form-control-sm" type="text" id="captcha" name="captcha">
              <input type="hidden" name="captcha-rand" value="<?php echo $rand; ?>">
            </div>
            <div class="captcha my-3 justify-content-center">
              <label for="exampleInputPassword1">Captcha Code</label>
              <div class="captcha border justify-content-center">
                <?php echo $rand; ?>
              </div>
            </div>
            <button type="submit" class="submit btn btn-success my-1 form-control form-control-sm" name="login"
              id="login">Submit</button>

            <a class="btn btn-warning mt-3 form-control form-control-sm" href="guest.php" style="color: white;">Login as
              Guest</a>

          </form>
        </div>
      </div>
    </div>
  </div>
</body>

</html>