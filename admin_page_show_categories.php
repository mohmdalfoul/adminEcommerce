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
                        <h1 class="text-center">All Categories</h1>
                        <hr>
                    </div>
                </div>
                <div class="d-flex row mb-2">
                    <div class="d-flex col justify-content-end">
                        <button class="btn btn-outline-success btn-lg" id="addCategoryButton">Add Category</button>
                    </div>
                </div>
                <div class="row g-4 justify-content-center">
                    <div class="col">
                        <?php
             require('class/Package.class.php');
              $category_dal=new General();
              $categories=$category_dal->getCategories();
           ?>
                        <table class="table" id="categories_table_id">
                            <thead>
                                <th>Category ID</th>
                                <th>Category Name</th>
                                <th>Actions</th>
                            </thead>
                            <tbody>
                                <?php
                               foreach($categories as $v){
                             ?>
                                <tr>
                                    <td><?php echo $v['id']; ?></td>
                                    <td><?php echo $v['name_english']; ?></td>
                                    <td>
                                        <button data-bs-toggle="modal" data-bs-target="#editCategoryModel"
                                            class="btn btn-outline-warning editCategoryButton"><i
                                                class="fa fa-pen"></i></button>
                                        <button data-bs-toggle="modal" data-bs-target="#deleteCategoryModel"
                                            class="btn btn-outline-danger deleteCategoryButton"><i
                                                class="fa fa-trash"></i></button>
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
    <!-- modal for delete category -->
    <div id="deleteCategoryModel" class="modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Category</h5>
                    <button class="btn-close close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <h2 class="text-danger delete_Category_text"></h2>
                </div>
                <div class="modal-footer justify-content-center">
                    <button class="btn btn-secondary " data-bs-dismiss="modal">No</button>
                    <button class="btn btn-danger deleteCategoryModelButton">Delete</button>
                </div>
            </div>
        </div>
    </div>

    <!-- modal for edit category -->
    <div id="editCategoryModel" class="modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Category</h5>
                    <button class="btn-close close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="edit_category_form" method="post">
                        <input type="text" id="category_id" name="id" hidden/>
                        <div class="form-outline mb-3">
                            <label for="category_english_name_id" class="fw-bold">Category English Name:</label>
                            <input type="text" class="form-control form-control-lg" name="categoty_english_name"
                                id="category_english_name_id" />
                        </div>
                        <div class="form-outline mb-3">
                            <label for="category_arabic_name_id" class="fw-bold">Category Arabic Name:</label>
                            <input type="text" class="form-control form-control-lg" name="categoty_arabic_name"
                                id="category_arabic_name_id" />
                        </div>
                        <div class="form-outline mb-3">
                            <label for="category_image_id" id="category_image_label" class="fw-bold">Replace Category
                                Image:</label>
                            <input type="file" class="form-control form-control-lg" name="category_image"
                                id="category_image_id" />
                        </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <button class="btn btn-secondary " data-bs-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-warning editCategoryModelButton">Edit</button>
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
    <script src="assets/js/admin_page_categories.js"></script>
</body>

</html>