<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <!-- title -->
 <title>ling</title>
 <!-- bootstrap -->
 <!-- css -->
 <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css" type="text/css" />
 <!-- javascript -->
 <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>

 <!-- font -->
 <link rel="stylesheet" href="../fonts/font.css" type="text/css" />
</head>

<body>
 <div class="container">
  <div class="row justify-content-center">
   <div class="col-7">
    <ul class="nav nav-pills nav-fill">
     <li class="nav-item p-2 text-uppercase"><a href="#login" aria-current="page" data-bs-toggle="tab" data-bs-target="#login" class="nav-link active p-2" >login</a></li>
     <li class="nav-item p-2 text-uppercase"><a href="#register" data-bs-toggle="tab" data-bs-target="#register" class="nav-link p-2">register</a></li>
    </ul>
    <div class="tab-content">
     <div class="tab-pane fade show active" id="login">
      <?php
      include './login.php';
      ?>
     </div>
     <div class="tab-pane fade" id="register">
     <?php
      include './register.php';
      ?>
     </div>
    </div>
   </div>
  </div>

 </div>

</body>

</html>