@include('admin.inc.toppart')
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

@include('admin.inc.header')

@include('admin.inc.sidebar')

@yield('content')

@include('admin.inc.footer')
