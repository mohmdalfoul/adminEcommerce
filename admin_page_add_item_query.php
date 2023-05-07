<?php
 session_start();
 //var_dump($_POST);
if(isset($_POST)){
    require("class/Package.class.php");
    $name_english=$_POST["Item_english_name"];
    $name_arabic=$_POST["Item_arabic_name"];
    $price=(int)$_POST["Item_price"];
    $category=(int)$_POST["Item_category"];
    $description_english=$_POST["Item_english_description"];
    $description_arabic=$_POST["Item_arabic_description"];
    if(isset($_POST["new_item_check"])){
        $new_item=1;
    }
    else {
        $new_item=0;
    }
    if(isset($_POST["availability_check"])){
        $availability=1;
    }
    else {
        $availability=0;
    }
    $item_dal=new ItemDAL();
    $item=new Item($name_english,$name_arabic,$price,$new_item,$availability,$description_english,$description_arabic,$category);
    $result=$item_dal->addItem($item);
   
    if($result==1){
        $id=(int)$item_dal->getMaxItemId();
              for($i=0;$i<count($_FILES['Item_images']['name']);$i++){     
                 $filename=$_FILES['Item_images']['name'][$i];
                 $tempname=$_FILES['Item_images']['tmp_name'][$i];
                 $counter=0;
                 $namearray=explode(".",$filename);
                 while(file_exists("img/".$filename)){
                    $counter++;
                    $filename=$namearray[0].strval($counter).'.'.$namearray[1];
                 }
                 move_uploaded_file($tempname,"img/".$filename);
                 $result_image=$item_dal->addItemImage($id,$filename);
                 if($result_image==1){
                    $_SESSION["add_item_validate"]="true";
                 }
                 else {
                    $_SESSION["add_item_validate"]="error insert image";
                 }
                }
        
    }
    else {
        $_SESSION["add_item_validate"]=$result;
    }
    echo '<script>window.location.href="admin_page_add_item.php"</script>';
 }

?>