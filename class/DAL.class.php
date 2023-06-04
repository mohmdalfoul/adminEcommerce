<?php

class DAL {
    private $host = 'localhost';
    private $user = 'root';
    private $password = '';
    private $db = 'e_commerce2';

    public function getConnection() {
        $conn = new mysqli( $this->host, $this->user, $this->password, $this->db );
        return $conn;
    }

    public function getData( $sql ) {
        $conn = new mysqli( $this->host, $this->user, $this->password, $this->db );
        if ( $conn->connect_error ) {
            die( 'Connection failed: ' . $conn->connect_error );
        }

        $result = $conn->query( $sql );
        if ( $result ) {
            $array = $result->fetch_all( MYSQLI_ASSOC );
            $conn->close();
            return $array;
        } else {
            echo mysqli_error( $conn );
        }
    }

    public function getDataAssoc( $sql ) {
        $conn = new mysqli( $this->host, $this->user, $this->password, $this->db );
        if ( $conn->connect_error ) {
            die( 'Connection failed: ' . $conn->connect_error );
        }

        $result = $conn->query( $sql );
        if ( $result ) {
            $array = $result->fetch_assoc();
            $conn->close();
            return $array;
        } else {
            echo mysqli_error( $conn );
        }
    }

    public function executeQuary( $sql ) {
        $quary_array = explode( ' ', $sql );
        $quary_type = $quary_array[ 0 ];
        $conn = new mysqli( $this->host, $this->user, $this->password, $this->db );
        if ( $conn->connect_error ) {
            die( 'Connection failed: ' . $conn->connect_error );
        }
        if ( $conn->query( $sql ) === TRUE ) {
            return true;
        } else {
            //echo 'Error: ' . $sql . '<br>' . mysqli_error( $conn );
            return  mysqli_error( $conn );
        }
    }
        

       /* if ( $quary_type == 'INSERT' ) {
            if ( $conn->query( $sql ) === TRUE ) {
                echo 'New product added successfully';
                return true;
            } else {
                echo 'Error: ' . $sql . '<br>' . mysqli_error( $conn );
                return  mysqli_error( $conn );
            }
        } else if ( $quary_type == 'DELETE' ) {
            if ( $conn->query( $sql ) === TRUE ) {
                return true;
            } else {
                //echo 'Error deleting product: ' . '<br>' . mysqli_error( $conn );
                return  mysqli_error( $conn );
            }
        } else if ( $quary_type == 'UPDATE' ) {
            if ( $conn->query( $sql ) === TRUE ) {
                return 1;
            } else {
                echo 'Error update product: ' . '<br>' . mysqli_error( $conn );
            }
        } else {
            echo 'Error In Quary Type It Should Be Delete,Insert Or Update';
        }*/
    

}
/* $dal = new DAL();
$sql = 'SELECT * FROM product';
var_dump( $dal->getData( $sql ) );
*/
?>
