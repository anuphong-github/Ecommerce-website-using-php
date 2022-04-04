<?php
if(isset($_POST['submit'])){



  function GetLastID(){
    $connection = $GLOBALS['connection'];
    $s = $connection->prepare('SELECT * FROM tb_product');
    $s->execute();

    $result = $s->get_result();
    if($result->num_rows > 0){
      while($row = $result->fetch_assoc()){
          $last = $row['product'];
      }
        return $last;
      }else{
        return "0";
      }
    }

  $product_id = GetLastID() + 1;

  $pathpic1 = "../images/product/p1/";
  $filepic1 = $pathpic1 . basename($_FILES["p1"]["name"]);
  $typepic1 = pathinfo($filepic1,PATHINFO_EXTENSION);
  $uploadStatus1 = 1;

  $check1 = getimagesize($_FILES["p1"]["tmp_name"]);

  if($check1 !== false){
    $uploadStatus1 = 1;
  }else {
    echo "File is not an image";
    $uploadStatus1 = 0;
  }

  if($_FILES['p1']['size'] > 50000000){
    echo "Sorry, your picture is too large";
    $uploadStatus1 = 0;
  }

  if($typepic1 != "png" && $typepic1 != "jpeg" && $typepic1 != "jpg"){
    echo "Sorry, only JPEG, JPG, PNG pictures are allowed";
    $uploadStatus1 = 0;
  }else {
    $uploadStatus1 = 1;
  }

  if($uploadStatus1 == 0){
    echo "Sorry, your file was not uploaded";
  }else{
    if(move_uploaded_file($_FILES['p1']['tmp_name'],$filepic1)){
    }else{
      echo "Sorry, there was an error uploading your picture";
    }
  }

  $img1 = $_FILES['p1']['name'];
  $img_pathpic1 = "../images/product/p1/".$_FILES['p1']['name'];

  $picture1 = $_FILES['p1']['name'];
  $sqlpic = "INSERT INTO `tb_pictures`(`picture_id`, `picture`, `product_id`)
            VALUES (null,'$picture1','$product_id')";
  mysqli_query($connection,$sqlpic);

  $pathpic2 = "../images/product/p2/";
  $filepic2 = $pathpic2 . basename($_FILES["p2"]["name"]);
  $typepic2 = pathinfo($filepic2,PATHINFO_EXTENSION);
  $uploadStatus = 1;

  $check2 = getimagesize($_FILES['p2']['tmp_name']);
  if($check2 !== false){
    $uploadStatus2 = 1;
  }else {
    echo "File is not an image";
    $uploadStatus2 = 0;
  }

  if($_FILES['p2']['size']>50000000){
    echo "Sorry, your picture is too large";
    $uploadStatus2 = 0;
  }

  if($typepic2 != "png" && $typepic2 != "jpeg" && $typepic2 != "jpg"){
    echo "Sorry, only JPEG, JPG, PNG pictures are allowed";
  }else{
    $uploadStatus2 = 1 ;
  }

  if($uploadStatus2 ==0){
    echo "Sorry, your file was not uploaded";
  }else{
    if (move_uploaded_file($_FILES["p2"]["tmp_name"], $filepic2)) {
    } else {
    echo "Sorry, there was an error uploading your picture";
    }
  }

  $img2 = $_FILES['p2']['name'];
  $img_pathpic1 = "../images/product/p2/".$_FILES['p2']['name'];

  $picture2 = $_FILES['p2']['name'];
  $sqlpic = "INSERT INTO `tb_pictures`(`picture_id`, `picture`, `product_id`)
            VALUES (null,'$picture2','$product_id')";
  mysqli_query($connection,$sqlpic);


  $pathpic3 = "../images/product/p3/";
  $filepic3 = $pathpic3 . basename($_FILES['p3']['name']);
  $typepic3 = pathinfo($filepic3,PATHINFO_EXTENSION);
  $uploadStatus3 = 1;

  $check3 = getimagesize($_FILES["p3"]["tmp_name"]);
  if($check3 !== false){
    $uploadStatus3 = 1;
  }else {
    echo "File is not an image";
    $uploadStatus3 =  0 ;
  }
  if($_FILES['p3']['size'] > 50000000){
    echo "Sorry, your picture is too large";
  }
  if($typepic3  != "png" && $typepic3 != "jpeg" && $typepic3 !="jpg"){
      echo "Sorry, only JPEG, JPG, PNG pictures are allowed";
  }else {
    $uploadStatus3 = 1;
  }
  if($uploadStatus3 == 0){
    echo "Sorry, your file was not uploaded";
  }else{
    if(move_uploaded_file($_FILES["p3"]["tmp_name"],$filepic3)){

    }else{
    echo "Sorry, there was an error uploading your picture";
    }
  }
  $img3 = $_FILES['p3']['name'];
  $img_pathpic3 = "../images/product/p3/".$_FILES['p3']['name'];

  $picture3 = $_FILES['p3']['name'];
  $sqlpic = "INSERT INTO `tb_pictures`(`picture_id`, `picture`, `product_id`)
            VALUES (null,'$picture3','$product_id')";
  mysqli_query($connection,$sqlpic);



  $name = $_POST['name'];
  $unitPrice = $_POST['unitPrice'];
  $discount = $_POST['discount'];
  $address = $_POST['address'];
  $supplier = $_POST['supplier'];
  $category = $_POST['category'];
  $desc = $_POST['desc'];
  $thumbnail=$_FILES["thumbnail"]["name"];

  $picture_id = "0";
  $supplier_id = "0";
  $category_id = "0";
  $date = Date('Y-m-d');
  $datecreated = Date('Y-m-d H:i:s');



  $path = "../images/product/thumbnail/";
  $file = $path . basename($_FILES["thumbnail"]["name"]);
  $uploadStatus = 1;
  $type = pathinfo($file,PATHINFO_EXTENSION);
  $check = getimagesize($_FILES["thumbnail"]["tmp_name"]);

  if($check !== false){
    $uploadStatus = 1;
  }else{
    echo "File is not an image";
    $uploadStatus = 0;
  }

  if($_FILES['thumbnail']['size'] > 50000000){
    echo "Sorry, your picture is too large";
  }

  if($type != "png" && $type !="jpeg" && $type != "jpg"){
    echo "Sorry, only JPEG, JPG, PNG pictures are allowed";
    $uploadStatus = 0;
  }else{
    $uploadStatus = 1;
  }
  if($uploadStatus == 0){
      echo "string";
  }else{
    if(move_uploaded_file($_FILES['thumbnail']['tmp_name'],$file)){
    }else {
      echo "Sorry, there was an error uploading your picture";
    }
  }

  $sqladdproduct = "INSERT INTO `tb_product`(`product_id`, `name`, `UnitPrice`,
                                  `UnitsOnOrder`, `discount`, `Description`,
                                  `address`, `picture_id`, `thumbnail`,
                                  `supplier_id`, `category_id`, `date`,
                                  `datecreated`)
          VALUES (NULL,'$name','$unitPrice',
                  '0','$discount','$desc',
                  '$address','$picture_id','$thumbnail',
                  '$supplier_id','$category_id','$date',
                  '$datecreated')";
    $query = $connection->query($sqladdproduct);

      if($query){
        echo "สำเร็จ";
      }else{
        echo "ไม่สำเร็จ";
      }

}

 ?>
