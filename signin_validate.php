<html>
<head>
    <?php
      require("Template/header.php");
    ?>
</head>
<body>
<script src="http://localhost/adminEcommerce/assets/js/bootstrap.js"></script>
<script src="assets/js/jQuery.js"></script>
<script src="assets/js/sweet_alert.js"></script>
    <?php
session_start();
require("class/SignInDAL.class.php");
$username=$_POST['username'];
$password=$_POST['password'];
$dal=new SignInDAL();
$user=$dal->validateLogin($username, $password);

if($user['validate']){
    $_SESSION['login']['id']=$user['id'];
    echo '<script>swal("Welcome", "Login Success", "success");</script>';
    echo "<script>window.location.href='admin_page_dashbord.php'</script>";
   }
   else {
     $_SESSION['validate_login']="false";
     echo '<script>swal("Error!", "Invalid Login", "danger");</script>';
     echo "<script>window.location.href='signin.php'</script>";
   }
?>
</body>
  
</html>