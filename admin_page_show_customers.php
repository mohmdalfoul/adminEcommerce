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
    <link href="assets/css/admin_page_items.css" rel="stylesheet">
    <link href="assets/css/data_table_buttons.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid position-relative bg-white d-flex p-0">
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
                        <h1 class="text-center">All Customers</h1>
                        <hr>
                    </div>
                </div>
                <div class="row g-4 justify-content-center">
                    <div class="col">
                        <?php
             require('class/Package.class.php');
             $customer_dal=new CustomerDAL();
             if(isset($_GET['favorite_customers'])){
                $customers=$customer_dal->getFavoriteCustomers();
             }
             else {
                $customers=$customer_dal->getCustomers();
             }
           ?>
                        <table class="table" id="customers_table_id" class="w-100">
                            <thead>
                                <th>Customer ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>User Name</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <?php
                                  if(isset($_GET['favorite_customers'])){
                                    echo "<th>Balance</th>";
                                  }
                                ?>
                                <th>Actions</th>
                            </thead>
                            <tbody>
                                <?php
                               foreach($customers as $v){
                             ?>
                                <tr>
                                    <td><?php echo $v['id']; ?></td>
                                    <td><?php echo $v['firstname']; ?></td>
                                    <td><?php echo $v['lastname']; ?></td>
                                    <td><?php echo $v['username']; ?></td>
                                    <td><?php echo $v['email']; ?></td>
                                    <td><?php echo $v['phone_number']; ?></td>
                                    <?php
                                      if(isset($_GET['favorite_customers'])){
                                        echo "<td>".$v['balance']."</td>";
                                      }
                                    ?>
                                    <td class="d-flex">
                                        <button class="btn btn-outline-primary"><i class="fa fa-eye"></i></button>
                                        <button class="btn btn-outline-warning"><i class="fa fa-pen"></i></button>
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

    <!-- JavaScript Libraries -->
    <?php
      require("Template/admin_page_js.php");
    ?>
    <script src="assets/js/admin_page_slidebar.js"></script>
    <script src="assets/js/admin_page_customers.js"></script>
    <script src="assets/js/data_table_buttons.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    


</body>

</html>