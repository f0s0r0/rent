<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>ReMS</title>

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="{{ asset('public/dashb/lib/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <!--external css-->
  <link href="{{ asset('public/dashb/lib/font-awesome/css/font-awesome.css') }}" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="{{ asset('public/dashb/css/zabuto_calendar.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('public/dashb/lib/gritter/css/jquery.gritter.css') }}" />
  <!-- Custom styles for this template -->
  <link href="{{ asset('public/dashb/css/style.css') }}" rel="stylesheet">
  <link href="{{ asset('public/dashb/css/style-responsive.css') }}" rel="stylesheet">
  <script src="{{ asset('public/dashb/lib/chart-master/Chart.js') }}"></script>

  <link href="{{ asset('public/dashb/lib/advanced-datatable/css/demo_page.css') }}" rel="stylesheet" />
  <link href="{{ asset('public/dashb/lib/advanced-datatable/css/demo_table.css') }}" rel="stylesheet" />
  <link rel="stylesheet" href="{{ asset('public/dashb/lib/advanced-datatable/css/DT_bootstrap.css') }}" />

  <link href="{{ asset('public/dashb/css/multiselect.css') }}" rel="stylesheet"/>
  <link href="{{ asset('public/dashb/css/dash.css') }}" rel="stylesheet">
	<script src="{{ asset('public/dashb/lib/multiselect.min.js')}}"></script>

  <link rel="stylesheet" href="{{ asset('public/dashb/css/toastr.min.css')}}"  />
 

  <style>
		/* example of setting the width for multiselect */
		#testSelect1_multiSelect {
			width: 200px;
		}
	</style>
</head>

