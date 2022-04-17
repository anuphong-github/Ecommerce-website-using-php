<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="bootstrap-5.1.3/css/bootstrap.min.css">


  </head>
  <body>
    <?php

     require_once "config/connect.php";
    ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Ecommerce</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Test link
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <li><a class="dropdown-item" href="#"></a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!--Open main!-->
    <main>
      <div class="container">

        <div class="row">
          <!-- open sidebar !-->
          <div class="col-lg-4">
            <div class="">
              <br>
              <h4 >Categories:</h4>
              <br>
              <?php
              $sql_cat = "SELECT `category_id`, `category_name`, `description`, `picture` FROM `tb_category` WHERE 1";
              $query_cat = $connection->query($sql_cat);
               ?>
              <div class="list-group">
                <a href="index.php" class="list-group-item active">Home</a>
                <?php
                while($row=mysqli_fetch_array($query_cat)){
                 ?>
                <a href="index.php?id_category=<?=$row['category_id'];?>?page=1&per-page=17" class="list-group-item"><?=$row['category_name'];?></a>
              <?php } ?>
              </div>
            </div>
          </div>
          <!-- close sidebar !-->

           <?php
           @$id_category = $_GET['id_category'];
           if(@$id_category == ""){
            ?>
          <div class="col-lg-8">
              <div class="row">
                <div class="col-lg-12">
                  <div class="divider-new">
                      <h3 align="center" style="padding-top:10px;">What's new?</h3>
                  </div>
                  <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img src="Imagesfortest/1.jpg" class="d-block w-100" alt="...">
                      </div>
                      <div class="carousel-item">
                        <img src="Imagesfortest/2.jpg" class="d-block w-100" alt="...">
                      </div>
                      <div class="carousel-item">
                        <img src="Imagesfortest/1.jpg" class="d-block w-100" alt="...">
                      </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                    </button>
                  </div>
                </div>
              </div>
                <hr class="extra-margins">

              <div class="row">
                <div class="col-lg-4">
                  <div class="card">
                      <img src="Imagesfortest/1.jpg" class="card-img-top" alt="...">
                      <div class="card-body">
                        <h5 class="card-title">Keyboard</h5>
                        <p class="card-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        </p>

                      </div>
                    </div>
                </div>
                <div class="col-lg-4">
                  <div class="card">
                      <img src="Imagesfortest/2.jpg" class="card-img-top" alt="...">
                      <div class="card-body">
                        <h5 class="card-title">Mouse </h5>
                        <p class="card-text">It is a long established fact that a reader will be distracted
                                              by the readable content of a page when looking at its layout.</p>

                      </div>
                    </div>
                </div>
                <div class="col-lg-4">
                  <div class="card">
                      <img src="Imagesfortest/2.jpg" class="card-img-top" alt="...">
                      <div class="card-body">
                        <h5 class="card-title">Hard disk</h5>
                        <p class="card-text">There are many variations of passages of Lorem Ipsum available,
                                              but the majority have suffered alteration in some form.</p>

                      </div>
                    </div>
                </div>
              </div>
          </div>

        <?php }else{ ?>

          <?php
          $page  = isset($_GET['page']) ? (int)$_GET['page'] : 1 ;

          $perpage = isset($_GET['per-page']) <= 18 ? (int)$_GET['per-page'] : 18;

          $start = ($page>1) ?($page * $perpage) - $perpage : 0 ;

          $queryproduct = "SELECT `product_id`, `name`, `UnitPrice`, `UnitsOnOrder`, `discount`,
                                  `Description`, `address`, `picture_id`, `thumbnail`,
                                  `supplier_id`, `category_id`, `date`, `datecreated`
          FROM `tb_product`
          WHERE `category_id` ='{$id_category}'  ORDER BY `product_id` DESC LIMIT {$start}, 18";

           $result = $connection->query($queryproduct);

           $total = $connection->query("SELECT FOUND_ROWS() as total")->fetch_assoc()['total'];
           $pages = ceil($total/$perpage);


           ?>

           <div class="col-lg-8">
             <hr class="extra-margins">
               <div class="row">
                 <?php

                 if($result->num_rows > 0){
                   $i=0;
                   while($row = $result->fetch_assoc()){
                     $i++;
                      $name = $row['name'];
                      $UnitPrice = $row['UnitPrice'];
                      $UnitsOnOrder = $row['UnitsOnOrder'];
                      $discount = $row['discount'];
                      $description = $row['Description'];
                      $picture_id = $row['picture_id'];
                      $thumbnail = $row['thumbnail'];
                      $supplier_id = $row['supplier_id'];
                      $category_id = $row['category_id'];
                      $date = $row['date'];
                      $datecreated = $row['datecreated'];
                  ?>
                  <?php
                  if($i%3==0){
                ?>

                 <div class="col-lg-4">
                   <div class="card">
                       <img src="images/product/products/<?php echo $thumbnail; ?>" class="card-img-top" alt="...">
                       <div class="card-body">
                         <h5 class="card-title"><?php echo $name; ?></h5>
                         <p class="card-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                         </p>
                       </div>
                     </div>

                 </div>
                 <div class="">
                     <hr class="extra-margins">
                 </div>


               <?php }else{ ?>

                 <div class="col-lg-4">
                   <div class="card">
                       <img src="images/product/products/<?php echo $thumbnail; ?>" class="card-img-top" alt="...">
                       <div class="card-body">
                         <h5 class="card-title"><?php echo $name; ?></h5>
                         <p class="card-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                         </p>
                       </div>
                     </div>
                 </div>
               <?php } ?>
                 <?php
               }
             }
                  ?>
               </div>


               <div class="">
                 <br>
                 <nav aria-label="Page navigation example">
                   <ul class="pagination justify-content-center <?php if($total<17){echo "hide";} ?>">

                     <li class="page-item <?php if($page == 1){echo "disabled";} ?>">
                       <a class="page-link" href="?id_category=<?php echo $id_category; ?>&page=<?php echo $page-1; ?>&per-page=17">Previous</a>
                     </li>

                      <?php for($x=1; $x <= $pages; $x++) : $y = $x ?>

                      <li class="page-item <?php if($page === $x){echo "active";}
                      else if ($page < ($x+1) or $page > ($x +1)){echo "hide";}?>">
                        <a class="page-link" href="?id_category=<?php echo $id_category; ?>&page=<?php echo "$x";?>&per-page=17"><?php echo $x; ?></a>
                      </li>
                    <?php endfor; ?>

                     <li class="page-item <?php if($page == $y)echo "disabled"; ?>">
                       <a class="page-link" href="?id_category=<?php echo $id_category; ?>&page=<?php echo $page+1 ?>&per-page=17">Next</a>
                     </li>

                   </ul>
                 </nav>
               </div>

           </div>
        <?php } ?>
        </div>
      </div>
      <!--Close main!-->
    </main>
     <script src="bootstrap-5.1.3/js/bootstrap.js" charset="utf-8"></script>
  </body>
</html>
