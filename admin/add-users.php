<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
        <link rel="stylesheet" href="../bootstrap-5.1.3/css/bootstrap.min.css">
  </head>
  <body>

    <?php
    include "../config/connect.php";
      if(isset($_POST['submit'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password2 = $_POST['password2'];


        if($password2 != $password){
          echo "<script>alert('ไม่สำเร็จ');</script>";
        }else{
          $password = password_hash( $password, PASSWORD_DEFAULT );

          $sql = "INSERT INTO `tb_admin`(`id`, `email`, `password`, `group`)
           VALUES (null,'$email','$password','1')";
          $query = $connection->query($sql);

          if($query){
                  echo "<script>alert('สำเร็จ');</script>";
          }else {
                  echo "<script>alert('ไม่สำเร็จ');</script>";
          }
        }
      }
     ?>

     <div class="container">
       <h1 align="center">Add users</h1>
       <form class="" action="" method="post">
       <div class="form-group">
         <label for="">Email</label>
         <input type="text" name="email" id="email" class="form-control" value="" required>
       </div>
       <div class="form-group">
         <label for="">Password</label>
         <input type="password" name="password" id="password" class="form-control" value="" required>
       </div>
       <div class="form-group mb-2">
         <label for="">Confirm Password</label>
         <input type="password" name="password2" id="passwords2" class="form-control" value="" required>
       </div>
       <div class="form-group" align="center">
         <button type="submit" name="submit" class="btn btn-primary">Submit</button>
       </div>
     </form>
     </div>
  </body>
</html>
