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
                        <?php
             require('class/Package.class.php');
              $order_dal=new OrderDAL();
              $orders=$order_dal->getOrders();
           ?>
                        <table class="table" id="orders_table_id">
                            <thead>
                                <th>Order ID</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </thead>
                            <tbody>
                                <?php
                               foreach($orders as $v){
                             ?>
                                <tr>
                                    <td><?php echo $v['id']; ?></td>
                                    <td><?php echo $v['date']; ?></td>
                                    <td><?php echo $v['status']; ?></td>
                                    <td>
                                        <button class="btn btn-outline-primary showOrderInfo"><i
                                                class="fa fa-eye"></i></button>
                                        <button data-bs-toggle="modal" data-bs-target="#editOrderModel"
                                            class="btn btn-outline-warning editOrderButton"><i
                                                class="fa fa-pen"></i></button>
                                        <button class="btn btn-outline-danger"><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                                <?php
                               }
                             ?>
                            </tbody>

                        </table>
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

    <div id="editOrderModel" class="modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Order Status</h5>
                    <button class="btn-close close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="edit_order_status_form" method="post">
                        <input type="text" id="order_id" name="id" hidden />
                        <div class="form-outline mb-4">
                            <label for="order_status_id" class="fw-bold">Order Status:</label>
                            <select name="order_status" id="order_status_id" class="form-select form-select-lg">
                                <option value="0">Choose Status</option>
                                <option value="Not Viewed">Not Viewed</option>
                                <option value="Viewed">Viewed</option>
                                <option value="In Preparation">In Preparation</option>
                                <option value="Ready To Delivered">Ready To Delivered</option>
                                <option value="Delivery Is Underway">Delivery Is Underway</option>
                                <option value="Received">Received</option>
                            </select>
                        </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <button class="btn btn-secondary " data-bs-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-warning editOrderModelButton">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript Libraries -->
    <?php
      require("Template/admin_page_js.php");
    ?>
    <script src="assets/js/admin_page_slidebar.js"></script>
    <script src="assets/js/admin_page_orders.js"></script>
</body>

</html>