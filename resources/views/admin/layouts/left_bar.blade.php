<aside class="main-sidebar">

  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <!-- Sidebar user panel (optional) -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="{{asset('image/danang1.jpg')}}" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>
          {{ Auth::user()->name }}
        </p>
      </div>
    </div>
    <!-- search form (Optional) -->
    <form action="#" method="post" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
        <span class="input-group-btn">
          <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
          </button>
        </span>
      </div>
    </form>
    <!-- /.search form -->
    <!-- Sidebar Menu -->
    <ul class="sidebar-menu">
      <li class="header">Menu</li>
      <!-- Optionally, you can add icons to the links -->
            <li class="treeview">
        <a href="{{url('admin/home')}}"><i class="fa fa-book"></i> <span>Home</span>
        </a>
      </li>
      <li class="treeview">
        <a href="{{route('hotel.index')}}"><i class="fa fa-book"></i> <span>Khách sạn đăng ký</span>
        </a>
      </li>

      <li class="treeview">
        <a href="#"><i class="fa fa-book"></i> <span>Menu</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="#">Menu</a></li>
          <li><a href="#">Menu</a></li>
        </ul>
      </li>

      <li class="treeview">
        <a href="#"><i class="fa fa-book"></i> <span>Menu</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="#">Menu</a></li>
          <li><a href="#">Menu</a></li>
          <li><a href="#">Menu</a></li>
          <li><a href="#">Menu</a></li>
        </ul>
      </li>
    </ul>
    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>