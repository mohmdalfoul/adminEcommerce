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
</head>

<body>
    <?php
      require("class/Package.class.php");
      if(isset($_GET['id'])){
        $id=$_GET['id'];
        $item_dal=new ItemDAL();
        $item_info=$item_dal->getItem($id);
        $item_order_number=$item_dal->getNumberOfOrdersItem($id);
        $full_quantity=$item_dal->getFullQuantity($id);
        $sold_quantity=$item_dal->getSoldQuantity($id);
      }
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
                        <h1 class="text-center">Item Information</h1>
                        <hr>
                    </div>
                </div>

                <div class="row g-4 justify-content-center">
                    <div class="col">
                        <table class="table table-striped">
                            <tr>
                                <th class="w-25 pb-4">Item ID:</th>
                                <td><?php echo $item_info['id']; ?></td>
                            </tr>
                            <tr>
                                <th class="w-25 pb-4">Item Name:</th>
                                <td><?php echo $item_info['name_english']; ?></td>
                            </tr>
                            <tr>
                                <th class="w-25 pb-4">Item Price:</th>
                                <td><?php echo $item_info['price']; ?></td>
                            </tr>
                            <tr>
                                <th class="w-25 pb-4">Item Availability::</th>
                                <td>
                                    <?php 
                                  if($item_info['availability']==1){
                                    ?>
                                    <div class="available_item_true">
                                        True
                                    </div>
                                    <?php
                                  }
                                  else {
                                    ?>
                                    <div class="available_item_false">
                                        False
                                    </div>
                                    <?php
                                  }
                                ?>
                                </td>
                            </tr>
                            <tr>
                                <th class="w-25 pb-4">New Item:</th>
                                <td>
                                    <?php 
                                  if($item_info['new_item']==1){
                                    ?>
                                    <div class="new_item_true">
                                        True
                                    </div>
                                    <?php
                                  }
                                  else {
                                    ?>
                                    <div class="new_item_false">
                                        False
                                    </div>
                                    <?php
                                  }
                                ?>
                            </tr>
                            <tr>
                                <th class="w-25 pb-4">Item Category:</th>
                                <td><?php echo $item_info['category_name_english']; ?></td>
                            </tr>
                            <tr>
                                <th class="w-25 pb-4">Item Full Quantity:</th>
                                <td><?php echo $full_quantity; ?></td>
                            </tr>
                            <tr>
                                <th class="w-25 pb-4">Item Sold Quantity:</th>
                                <td><?php echo $sold_quantity; ?></td>
                            </tr>
                            <tr>
                                <th class="w-25 pb-4">Item Available Quantity:</th>
                                <td><?php echo $full_quantity-$sold_quantity; ?></td>
                            </tr>
                            <tr>
                                <th class="w-25 pb-4">Item Order Quantity:</th>
                                <td><?php echo $item_order_number; ?></td>
                            </tr>
                            <tr>
                                <th class="w-25 pb-4">Item Description:</th>
                                <td><?php echo $item_info['description_english']; ?></td>
                            </tr>
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
    <script src="assets/js/admin_page_items.js"></script>
</body>

</html>