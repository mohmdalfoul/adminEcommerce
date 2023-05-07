<?php
$image_path='http://localhost/adminEcommerce/img/';
$data=array();
if($_GET){
    if(isset($_GET["id"])){
       require("class/Package.class.php");
       $item_dal=new ItemDAL();
       $id=(int)$_GET["id"];
       $item=$item_dal->getItem($id);
       if($item["id"]!=null){
        
        $item_images=$item_dal->getItemImages($id);
        $images=array();
        $i=0;
        /*var_dump($item_images);
        exit;*/
        foreach($item_images as $v){
          $images[$i]=$image_path.$v['image'];
          $i++;
        }
        $data["data"]=array(
         "id"=>(int)$item["id"],
        "name_english"=>$item["name_english"],
        "name_arabic"=>$item["name_arabic"],
        "price"=>(double)$item["price"],
        "description_english"=>$item["description_english"],
        "description_arabic"=>$item["description_arabic"],
        "new_item"=>(int)$item["new_item"],
         "availability"=>(int)$item["availability"],
         "category_name"=>$item["category_name"],
         "images"=>$images
        );
        $data["result"]=true;
       }
       else {
        $data["data"]=array();
        $data["result"]=true;
       }
       
    }
    else {
        $data["result"]=true;
        $data["message"]="missing paremeter";
    }
}
else {
    $data["result"]=false;
    $data["message"]="missing paremeter";
}
print_r(json_encode($data));

?>