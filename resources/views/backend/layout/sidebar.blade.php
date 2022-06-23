<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="/backend/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">

      <li class="active ">
          <a href="{{route('admin.slide.index')}}">
            <i class="fa fa-user"></i> <span >QUẢN LÝ SLIDE</span>
          </a>
        </li>
        <li class="active ">
          <a href="{{route('admin.user.index')}}">
            <i class="fa fa-user"></i> <span >QUẢN LÝ USER</span>
          </a>
        </li>
        <li class="active">
          <a href="{{route('admin.brand.index')}}">
            <i class="fa fa-list"></i> <span>QUẢN LÝ NCC</span>
          </a>
        </li>
        <li class="active">
          <a href="{{route('admin.category.index')}}">
            <i class="fa fa-list"></i> <span>QUẢN LÝ DANH MỤC</span>
          </a>
        </li>
          <li class="active">
              <a href="{{route('admin.product.index')}}">
                  <i class="fa fa-list"></i> <span>QUẢN LÝ SẢN PHẨM</span>
              </a>
          </li>
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>QUẢN LÝ TIN TỨC</span>
          </a>
        </li>

          <li class="active">
              <a href="{{route('admin.coupon.index')}}">
                  <i class="fa fa-list"></i> <span>QUẢN LÝ MÃ GIẢM GIÁ</span>
              </a>
          </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
