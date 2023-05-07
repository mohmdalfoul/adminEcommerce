<?php
  require("class/Package.class.php");
  $item_dal=new ItemDAL();
  $data=$item_dal->getMostSailedItems();

  header('Content-Type: application/json');
echo json_encode($data);
?>