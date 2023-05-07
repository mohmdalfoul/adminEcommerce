<?php
 require("class/Package.class.php");
 $page=(int) $_GET['page'];
 if($page==1){
    $limit=4;
    $offset=($page-1)*4;
 }
 else {
    $limit=2;
    $offset=($page-1)*2;
 }
 

 $item_dal=new ItemDAL();
 $items=$item_dal->getLimitItems($limit,$offset);
 $data = array();
foreach($items as $v) {
    $v['actions']=$v['id'];
    $data['data'][] = $v;
}

 header('Content-Type: application/json');
echo json_encode($data);


?>