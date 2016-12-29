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
        @if(Auth::user()->hotel!=null)
          {{ Auth::user()->hotel->hotel_name }}
        @else
          {{ Auth::user()->name }}
        @endif
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
    @if (!empty(Auth::user()->hotel) )
     @if(Auth::user()->hotel->hotel_active==1)
    <ul class="sidebar-menu">
      <li class="header">Left Bar</li>
      <!-- Optionally, you can add icons to the links -->
    <li class="treeview">
      <a href="{{route('room.index')}}"><i class="fa fa-book"></i> <span>Trang chủ</span>
      </a>
    </li>


    <li class="treeview">
      <a href="{{route('bookroom.index')}}"><i class="fa fa-book"></i> <span>Đặt phòng</span>
        <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="{{  route('bookroom.create')}}">Đặt phòng</a></li> 
        <li><a href="{{route('bookroom.index')}}">Danh sách đăt phòng</a></li>
      </ul>
    </li>


        <li class="treeview">
        <a href="{{url('business/bookroom')}}"><i class="fa fa-book"></i> <span>Thuê phòng</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ route('leaseroom.create')}}">Thuê phòng</a></li>
          <li><a href="{{route('leaseroom.index')}}">Danh sách Thuê Phòng</a></li>
        </ul>
      </li>

      <li class="treeview">
        <a href="{{route('roomtype.create')}}"><i class="fa fa-book"></i> <span>Loại Phòng</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>

      </li>
      <li class="treeview">
        <a href="#"><i class="fa fa-book"></i> <span>Giá phòng</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{url('business/roomprice')}}">Danh sách</a></li>
          <li><a href="{{url('business/roomprice/create')}}">Tạo mới</a></li>
        </ul>
      </li>

        <li class="treeview">
            <a href=""><i class="fa fa-book"></i> <span>Dịch vụ</span>
                <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{route('service.index')}}"">Danh sách</a></li>
                <li><a href="{{route('serviceuser.index')}}">Dử dụng dịch vụ</a></li>
            </ul>
        </li>



         <li class="treeview">
        <a href="{{route('guest.index')}}"><i class="fa fa-book"></i> <span>Khách</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
      </li>
        <li class="treeview">
            <a href=""><i class="fa fa-book"></i> <span>Tiện nghi</span>
                <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{route('service.index')}}"">Danh sách</a></li>
                <li><a href="{{route('serviceuser.index')}}">Sử dụng dịch vụ</a></li>
            </ul>
        </li>

        <li class="treeview">
            <a href=""><i class="fa fa-book"></i> <span>Lưu trú</span>
                <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{route('service.index')}}"">Tạo mới</a></li>
                <li><a href="{{route('serviceuser.index')}}">Danh sách lưu trú</a></li>
            </ul>
        </li>
    </ul>
    @else

    <!-- Sidebar Menu -->
    <ul class="sidebar-menu">
      <li class="header">Menu</li>
      <!-- Optionally, you can add icons to the links -->


      <li class="treeview">
        <a href="#"><i class="fa fa-book"></i> <span>Liên hệ</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="#">Menu</a></li>
          <li><a href="#">Menu</a></li>
        </ul>
      </li>
    </ul>
    @endif
    @endif
    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>