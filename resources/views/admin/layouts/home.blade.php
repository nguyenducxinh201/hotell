@include ('admin.layouts.header')
  <!-- Left side column. contains the logo and sidebar -->
  @yield('header_link')
  @include('admin.layouts.header_bottom')
  @include ('admin.layouts.left_bar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">

      <!-- Your Page Content Here -->
      @yield ('main-content')

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <style type="text/css">
    
  </style>
@include ('admin.layouts.footer') 
@yield('footer_link')
</body>
</html>
