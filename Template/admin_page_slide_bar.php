<div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="index.html" class="navbar-brand mx-2 mb-3">
                    <h3 class="text-primary"><i class="fa fa-hashtag me-1"></i>HopShop Admin</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">Jhon Doe</h6>
                        <span>Admin</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="admin_page_dashbord.php" class="dashbord nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <div class="nav-item dropdown active">
                        <a href="#" class="items nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fab fa-product-hunt fa-lg me-2"></i>Items</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="admin_page_show_items.php" class="dropdown-item">All Items</a>
                            <a href="#" class="dropdown-item">New Items</a>
                            <a href="#" class="dropdown-item">Available Items</a>
                            <a href="#" class="dropdown-item">Most Saled Items</a>
                        </div>
                    </div>
                    <a href="admin_page_show_categories.php" class="categories nav-item nav-link"><i class="fa fa-th me-2"></i>Categories</a>
                    <a href="admin_page_show_orders.php" class="orders nav-item nav-link"><i class="fas fa-shopping-cart me-2"></i>Orders</a>
                    <a href="#" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Transactions</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="customers nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fas fa-users me-2"></i>Customers</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="admin_page_show_customers.php" class="dropdown-item">All Customers</a>
                            <a href="admin_page_show_customers.php?favorite_customers=1" class="dropdown-item">Favorite Customers</a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>