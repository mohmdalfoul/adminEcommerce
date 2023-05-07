<?php
//not completed
if(isset($_SESSION['login']['id'])){
  require("class/Package.class.php");
  $page_url=$_SERVER['REQUEST_URI'];
  $page_array=explode('/',$page_url);
  $page_name_with_get=$page_array[2];
  $page_array_with_get=explode('?',$page_name_with_get);
  $page_name=$page_array_with_get[0];
  $id=(int)$_SESSION['login']['id'];
  /*
    get Permisions
  */
  $general=new General();
  $permisions_array=$general->getPermissionArray($id);
  if(count($permisions_array)==0){
    echo "<script>alert('you not have permisions please login again');</script>";
    unset($_SESSION['login']['id']);
    echo "<script>window.location.href='signin.php'</script>";
  } else {
  $have_permision=false;
  $other_page_permision="";
  foreach($permisions_array as $v){
    if($v==$page_name){
      $have_permision=true;
    }
    else {
      $other_page_permision=$permisions_array['page_name'];
    }
  }
  if(!$have_permision){
    echo "<script>window.location.href='$other_page_permision'</script>";
  }
}
}
else {
    echo "<script>alert('pleaze login first');</script>";
    unset($_SESSION['login']['id']);
    echo "<script>window.location.href='signin.php'</script>";
}
?>