<body>
@guest
    <li><a href="{{ route('login') }}" class="btn btn-primary" style="margin:50px 0px 0px 500px;">You are not logged in!!! CLick here to Login</a></li>
                            
    @else
  <section id="container">
   
    <!--header start-->
    <header class="header black-bg ">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
      <!--logo start-->
      <a href="#" class="logo"><b>Re<span>MS</span></b></a>
      <!--logo end-->
      <div class="nav notify-row" id="top_menu">
   
      </div>
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li><a class="logout" href="{{ url('/logout') }}">Logout</a>
          </li>
        </ul>
      </div>
    </header>
    <!--header end-->
    
    <!--sidebar start-->
    @if((Auth::user()->userType=='admin') && (Auth::user()->user_status=='active') )
    <aside>
      <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          <p class="centered"><a href="{{ url('/admin')}}"><img src="{{ asset('/public/uploads/profiles/'. Auth()->user()->profile_photo) }}" class="img-circle" width="80"></a></p>
          <h5 class="centered">{{ ucwords(Auth()->user()->firstName) }}</h5>
          <li class="mt">
            <a class="{{ Route::currentRouteNamed('admin') ? 'active' : '' }}" href="{{ url('/admin')}}">
              <i class="fa fa-dashboard"></i>
              <span>Dashboard</span>
              </a>
          </li>
          
          <li class="sub-menu">
            <a href="#" class="{{ Route::currentRouteNamed('user') ? 'active' : '' }}">
              <i class="fa fa-user"></i>
              <span>Tenant</span>
              </a>
            <ul class="sub" >
              <li><a href="{{ url('addtenant') }}" >Add Tenant</a></li>
              <li><a href="{{ url('alltenants') }}">All Tenant</a></li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="#" class="{{ Route::currentRouteNamed('teacher') ? 'active' : '' }}">
              <i class="fa fa-pencil"></i>
              <span>Rent Payment</span>
              </a>
            <ul class="sub">
              <li><a href="{{ url('allteachers') }}">Paid Rents</a></li>
              <li><a href="{{ url('allteachers') }}">Unpaid Rents</a></li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="#" class="{{ Route::currentRouteNamed('student') ? 'active' : '' }}">
              <i class="fa fa-group"></i>
              <span>Rooms</span>
              </a>
            <ul class="sub">
              <li><a href="{{ url('newroom')}}">Add Room</a></li>
              <li><a href="{{ url('allrooms')}}">All Rooms</a></li>
              <li><a href="{{ url('vacant')}}">Vacant Rooms</a></li>
              <li><a href="{{ url('occupied')}}">Occupied Rooms</a></li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="#" class="{{ Route::currentRouteNamed('exams') ? 'active' : '' }}">
              <i class="fa fa-book"></i>
              <span>Invoices</span>
              </a>
            <ul class="sub">
              <li><a href="{{ url('invoice') }}">View Invoices</a></li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="#" class="{{ Route::currentRouteNamed('exams') ? 'active' : '' }}">
              <i class="fa fa-user"></i>
              <span>Profile</span>
              </a>
            <ul class="sub">
              <li><a href="{{ url('profile') }}">Change Photo</a></li>
            </ul>
          </li> 
        </ul>
      @endif


      @if(Auth::user()->userType=='tenant')
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          <p class="centered"><a href="{{ url('/tenant')}}"><img src="{{ asset('/public/uploads/profiles/'. Auth()->user()->profile_photo) }}" class="img-circle" width="80"></a></p>
          <h5 class="centered">{{ ucwords(Auth()->user()->firstName) }} </h5>
          
          <li class="mt">
            <a class="{{ Route::currentRouteNamed('tenant') ? 'active' : '' }}" href="{{ url('/tenant')}}">
              <i class="fa fa-dashboard"></i>
              <span>Dashboard</span>
              </a>
          </li>
          <li class="sub-menu">
            <a href="#" class="{{ Route::currentRouteNamed('viewroom') ? 'active' : '' }}">
              <i class="fa fa-group"></i>
              <span>My Room</span>
              </a>
            <ul class="sub">
              <li><a href="{{ url('viewroom')}}"> View Room</a></li>
            </ul>
            <ul class="sub">
              <li><a href="{{ url('reportroom')}}"> Report Room</a></li>
            </ul>
          </li>

          <li class="sub-menu">
            <a href="#" class="{{ Route::currentRouteNamed('payments') ? 'active' : '' }}">
              <i class="fa fa-graduation-cap"></i>
              <span>Payments</span>
              </a>
            <ul class="sub">
              <li><a href="{{ url('paynow') }}"> Pay Now</a></li>
            </ul>
            <ul class="sub">
              <li><a href="{{ url('payhistory') }}"> Pay History</a></li>
            </ul>
            <ul class="sub">
              <li><a href="{{ url('downloadinvoice') }}"> Download Invoice</a></li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="#" class="{{ Route::currentRouteNamed('profile') ? 'active' : '' }}">
              <i class="fa fa-user"></i>
              <span>Profile</span>
              </a>
            <ul class="sub">
            <li><a href="{{ url('profile') }}">Update Profile</a></li>
            
            </ul>
          </li>
          
        </ul>
      @endif
      </div>
    </aside>
    <!--sidebar end-->
    @endguest
    @yield('headerside')
   
  
  </section>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="{{ asset('public/dashb/lib/jquery/jquery.min.js') }}"></script>
  
  <script src="{{ asset('public/dashb/lib/bootstrap/js/bootstrap.min.js') }}"></script>
  <script class="include" type="text/javascript" src="{{ asset('public/dashb/lib/jquery.dcjqaccordion.2.7.js') }}"></script>
  <script src="{{ asset('public/dashb/lib/jquery.scrollTo.min.js') }}"></script>
  <script src="{{ asset('public/dashb/lib/jquery.nicescroll.js') }}" type="text/javascript"></script>
  <script src="{{ asset('public/dashb/lib/jquery.sparkline.js') }}"></script>
  <!--common script for all pages-->
  <script src="{{ asset('public/dashb/lib/common-scripts.js') }}"></script>
  <script type="text/javascript" src="{{ asset('public/dashb/lib/gritter/js/jquery.gritter.js') }}"></script>
  <script type="text/javascript" src="{{ asset('public/dashb/lib/gritter-conf.js') }}"></script>
  <!--script for this page-->
  <script src="{{ asset('public/dashb/lib/sparkline-chart.js') }}"></script>
  <script src="{{ asset('public/dashb/lib/zabuto_calendar.js') }}"></script>
  

  <script type="text/javascript"  src="{{ asset('public/dashb/lib/advanced-datatable/js/jquery.dataTables.js') }}"></script>
  <script src="{{ asset('public/dashb/lib/toastr.js') }}"></script>
  <script src="{{ asset('public/dashb/lib/toastr.min.js')}}"></script>

  <!--common script for all pages-->
  
 
  <script type="application/javascript">
$(document).ready(function () {
  $('#dt-horizontal-scroll').dataTable({
    "fnInitComplete": function () {
      var myCustomScrollbar = document.querySelector('#dt-horizontal-scroll_wrapper .dataTables_scrollBody');
      var ps = new PerfectScrollbar(myCustomScrollbar);
    },
    "scrollX": true,
    fixedColumns:   {
      leftColumns: 1,
      rightColumns: 1
  }
  });
});
  </script>
  <script>
// Material Select Initialization
$(document).ready(function() {
$('.mdb-select').materialSelect();
});
</script>

  <script>
// Material Select Initialization
$(document).ready(function() {
$('.mdb-select').materialSelect();
});

  @if(Session::has('message'))
    var type = "{{ Session::get('message.alert-type', 'success') }}";
    switch(type){
        case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;
        
        case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;
        case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;
        case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
    }
  @endif
</script>
  @yield('footer')