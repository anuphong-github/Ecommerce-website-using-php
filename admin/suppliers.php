<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
      <link rel="stylesheet" href="../bootstrap-5.1.3/css/bootstrap.min.css">
  </head>
  <body>
    <div class="container">
      <h1 align="center">Supplier</h1>
      <table border="1" class="table">
        <tr>
          <td>#</td>
          <td>supplier title</td>
          <td>supplier First name</td>
          <td>supplier Last name</td>
        </tr>
        <?php
        require_once "../config/connect.php";
        $sql = "SELECT `supplier_id`, `supplierTitle`, `supplierFname`, `supplierLname` FROM `tb_supplier` WHERE 1";
        $query = $connection->query($sql);
        $i=0;
        while ($row = mysqli_fetch_array($query)) {
        $i+=1;
         ?>
        <tr>
          <td><?php echo $i; ?></td>
          <td><?=$row['supplierTitle'];?></td>
          <td><?=$row['supplierFname'];?></td>
          <td><?=$row['supplierLname'];?></td>
        </tr>
      <?php } ?>
      </table>
    </div>

  </body>
</html>
