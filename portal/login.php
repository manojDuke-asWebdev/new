<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">

 <!-- fonts -->
 <link rel="stylesheet" href="../fonts/font.css" type="text/css" />

 <!-- validate -->
 <script src="../assets/js/loginvalidate.js"></script>
 
 <!-- Bootstrap CSS -->
 <link href="../node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
 
 <!-- Bootstrap JS -->
 <script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>

 <?php
 $errorlog = "";
 if(isset($_POST['login'])){
   $email = $_POST["email"];
   $pass = $_POST["pass"];
   $conn = new mysqli("localhost", "root", "yum567", "test1");
   if($conn) {
     $sql = "SELECT * FROM user WHERE email= '".$email."' AND password= '".$pass."' limit 1";
     if($result = $conn->query($sql)){ 
      if($result->num_rows==1){
        $data = $result->fetch_assoc();
        session_start();
        $_SESSION['id']=$data['id'];
        header("Location:../app.php");
      }
      else{ 
        $errorlog = "Please check your email and password";
      }
    }
    $conn->close();
  }
  else{
    echo"error";
  }
}
?>

<!-- Title -->
<title>login</title>

<!-- Login Form -->
</head>
<body>
 <div class="container">
  <div class="row justify-content-center">
   <form action="./porte.php" name="login" onsubmit="return (validate())" method="post" class="form col-lg-12 col-xl-12 border border-secondary p-3 py-4 center-block">
    <div class="hearder text-center display-3 just_peachy">login</div>

      <!-- email input -->
     <figure>
      <figcaption class="text-capitalize m-1 font-poppin">email</figcaption>
      <input type="email" name="email" class="form-control col-6 m-1" placeholder="johny@examly.com" >
      <span class="text-danger" id="eremail"><?php echo($errorlog);?></span>
     </figure>
     <figure>

     <!-- password input -->
    <figcaption class="text-capitalize m-1">password</figcaption>
      <input type="password" name = "pass" class="form-control col-6 m-1" placeholder="my nic?" >
      <span class="text-danger" id="erpass"><?php echo($errorlog);?></span>
    </figure>

      <!-- button -->
     <figure class="row justify-content-center">
      <button name=login class="col-lg-3 col-lx-3 col-md-4 col-sm-4 col-xl-4 text-uppercase m-2 btn btn-primary">sign in</button>
     </figure>
   </form>
  </div>
 </div>
</body>
</html>