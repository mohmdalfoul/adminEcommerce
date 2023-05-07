<?php
 require("class/Package.class.php");
 $customer_dal=new CustomerDAL();
 $data=$customer_dal->getFavoriteCustomers();

header('Content-Type: application/json');
echo json_encode($data);
?>