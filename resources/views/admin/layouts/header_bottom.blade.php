
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="{{url('admin/home')}}" class="logo">ADMIN
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">ADMIN</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"></span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only"></span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="{{asset('image/danang1.jpg')}}" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              @if(Auth::user())
                     <span class="hidden-xs">{{ Auth::user()->name }}</span>
              @endif
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="{{asset('image/danang1.jpg')}}" class="img-circle" alt="User Image">
                <p>
                    {{ Auth::user()->name }}
                </p>
              </li>
              <li class="user-footer">
                <div class="pull-left">
                  <a href="/admin/{{ Auth::user()->id }}/edit" class="btn btn-default btn-flat"><span class="glyphicon glyphicon-user"></span>Profile</a>
                </div>
                <div class="pull-right">
                  <form id="logout-form" action="{{ url('admin/logout') }}" method="POST">
                    {{ csrf_field() }}
                    <input type="submit" id="logout" name="" value="Sign out">
                  </form>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>