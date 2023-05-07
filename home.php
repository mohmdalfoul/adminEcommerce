<?php
  require("class/Package.class.php");
  $image_path='http://localhost/adminEcommerce/img/';
  $data=array();

  //this is top banner
  $gen=new General();
  $topBaner=$gen->getTopBanner();
  foreach($topBaner as $v){
    $data['topBaner'][]=array(
      "id"=>(int)$v["id"],
      "image"=>$image_path."".$v["image"],
      "item_id"=>(int)$v["item_id"]
    );
  }

  //categories
  $categories=$gen->getCategories();
  foreach($categories as $v){
     $data["categories"][]=array(
        "id"=>(int)$v["id"],
        "name_english"=>$v["name_english"],
        "name_arabic"=>$v["name_arabic"],
        "image"=>$image_path.$v["image"]
     );
  }

  $item_dal=new ItemDAL();
  //new Arrival
  /*
  items.id,
        items.name_english,
        items.name_arabic,
        items.price,
        items.description_english,
        items.description_arabic
  */
  $newArrival=$item_dal->getNewArrival();
  foreach($newArrival as $v){
    $data["newArrival"][]=array(
       "id"=>(int)$v["id"],
       "name_english"=>$v["name_english"],
       "name_arabic"=>$v["name_arabic"],
       "price"=>(double)$v["price"],
       "description_english"=>$v["description_english"]
    );
  }
  
  //best sailer items
  
  $bestSailer=$item_dal->getMostSailedItems();
  foreach($bestSailer as $v){
    $data["bestSailer"][]=array(
        "id"=>(int)$v["id"],
        "name_english"=>$v["name_english"],
        "price"=>(double)$v["price"],
        "quantity"=>(int)$v["quantity"]
    );
  }

    /*
       items.id,
        items.name_english,
        items.price,
        SUM( order_items.quantity ) AS 'quantity'
    */ 
  
  print_r(json_encode($data));

?>