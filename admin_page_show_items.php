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
                        <h1 class="text-center">All Items</h1>
                        <hr>
                    </div>
                </div>
                <div class="d-flex row mb-2">
                    <div class="d-flex col justify-content-end">
                    <select id="hide_col" class="form-select form-select-sm" multiple>
                           <option value="0">Item ID</option>
                           <option value="1">Name</option>
                           <option value="2">Price</option>
                           <option value="3">Description</option>
                           <option value="4">New Item</option>
                           <option value="5">Available</option>
                           <option value="6">Category</option>
                           <option value="7">Actions</option> 
                        </select>
                        <button class="btn btn-outline-success btn-lg m-2" id="add_item"><i class="fas fa-plus me-2"></i>Add Item</button>
                    </div>
                </div>
                <div class="row g-4 justify-content-center">
                    <div class="col">
                        <?php
             require('class/Package.class.php');
              $item_dal=new ItemDAL();
              $items=$item_dal->getItems();
           ?>
                        <table class="table" id="items_table_id">
                            <thead>
                                <th>Item ID</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Description</th>
                                <th>New Item</th>
                                <th>Available</th>
                                <th>Category</th>
                                <th>Actions</th>
                            </thead>
                           
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