<?php
require("class/Package.class.php");
class SignInDAL extends General {
    public function validateLogin( $username, $password ) {
        $conn = $this->getConnection();
        $stmt = $conn->prepare( 'SELECT * FROM users WHERE username=? AND password=?' );
        $stmt->bind_param( 'ss', $username, $password );
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
        if ($user) {
            $user['validate']=true;
            return $user;
        } else {
           $user=array("validate"=>false);
           return $user;
        }
        $stmt->close();
        $conn->close();
    }
}

?>