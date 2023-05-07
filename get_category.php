<?php
/*header( 'Access-Control-Allow-origin: *' );
header( 'Content-Type: application/json; charset=UTF-8' );
header( 'Access-Control-Allow-Methods: *' );
header( 'Access-Control-Max-Age: 3600' );
header( 'Access-control-Allow-Headers: *' );

header( 'HTTP_TOKEN: 10' );
*/
require( 'class/Package.class.php' );
/*$dal = new DAL();
$_SERVER[ 'HTTP_TOKEN' ] = $dal->GeneratenewToken( 2, 'moh@gmail.com' );*/
//echo $_SERVER[ 'HTTP_TOKEN' ];

//$token = $dal->gettoken();
if ( true ) {
    //echo $dal->dencryptToken( $token );
    //echo $_SERVER[ 'HTTP_TOKEN' ];
    if ( isset( $_GET[ 'id' ] ) ) {
        $id = ( int ) $_GET[ 'id' ];
        $gen = new General();
        $category = $gen->getCategory( $id );
        echo json_encode( $category );
    }
}

//echo $_SERVER[ 'HTTP_TOKEN' ];

?>