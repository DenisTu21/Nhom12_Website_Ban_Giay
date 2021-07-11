<!DOCTYPE html>
<html lang="en">

<head>


  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="img/favicon.png">

  <title>Login Page 2 | Creative - Bootstrap 3 Responsive Admin Template</title>

  <!-- Bootstrap CSS -->
  <link href="../public/css/bootstrap.min.css" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="../public/css/bootstrap-theme.css" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="../public/css/elegant-icons-style.css" rel="stylesheet" />
  <link href="../public/css/font-awesome.min.css" rel="stylesheet" />
  <!-- Custom styles -->
  <link href="../public/css/style.css" rel="stylesheet">
  <link href="../public/css/style-responsive.css" rel="stylesheet" />

</head>
<body style="background: url('../public/image/back-image.jpeg') no-repeat center center fixed  !important;" class="login-img3-body">
  <div class="container">
    <form style="margin-top:100px;" class="login-form" id="login-form" method="POST" >
      <div class="login-wrap">
        <p class="login-img"><i class="icon_lock_alt"></i></p>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_profile"></i></span>
          <input type="text" class="form-control" name="username" id="username" placeholder="Username" autofocus
            required>
        </div>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_key_alt"></i></span>
          <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
        </div>
        <label class="checkbox">
        <span class="pull-left"> <a href="register.php"> Register </a></span>
          <span class="pull-right"> <a href="forgetpassword.php"> Forgot Password?</a></span>
        </label>
        <button class="btn btn-primary btn-lg btn-block" name="login" type="submit">Login</button>
      </div>
      <div id="noti" class="alert alert-success" style="display:none" ></div>
    </form>
  </div>
</body>

</html>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webbangiay";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST["login"]))
{
        $username = $_POST["username"];
        $password = $_POST["password"];
    
        $sql = "SELECT * FROM usser where username='" .$username ."'";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            if($row["password"] == $password)
                {
                  session_start();
                  session_regenerate_id();
                  $_SESSION['login'] = TRUE;
                  $_SESSION['username'] = $_POST['username'];
                  header("Location: ../user");
                }
        }
        echo "<script>document.getElementById('noti').innerHTML='Mật Khẩu Không Chính Xác, Vui Lòng Kiểm Tra Lại';
        document.getElementById('noti').style.display='block'</script>";
        } else {
        // Tài khoản không tồn tai
        echo "<script>document.getElementById('noti').innerHTML='Tài Khoản Không Tồn Tại, Vui Lòng Kiểm Tra Lại';
        document.getElementById('noti').style.display='block'</script>";
        }
        $conn->close();
}

?>
