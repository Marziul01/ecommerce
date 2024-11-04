<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion newly-edit-navbar" id="customSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin.dashboard') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3"><img src="{{ asset($siteSettings->logo) }}" width="115px"></div>
            <a class="text-center btn btn-sm btn-primary" href="{{ route('home') }}">Visit Site</a>

    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Pages Collapse Menu -->

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOrder"
           aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Orders</span>
        </a>
        <div id="collapseOrder" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('ordersPending') }}">Pending Orders</a>
                <a class="collapse-item" href="{{ route('ordersComplete') }}">Completed Orders</a>
                <a class="collapse-item" href="{{ route('ordersCancel') }}">Cancelled Orders</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('category.index') }}">
            <i class="fas fa-fw fa-cog"></i>
            <span>Categories</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('subcategory.index') }}">
            <i class="fas fa-fw fa-cog"></i>
            <span>Sub Categories</span>
        </a>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('brand.index') }}">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Brands</span>
        </a>

    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('product.index') }}">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Products</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseVariation"
           aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Variation</span>
        </a>
        <div id="collapseVariation" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('variations.index') }}">Colors</a>
                <a class="collapse-item" href="{{ route('variationSize') }}">Sizes</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('coupons.index') }}">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Coupons</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('shipping') }}">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Shipping Methods</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSite"
           aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Site Settings</span>
        </a>
        <div id="collapseSite" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('headerSettings') }}">Header</a>
                <a class="collapse-item" href="{{ route('footerSettings') }}">Footer</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
           aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Pages</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('homeSettings') }}">Home</a>
                <a class="collapse-item" href="{{ route('aboutPage') }}">About</a>
                <a class="collapse-item" href="{{ route('contactPage') }}">Contact</a>
                <a class="collapse-item" href="{{ route('privacy_policy') }}">Privacy Policy</a>
                <a class="collapse-item" href="{{ route('terms_and_condition') }}">Terms & Condition</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('users.index') }}">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Users</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('reviews') }}">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Reviews</span>
        </a>
    </li>


</ul>

