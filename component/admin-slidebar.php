<ul class="navbar-nav sidebar accordion -bg-darkblue" id="accordionSidebar"
    style="border-right: 1px solid var(--bg-dark-hr);">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-text mx-3">Giao diện chính</div>
    </a>
    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="admin.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Thống kê</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading">
        Quản lý
    </div>
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
           aria-controls="collapseTwo">
            <i class="fa fa-coffee" aria-hidden="true"></i>
            <span>Sản phẩm</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="py-2 collapse-inner rounded" style="background-color: var(--bg-dark);">
                <h6 class="collapse-header">Tùy chọn:</h6>
                <a class="collapse-item" href="admin-product-show.php?type=product">Danh sách sản phẩm</a>
                <a class="collapse-item" href="admin-product-show.php?type=service">Danh sách dịch vụ</a>
                <a class="collapse-item" href="admin-product-add.php">Thêm sản phẩm</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
           aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fa fa-tags" aria-hidden="true"></i>
            <span>Danh mục</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="py-2 collapse-inner rounded" style="background-color: var(--bg-dark);">
                <h6 class="collapse-header">Tùy chọn:</h6>
                <a class="collapse-item" href="admin-product-list.php">Danh mục</a>
                <a class="collapse-item" href="admin-product-list-add.php">Thêm danh mục</a>
            </div>
        </div>
    </li>
    <hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading">
        Doanh thu
    </div>
    <!-- Nav Item -->
    <li class="nav-item">
        <a class="nav-link" href="admin-orders.php">
            <i class="fa fa-paper-plane" aria-hidden="true"></i>
            <span>Hóa đơn</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>