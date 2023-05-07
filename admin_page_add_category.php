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
                       <?php
                         if(isset($_SESSION['add_category'])){
                            if($_SESSION['add_category']){
                                ?>
                              <div class="alert alert-success">Add Category Success</div>
                      <?php          
                            }
                            else {
                                ?>
                            <div class="alert alert-danger"><?php echo $_SESSION['add_category']; ?></div>
                    <?php
                            }
                            unset($_SESSION['add_category']);
                         }
                       ?>
                    </div>
                </div>
                <div class="d-flex row g-4 justify-content-center">
                    <div class="col-7">
                        <h1 class="text-center">Add Category</h1>
                        <hr>
                    </div>
                </div>
                <div class="row g-4 justify-content-center">
                    <div class="col">
                        <form class="" method="post" action="admin_page_add_category_query.php" onsubmit="return validateAddCategory()">
                            <div class="form-outline mb-4">
                                <label for="category_name_english_id" class="fw-bold">Category English Name:</label>
                                <input type="text" name="name_english" id="category_name_english_id"
                                    class="form-control form-control-lg" />
                            </div>
                            <div class="form-outline mb-4">
                                <label for="category_name_arabic_id" class="fw-bold">Category Arabic Name:</label>
                                <input type="text" name="name_arabic" id="category_name_arabic_id"
                                    class="form-control form-control-lg" />
                            </div>
                            <div class="d-flex form-outline justify-content-center mb-4">
                                <button type="submit" class="btn btn-outline-success btn-lg p-3">Add Category</button>
                            </div>
                        </form>
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
        <script src="assets/js/sweet_alert.js"></script>
        <script src="assets/js/admin_page_slidebar.js"></script>
        <script src="assets/js/admin_page_categories.js"></script>
</body>

</html>