<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DASHMIN - Bootstrap Admin Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <?php
      require("Template/header.php");
    ?>
</head>

<body>
    <?php
      require("class/Package.class.php");
      $id=(int)$_GET['id'];
      $order_dal=new OrderDAL();
      $order_customer=$order_dal->getOrderCustomer($id);
      $order_items=$order_dal->getOrderItems($id);
    ?>
    <div class="container-fluid-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <?php
          require("Template/spinner.php");
        ?>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <?php
         require("Template/admin_page_slide_bar.php");
       ?>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <?php
              require("Template/admin_page_navbar.php");
            ?>
            <!-- Navbar End -->


            <!-- Blank Start -->
            <div class="container-fluid pt-4 px-4 h-100">
                <div class="d-flex row g-4 justify-content-center">
                    <div class="col-7">
                        <h1 class="text-center">All Orders</h1>
                        <hr>
                    </div>
                </div>
                <div class="row g-4 justify-content-center">
                    <div class="col">
                        <div class="container-fluid">
                            <div class="d-flex row justify-content-center">
                                <div class="col">
                                    <h1 class="text-center fw-bold">All Order Information</h1>
                                    <hr>
                                </div>
                            </div>
                            <div class="container mt-3">
                                <div class="d-flex row justify-content-center">
                                    <div class="col">
                                        <h3 class="text-center">Order Client Information</h3>
                                        <hr>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <table id="" class="table">
                                            <thead>
                                                <th>Order ID</th>
                                                <th>Order Date</th>
                                                <th>Order Status</th>
                                                <th>Client ID</th>
                                                <th>Client First Name</th>
                                                <th>Client Last Name</th>
                                                <th>Client Username</th>
                                                <th>Client Phone</th>
                                                <th>Client Address</th>
                                                <th>Order Address</th>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="pt-2 pb-4"><?php echo $_GET['id'];  ?></td>
                                                    <td class="pt-2 pb-4"><?php echo $order_customer['date']; ?></td> 
                                                    <td class="pt-2 pb-4"><?php echo $order_customer['status']; ?></td>
                                                    <td class="pt-2 pb-4"><?php echo $order_customer['customer_id']; ?></td>
                                                    <td class="pt-2 pb-4"><?php echo $order_customer['firstname']; ?></td>
                                                    <td class="pt-2 pb-4"><?php echo $order_customer['lastname']; ?></td>
                                                    <td class="pt-2 pb-4"><?php echo $order_customer['username']; ?></td>
                                                    <td class="pt-2 pb-4"><?php echo $order_customer['phone_number']; ?></td>
                                                    <td class="pt-2 pb-4"></td>
                                                    <td class="pt-2 pb-4"><?php echo $order_customer['address']; ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="container mt-2">
                                <div class="d-flex row justify-content-center">
                                    <div class="col">
                                        <h3 class="text-center">Order Product Information</h3>
                                        <hr>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <table id="" class="table">
                                            <thead>
                                                <th>Product ID</th>
                                                <th>Product Name</th>
                                                <th>Product Quantity</th>
                                                <th>Product Piece Price</th>
                                                <th>Product Full Price</th>
                                                <th>Product Category</th>
                                            </thead>
                                            <tbody>
                                                <?php
                                                 $full_price=0;
                                                  foreach($order_items as $v){
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $v['id']; ?></td>
                                                        <td><?php echo $v['name_english']; ?></td>
                                                        <td><?php echo $v['quantity']; ?></td>
                                                        <td><?php echo $v['price']; ?></td>
                                                        <td><?php echo $v['price']*$v['quantity']; ?></td>
                                                        <td><?php echo $v['category_name_english']; ?></td>
                                                    </tr>
                                                 <?php 
                                                     $full_price+=$v['price']*$v['quantity'];
                                                  }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <h4 class="text-end">Full Price:<?php echo $full_price."$"; ?></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Blank End -->


            <!-- Footer Start -->
            <?php
               require("Template/footer.php");
             ?>

            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <?php
      require("Template/admin_page_js.php");
    ?>
    <script src="assets/js/admin_page_slidebar.js"></script>
    <script src="assets/js/admin_page_orders.js"></script>
</body>

</html>