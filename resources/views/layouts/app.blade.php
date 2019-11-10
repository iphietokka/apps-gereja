<!DOCTYPE html>
<html>
<head>
 @include('layouts.partials.head')
</head>
<body class="hold-transition skin-black-light sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    @include('layouts.partials.header')
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    @include('layouts.partials.sidebar')
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      @yield('content')
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    @include('layouts.partials.footer')
  </footer>
</div>
<!-- ./wrapper -->
@include('layouts.partials.scripts')
@yield('scripts')
</body>
</html>
