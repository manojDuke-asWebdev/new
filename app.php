<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>blog</title>
 <!-- bootstrap css -->
 <link type="text/css" href="./node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <!-- bootstrap javascript -->
 <script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- fonts -->
 <link rel="stylesheet" type="text/css" href="fonts/font.css"/>

</head>
<body>
  <?php
  session_start();
   $id = $_SESSION['id']; 
   $conn = new mysqli("localhost", "root", "yum567","test1");
   if($conn){
    if($result = $conn->query("SELECT * FROM user WHERE id ='".$id."'")){ 
      $data = $result->fetch_object();
    }
   }
   else{ echo"connection falied";}
  ?>
  <div class="container">
   <div class="border   just_peachy text-capitalize text-center"><p class="h1">Hi <?php echo $data->firstname;?></p></div>
   <span class="header p-2 h2">
     your info   
    </span>
     <div class="table-responsive">
       <table class="table text-capitalize text-justify table-striped">
         <tr><td>your name</td><td><?php echo($data->firstname." ".$data->lastname);?></td></tr>
         <tr><td>your email</td><td><?php echo($data->email);?></td></tr>
         <tr><td>your dob</td><td><?php echo($data->dob);?></td></tr>
         <tr><td>your username</td><td><?php echo($data->username);?></td></tr>
       </table>
     </div>

  </div>
</body>
</html>