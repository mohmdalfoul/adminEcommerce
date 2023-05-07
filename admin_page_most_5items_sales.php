<?php
 require("class/Package.class.php");
 $items=new OrderDAL();
 $data=$items->getMonthOrdersProfit();

header('Content-Type: application/json');
echo json_encode($data);

?>