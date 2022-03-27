<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>signup</title>
    <link rel="stylesheet" href="bootstrap-5.1.3/css/bootstrap.min.css">
  </head>
  <body>
    <?php
    include "config/connect.php";
    if(isset($_POST['submit'])){
      $password = $_POST['password'];
      $password2 = $_POST['password2'];
      $fname = $_POST['fname'];
      $mname =$_POST['mname'];
      $lname = $_POST['lname'];
      $phone = $_POST['phone'];
      $email = $_POST['email'];
      $address = $_POST['address'];
      $city = $_POST['city'];
      $country = $_POST['country'];
      $pc = $_POST['pc'];
      if($password2 != $password){
        echo "<script>alert('ไม่สำเร็จ');</script>";
      }else{
        $password = password_hash( $password, PASSWORD_DEFAULT );
      $sql ="INSERT INTO `tb_customers`(`id_customer`, `fname`, `mname`, `lname`, `phone`, `email`,`password` ,`address`, `city`, `country`, `postal_code`)
              VALUES (null,'$fname','$mname','$lname','$phone','$email','$password','$address','$city','$country','pc')";
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
      <h1 align="center">Signup</h1>
      <form class="" action="" method="post">
      <div class="form-control">
        <div class="form-group">
          <label for="">email</label>
          <input type="text" name="email" id="email" class="form-control"  value="">
        </div>
        <div class="form-group">
          <label for="">Password</label>
          <input type="password" name="password" id="password" class="form-control"  value="">
        </div>
        <div class="form-group">
          <label for="">Confirm password</label>
          <input type="password" name="password2" id="password2" class="form-control"  value="">
        </div>
        <div class="form-group">
          <label for="">First name</label>
          <input type="text" name="fname" id="fname" class="form-control" value="">
        </div>
        <div class="form-group">
          <label for="">Middle name</label>
          <input type="text" name="mname" id="mname" class="form-control"  value="">
        </div>
        <div class="form-group">
          <label for="">Last name</label>
          <input type="text" name="lname" id="lname" class="form-control"  value="">
        </div>
        <div class="form-group">
          <label for="">phone</label>
          <input type="text" name="phone"  id="phone" class="form-control"  value="">
        </div>
        <div class="form-group">
          <label for="">Address</label>
          <textarea  name="address" id="address" class="form-control" rows="8" cols="80"></textarea>
        </div>
        <div class="form-group">
          <label for="">City</label>
          <input type="text" name="city" id="city" class="form-control"  value="">
        </div>
        <div class="form-group">
          <label for="">Country</label>
          <input type="text" name="country" id="country" class="form-control"  value="">
        </div>
        <div class="form-group mb-2">
          <label for="">Postal Code</label>
          <input type="text" name="pc" id="pc" class="form-control"  value="">
        </div>
        <div class="form-group" align="center">
          <button type="submit" class="btn btn-primary" name="submit">signup</button>
        </div>
      </form>

    </div>
    </div>
  </body>
</html>
