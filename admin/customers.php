<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
      <link rel="stylesheet" href="../bootstrap-5.1.3/css/bootstrap.min.css">
  </head>
  <body>
    <div class="container">
      <h1 align="center">Customer</h1>
      <table border="1" class="table">
        <tr>
          <td>#</td>
          <td>First name</td>
          <td>Middle name</td>
          <td>Last name</td>
          <td>Phone</td>
          <td>Email</td>
          <td>City</td>
          <td>Country</td>
          <td>Postal code</td>
          <td>Address</td>
        </tr>
        <?php
        require_once "../config/connect.php";
        $sql = "SELECT `id_customer`, `fname`, `mname`, `lname`,
                        `phone`, `email`, `password`, `address`, `city`,
                        `country`, `postal_code` FROM `tb_customers` WHERE 1";
        $query = $connection->query($sql);
        $i=0;
        while ($row = mysqli_fetch_array($query)) {
          $fname = $row['fname'];
          $mnane = $row['mname'];
          $lname = $row['lname'];
          $phone = $row['phone'];
          $email = $row['email'];
          $address = $row['address'];
          $city = $row['city'];
          $country = $row['country'];
          $postal_code = $row['postal_code'];
        $i+=1;
         ?>
        <tr>
          <td><?php echo $i; ?></td>
          <td><?=$row['fname'];?></td>
          <td><?=$row['mname'];?></td>
          <td><?=$row['lname'];?></td>
          <td><?=$row['phone'];?></td>
          <td><?=$row['email'];?></td>
          <td><?=$row['city'];?></td>
          <td><?=$row['country'];?></td>
          <td><?=$row['postal_code'];?></td>
          <td><?=$row['address'];?></td>
        </tr>
      <?php } ?>
      </table>
    </div>

  </body>
</html>
