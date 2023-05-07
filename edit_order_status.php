<?php
  header("Access-Control-Allow-origin: *");
  header("Content-Type: application/json; charset=UTF-8");
  header("Access-Control-Allow-Methods: *");
  header("Access-Control-Max-Age: 3600");
  header("Access-control-Allow-Headers: *");

 if($_POST){
    if(isset($_POST['order_status'])){
        require("class/Package.class.php");
        $order_dal=new OrderDAL();
        $order_status=$_POST['order_status'];
        $id=(int)$_POST['id'];
        $result=$order_dal->editOrderStatus($id,$order_status);
        if($result=="1"){
            $data=array(
                "result"=>true,
                "error"=>"no error"
            );
        }
        else {
            $data=array(
                "result"=>false,
                "error"=>$result
            );
        }
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