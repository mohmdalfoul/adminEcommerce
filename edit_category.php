<?php
  header("Access-Control-Allow-origin: *");
  header("Content-Type: application/json; charset=UTF-8");
  header("Access-Control-Allow-Methods: *");
  header("Access-Control-Max-Age: 3600");
  header("Access-control-Allow-Headers: *");
  if($_POST){
    require("class/Package.class.php");
    $gen=new General();
    $id=(int)$_POST['id'];
    $name_english=$_POST['categoty_english_name'];
    $name_arabic=$_POST['categoty_arabic_name'];
    $sql="UPDATE categories SET categories.name_english='$name_english',categories.name_arabic='$name_arabic' WHERE categories.id=$id";
    $result=$gen->executeQuary($sql);
    if($result=="1"){
        $data=array(
            "result"=>true,
            "error"=>"no error"
        );
    }
    else {
        $data=array(
          "result"=>false,
          "error"=>"not retrieve data"
        );
    }
  }
  else {
    $data=array(
        "result"=>false,
        "error"=>"not retrieve data"
    );
  }
  
  print_r(json_encode($data));
  
?>