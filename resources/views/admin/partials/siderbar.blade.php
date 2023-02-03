<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ asset('/admin/home') }}" class="brand-link">
        <img src="{{ asset('AdminLTE/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('AdminLTE/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">


                <li class="nav-item">
                    <a href="{{ asset('admin/categories') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        {{-- <span class="right badge badge-danger">New</span> --}}
                        <p>Danh mục sản phẩm</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ asset('admin/order') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        {{-- <span class="right badge badge-danger">New</span> --}}
                        <p>Đơn đặt hàng</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ asset('admin/order/confirm') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        {{-- <span class="right badge badge-danger">New</span> --}}
                        <p>Đơn hàng đã xác nhận</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ asset('admin/order/canceled') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        {{-- <span class="right badge badge-danger">New</span> --}}
                        <p>Đơn hàng đã hủy</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ asset('admin/order/success') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        {{-- <span class="right badge badge-danger">New</span> --}}
                        <p>Đơn giao hàng thành công</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
