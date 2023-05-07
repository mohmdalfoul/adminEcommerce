<?php
require( 'class/Package.class.php' );
$id = $_GET[ 'id' ];
$gen = new General();
$result = $gen->deleteCategory( $id );
$data=array();
$v=array();
if($result=="1"){
    $v=array(
        'result'=>true,
        'error'=>'no error'
    );
    $data[]=$v;
}
else {
    $v=array(
        'result'=>False,
        'error'=>$result
    );
    $data[]=$v;
}
header('Content-Type: application/json');
echo json_encode($data);
?>