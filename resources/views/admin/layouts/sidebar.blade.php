  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="/admin" class="brand-link">
          <span class="brand-text font-weight-light">AdminLTE 3</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
          <!-- Sidebar user (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <div class="image">
                  <img src="https://media.istockphoto.com/vectors/user-avatar-profile-icon-black-vector-illustration-vector-id1209654046?k=20&m=1209654046&s=612x612&w=0&h=Atw7VdjWG8KgyST8AXXJdmBkzn0lvgqyWod9vTb2XoE=" class="img-circle elevation-2" alt="User Image">
              </div>
              <div class="info">
                  <a href="#" class="d-block">{{ \Auth::user()->name }}</a>
              </div>
          </div>

          <!-- SidebarSearch Form -->
          <div class="form-inline">
              <div class="input-group" data-widget="sidebar-search">
                  <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                      aria-label="Search">
                  <div class="input-group-append">
                      <button class="btn btn-sidebar">
                          <i class="fas fa-search fa-fw"></i>
                      </button>
                  </div>
              </div>
          </div>

          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                  data-accordion="false">
                  <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                  <li class="nav-item">
                      <a href="/admin" class="nav-link">
                          <i class="nav-icon fas fa-tachometer-alt"></i>
                          <p>
                              Trang chủ

                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="/admin/categories" class="nav-link">
                          <i class="nav-icon fas fa-copy"></i>
                          <p>
                              Danh mục

                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                    <a href="/admin/articles" class="nav-link">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            Bài viết
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/tags" class="nav-link">
                        <i class="nav-icon far fa-plus-square"></i>
                        <p>
                            Tag
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/hotels" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Khách sạn
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/tour-guides" class="nav-link">
                        <i class="nav-icon fas fa-tree"></i>
                        <p>
                            Hướng dẫn viên
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/users" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Người dùng
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/discounts" class="nav-link">
                        <i class="nav-icon fas fa-columns"></i>
                        <p>
                            Mã giảm giá
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/tours" class="nav-link">
                        <i class="fas fa-circle nav-icon"></i>
                        <p>
                            Tour
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/bookings" class="nav-link">
                        <i class="nav-icon far fa-calendar-alt"></i>
                        <p>
                           Đặt Tour
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/logout" class="nav-link">
                        <i class="nav-icon far fa-circle text-danger"></i>
                        <p>
                            Đăng xuất
                        </p>
                    </a>
                </li>
              </ul>
          </nav>
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>
