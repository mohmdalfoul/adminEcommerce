<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DASHMIN - Bootstrap Admin Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <?php
      session_start();
      require("Template/permisions.php");
      require("Template/header.php");
    ?>
    <link href="assets/css/admin_page_dashboard.css" rel="stylesheet">
</head>

<body>
    
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
            <!-- labels start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fab fa-product-hunt fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total Items</p>
                                <h6 class="mb-0">
                                    <?php
                                      $item_dal=new ItemDAL();
                                      $count_items=$item_dal->getTotalItems();
                                      echo $count_items;
                                    ?>
                                </h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-bar fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total Sale</p>
                                <h6 class="mb-0">
                                    <?php
                                    $order_dal=new OrderDAL();
                                    $count_sales=$order_dal->getTotalSales();
                                    echo $count_sales.'$';
                                    ?>
                                </h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fas fa-shopping-cart fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total Orders</p>
                                <h6 class="mb-0">
                                    <?php
                                       $count_orders=$order_dal->getTotalOrders();
                                       echo $count_orders;
                                    ?>
                                </h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fas fa-users fa-2x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total Customers</p>
                                <h6 class="mb-0">
                                    <?php
                                       $customer_dal=new CustomerDAL();
                                       $count_customers=$customer_dal->getTotalCustomers();
                                       echo $count_customers;
                                    ?>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- labels end -->

            <!-- charts start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light text-center rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0">Month Sales</h6>
                                <a href="">Show All</a>
                            </div>
                            <canvas id="line_chart"></canvas>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light text-center rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0">Favorite Customers</h6>
                                <a href="">Show All</a>
                            </div>
                            <canvas id="bar_chart"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-12">
                        <div class="bg-light text-center rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0">Most Sailed Items</h6>
                                <a href="">Show All</a>
                            </div>
                            <div class="bi_chart_box justify-self-center">
                                <canvas id="Bi_chart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- charts end -->


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
    <script src="lib/chart/chart.min.js"></script>
    <script src="assets/js/admin_page_slidebar.js"></script>
    <script src="assets/js/admin_page_dashboard.js"></script>
</body>

</html>