<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Skydash Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{url('admin/vendors/feather/feather.css')}}">
  <link rel="stylesheet" href="{{asset('admin/vendors/ti-icons/css/themify-icons.css')}}">
  <link rel="stylesheet" href="{{url('admin/vendors/css/vendor.bundle.base.css')}}">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="{{url('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}">
  
  <link rel="stylesheet" href="{{url('vendors/mdi/css/materialdesignicons.min.css')}}">
 <!--   data table        -->
 <link rel="stylesheet" href="{{url('admin/DataTables/css/dataTables.bootstrap4')}}" />
   
  <link rel="stylesheet" type="text/css" href="{{url('admin/js/select.dataTables.min.css')}}">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{url('admin/css/vertical-layout-light/style.css')}}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{url('admin/images/favicon.png')}}" />
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
   @include('admin.layout.header')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
     
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      @include('admin.layout.sidebar')
      <!-- partial -->
    @yield('content')
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="{{url('admin/vendors/js/vendor.bundle.base.js')}}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="{{url('admin/vendors/chart.js/Chart.min.js')}}"></script>
  <script src="{{url('admin/vendors/datatables.net/jquery.dataTables.js')}}"></script>
  <script src="{{url('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.js')}}"></script>
  <script src="{{url('admin/js/dataTables.select.min.js')}}"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="{{url('admin/js/off-canvas.js')}}"></script>
  <script src="{{url('admin/js/hoverable-collapse.js')}}"></script>
  <script src="{{url('admin/js/template.js')}}"></script>
  <script src="{{url('admin/js/settings.js')}}"></script>
  <script src="{{url('admin/js/todolist.js')}}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{url('admin/js/dashboard.js')}}"></script>
  <script src="{{url('admin/js/Chart.roundedBarCharts.js')}}"></script>
  <!-- End custom js for this page-->
 
  <!-- data table -->
 <link rel="stylesheet" href="{{url('admin/DataTables/js/dataTables.bootstrap4')}}" />

   
  <!-- check admin current password -->
  <script> var csrf = "{{csrf_token()}}"  ;   </script>
<script src="{{asset('admin/custom.js')}}"> </script>
<script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>

<script>

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('15d9e37a5f190c0bdf05', {
      cluster: 'eu',
    authEndpoint: "/ecom9/public/broadcasting/auth"
    
    });

    var channel = pusher.subscribe('private-App.Models.User.{{Auth::id()}}');
    channel.bind('Illuminate\\Notifications\\Events\\BroadcastNotificationCreated', function(data) {
     alert("hi ahmed.. new order has created");
    });
  </script>

</body>

</html>

