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
               <?php
                 require("class/Package.class.php");
                 $catDAL=new General();
                 $product_category=$catDAL->getCategories();
               ?>
                <div class="row">
                  <div class="col">
                    <?php
                    if(isset($_SESSION["add_item_validate"])){
                      if($_SESSION["add_item_validate"]=="true"){
                       
                        ?>
                         <div class="alert alert-success">Add Item Success</div>
                        <?php
                      }
                      else {
                        ?>
                        <div class="alert alert-danger">
                          <?php echo "Error: ".$_SESSION["add_item_validate"];  ?>
                        </div>
                        <?php
                      }
                      unset($_SESSION["add_item_validate"]);
                    }
                    ?>
                  </div>
                </div>
                <div class="row g-4 justify-content-center">
                    <div class="col">
                        <form action="admin_page_add_item_query.php" method="post" enctype="multipart/form-data">
                        <div class="form-outline mb-4">
                         <label for="Item_english_name_id" class="fw-bold">Item English Name:</label>
                         <input type="text" name="Item_english_name" id="Item_english_name_id" class="form-control form-control-lg"/>
                      </div>
                      <div class="form-outline mb-4">
                         <label for="Item_arabic_name_id" class="fw-bold">Item Arabic Name:</label>
                         <input type="text" name="Item_arabic_name" id="Item_arabic_name_id" class="form-control form-control-lg"/>
                      </div>
                      <div class="form-outline mb-4">
                         <label for="Item_price_id" class="fw-bold">Item Price:</label>
                         <input type="text" name="Item_price" id="Item_price_id" class="form-control form-control-lg"/>
                      </div>
                      <!--<div class="form-outline mb-4">
                         <label for="Item_status_id" class="fw-bold">Item status:</label>
                         <select name="Item_status" id="Item_status_id" class="form-select form-select-lg">
                           <option>active</option>
                           <option>non active</option>
                         </select>
                      </div>-->
                      <div class="form-outline mb-4">
                         <label for="Item_category_id" class="fw-bold">Item Category:</label>
                         <select name="Item_category" id="Item_category_id" class="form-select form-select-lg">
                           <?php foreach($product_category as $v){ ?>
                           <option value="<?php echo $v['id']; ?>"><?php echo $v['name_english']; ?></option>
                           <?php } ?>
                         </select>
                      </div>
                      <div class="form-check mb-2">
                         <input class="form-check-input" type="checkbox" value="1" id="new_item_check_id" name="new_item_check" onclick="checkProductDiscount()">
                         <label class="form-check-label" for="new_item_id">New Item?</label>
                      </div>
                      <div class="form-check mb-2">
                         <input class="form-check-input" type="checkbox" value="1" id="availability_check_id" name="availability_check" onclick="checkProductDiscount()">
                         <label class="form-check-label" for="availability_check_id">Availability?</label>
                      </div>
                      <div class="form-check mb-2">
                         <input class="form-check-input" type="checkbox" value="" id="discount_check_id" onclick="checkProductDiscount()">
                         <label class="form-check-label" for="discount_check_id">Have Discount?</label>
                      </div>
                      <div class="form-outline mb-4">
                         <label for="Item_discount_id" class="fw-bold">Item Discount Percentage:</label>
                         <input type="text" name="Item_discount" id="Item_discount_id" class="form-control form-control-lg" disabled/>
                      </div>
                      <div class="form-outline mb-4">
                         <label for="Item_images_id" class="fw-bold">Item Images:</label>
                         <input type="file" name="Item_images[]" id="Item_imges_id" class="form-control form-control-lg" multiple="multiple"/>
                      </div>
                      <div class="form-outline mb-4">
                         <label for="Item_english_description_id" class="fw-bold">Item English Description:</label>
                         <textarea name="Item_english_description" id="Item_english_description_id" class="form-control form-control-lg"></textarea>
                      </div>
                      <div class="form-outline mb-4">
                         <label for="Item_arabic_description_id" class="fw-bold">Item Arabic Description:</label>
                         <textarea name="Item_arabic_description" id="Item_arabic_description_id" class="form-control form-control-lg"></textarea>
                      </div>
                      <div class="d-flex form-outline justify-content-center mb-4">
                          <button type="submit" class="btn btn-outline-success btn-lg p-3">Add Item</button>
                      </div>
                        </form>
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