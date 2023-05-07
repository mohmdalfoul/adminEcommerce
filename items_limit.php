<?php
 require("class/Package.class.php");
 $page=(int) $_GET['page'];
 $limit=(int) $_GET['limit'];
 $offset=($page-1)*2;

 $item_dal=new ItemDAL();

$data=$item_dal->getLimitItems($limit,$offset); 

 header('Content-Type: application/json');
echo json_encode($data);


?>