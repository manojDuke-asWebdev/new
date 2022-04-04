<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- title -->
  <title>Register</title>

  <!-- Bootstrap CORE CSS -->
  <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">

  <!-- Bootstrap JavaScript -->
  <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

  <!-- validator js-->
  <script src="../assets/js/regvalidate.js" defer></script>

  <!-- fonts -->
  <link rel="stylesheet" href="../fonts/font.css" type="text/css">

</head>
<?php

use LDAP\Result;

$erusername = "";
$eremail = "";
if (isset($_POST['submit'])) {
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $email = $_POST['email'];
  $pass = $_POST['pass'];
  $cpass = $_POST['cpass'];
  $uname = $_POST['username'];
  $dob = $_POST['dob'];
  $submit = $_POST['submit'];

  $conn = new mysqli("localhost", "root", "yum567", "test1");
  if ($conn) {
    $stmt = $conn->query("SELECT email,username from user WHERE email = '" . $email . "' AND username = '" . $uname . "'");
    if ($stmt->num_rows > 0) {
      $result = $stmt->fetch_object();
      if ($result->username) {
        $erusername = "username already exist";
      }
      if ($result->email) {
        echo ($result->email);
        $eremail = "email id already exist";
      }
    } else {

      $stmt = $conn->query("INSERT INTO user(firstname,lastname,username,email,password,dob) VALUES('" . $fname . "','" . $lname . "','" . $uname . "','" . $email . "','" . $pass . "','" . $dob . "')");
    }
  }
  if ($conn->connect_error) {
    echo ("<div class='alert alert-danger' role='alert'>
                 Sorry! server issue... Trying to recover
          </div>");
  }
}
?>

<body>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-12 col-xl-12 col-md-8 col-sm-12 col-xs-12">
        <form name="form-reg" action="register.php" onsubmit="return (eval());" method="post" id="form" class="form row border border-secondary p-3 py-4">
          <div class="header text-capitalize display-3 just_peachy">register</div>
          <p class="block fs-6 my-2">Please fill all the info</p>
          <figure class="col-xl-6 col-lg-6 col-md-12">
            <figcaption>First Name</figcaption>
            <input type="text" name="fname" class="form-control" placeholder="farnard" id="fname" />
            <span class="text-danger" id="erfname"></span>
          </figure>
          <figure class="col-xl-6 col-lg-6 col-md-12">
            <figcaption>last Name</figcaption>
            <input type="text" name="lname" class="form-control" placeholder="Ezhfard" id="lname" />
            <span class="text-danger" id="erlname"></span>
          </figure>
          <figure>
            <figcaption>Email</figcaption>
            <input type="text" name="email" class="form-control" placeholder="fornardjohn@gmail.com" id="email" />
            <span class="text-danger" id="eremail"><?php echo "$eremail"; ?></span>
          </figure>
          <figure>
            <figcaption>Password</figcaption>
            <input type="password" name="pass" class="form-control" placeholder="pet name is ********" id="password" />
            <span class="text-danger" id="erpass"></span>
          </figure>
          <figure>
            <figcaption>Confirm Password</figcaption>
            <input type="password" name="cpass" class="form-control" placeholder="pet is ********" id="cpassword" />
            <span class="text-danger" id="ercpass"></span>
          </figure>
          <figure>
            <figcaption>Username</figcaption>
            <input type="text" name="username" class="form-control" placeholder="mynameissecret" id="userid" />
            <span class="text-danger" id="eruserid"><?php echo ($erusername); ?></span>
          </figure>
          <figure>
            <figcaption>Date of Birth</figcaption>
            <input type="date" name="dob" class="form-control" placeholder="5/07/1976" id="dob" />
            <span class="text-danger" id="erdob"></span>
          </figure>
          <figure class="text-center">
            <button name="submit" class="btn btn-primary col-lg-5 col-sm-12 my-2 text-uppercase">register</button>
        </form>
      </div>
    </div>
  </div>
</body>

</html>