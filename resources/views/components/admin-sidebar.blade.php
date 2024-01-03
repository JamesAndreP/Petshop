<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
      <img src="../dist/img/logo.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Pet Shop Management</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('/img/avatars/'. $user->avatar)}}" class="img-circle elevation-2" alt="User Image" style="width: 30px !important; height: 30px !important">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{$user->fullname}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="dashboard" class="nav-link" style="background-color: #28a745; color: white;">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="view-posts" class="nav-link">
              <i class="nav-icon fas fa-bone"></i>
              
              <p>
                View Posts
              </p>
            </a>
          </li>
          <li class="nav-item">
             <a href="#" class="nav-link">
              <i class="nav-icon fas fa-paw"></i>
              <p>
                Pet
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
             <ul class="nav nav-treeview">
              {{-- <li class="nav-item">
                <a href="/pet-type" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Type</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/pet-category" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Category</p>
                </a>
              </li> --}}
              <li class="nav-item">
                <a href="pet-management" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Management</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pet-approval" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Approval</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="available-pet-selling" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Available Pets for Sale</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="available-pet-adoption" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Available Pets for Adoption</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="sold-pets" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sold Pets</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="adopted-pets" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Adopted Pets</p>
                </a>
              </li>
              {{-- <li class="nav-item">
                <a href="productcategory.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Product Category</p>
                </a>
              </li> --}}
              {{-- <li class="nav-item">
                <a href="product.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Product</p>
                </a>
              </li> --}}
            </ul>
          </li>
          {{-- <li class="nav-item">
             <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users-cog"></i>
              <p>
                Management
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
             <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="clientform.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Client Form</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="services.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Service</p>
                </a>
              </li>
            <li class="nav-item">
                <a href="order.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Order</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="vendor.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Vendor</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="user.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>User</p>
                </a>
              </li>
            </ul>
          </li> --}}
          <li class="nav-item">
            <a href="products" class="nav-link">
              <i class="nav-icon fas fa-bone"></i>
              
              <p>
                Manage Products
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="services" class="nav-link">
              <i class="nav-icon fas fa-toolbox"></i>
              
              <p>
                Manage Services
              </p>
            </a>
          </li>
          {{-- <li class="nav-item">
            <a href="orderdetail.php" class="nav-link">
              <i class="nav-icon fas fa-list-alt"></i>
              <p>
                Order Detail
              </p>
            </a>
          </li> --}}
          <li class="nav-item">
            <a href="add-new-admin" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Add Admin
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="logout" class="nav-link">
              @csrf
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>