<?php
session_start();
  require('class/Package.class.php');
  $gen=new General();
  $name_english=$_POST['name_english'];
  $name_arabic=$_POST['name_arabic'];

  $sql="INSERT INTO categories(categories.name_english,categories.name_arabic) VALUES ('$name_english','$name_arabic')";
  $result=$gen->executeQuary($sql);
  if($result){
    $_SESSION['add_category']=true;
  }
  else {
    $_SESSION['add_category']=$result;
  }
  echo "<script>window.location.href='admin_page_add_category.php'</script>";
?>