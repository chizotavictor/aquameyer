<!DOCTYPE html>
<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="description" content="">
   <meta name="author" content="">
   <title>Ebuka Chizota | AquahMeyer Dashboard</title>
   <link rel="shortcut icon" href="/assets/dist/img/ico/favicon.png" type="image/x-icon">
   <script src="/assets/webfont/1.6.26/webfont.js"></script><script>WebFont.load({
      google: {
      families: ['Alegreya+Sans:100,100i,300,300i,400,400i,500,500i,700,700i,800,800i,900,900i', 'Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i', 'Open Sans']
      }
      });
   </script>
   <link href="/assets/dist/css/base.css" rel="stylesheet" type="text/css">
   <link href="/assets/plugins/toastr/toastr.min.css" rel="stylesheet" type="text/css">
   <link href="/assets/plugins/emojionearea/emojionearea.min.css" rel="stylesheet" type="text/css">
   <link href="/assets/plugins/monthly/monthly.min.css" rel="stylesheet" type="text/css">
   <link href="/assets/plugins/amcharts/export.css" rel="stylesheet" type="text/css">
   <link href="/assets/dist/css/component_ui.min.css" rel="stylesheet" type="text/css">
   <link id="defaultTheme" href="/assets/dist/css/skins/skin-dark-1.min.css" rel="stylesheet" type="text/css">
   <link href="/assets/dist/css/custom.css" rel="stylesheet" type="text/css">
   <!--if lt IE 9script(src='https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js')
      script(src='https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js')-->
    <!-- <script src="/mapdata.js"></script> -->

</head>
<div class="wrapper animsition" id="wrapper">
   <!-- Navigation-->
   <nav class="navbar navbar-fixed-top">
      <div class="navbar-header">
         <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse"><span class="sr-only">Toggle navigation</span><i class="material-icons">apps</i></button>
         <a class="navbar-brand" href="/dashboard">
            AquahMeyer<!-- img#bg.main-logo(src='/assets/dist/img/light-logo.png' alt='')--><!-- <span>AdminPage</span>-->
         </a>
      </div>
      <div class="nav-container">
         <!-- /.navbar-header-->
         <ul class="nav navbar-nav hidden-xs">
            <!-- /.Fullscreen-->
            <li class="hidden-xs">
               <a class="search-trigger" href="#"><i class="material-icons">search</i></a>
               <div class="fullscreen-search-overlay" id="search-overlay">
                  <a class="fullscreen-close" id="fullscreen-close-button" href="#"><i class="ti-close"></i></a>
                  <div id="fullscreen-search-wrapper">
                     <form id="fullscreen-searchform" method="get"><input id="fullscreen-search-input" type="text" value="" placeholder="Type keyword(s) here"><i class="ti-search fullscreen-search-icon"><input value="" type="submit"></i></form>
                  </div>
               </div>
            </li>
            <li class="hidden-xs"><a style="font-size:16px; font-weight:bold;">{{Auth::user()->name}}</a></li>
            <!-- /.Full page search-->
         </ul>
         <ul class="nav navbar-top-links navbar-right">

            <!-- /.dropdown--><!-- /.Dropdown-->
            <li class="dropdown">
               <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="material-icons">person </i></a>
               <ul class="dropdown-menu dropdown-user">
                  <li><a href="profile.html"><i class="ti-user"></i>&nbsp; Profile</a></li>
                  <li><a href="#"><i class="ti-settings"></i>&nbsp; Settings</a></li>
                  <li><a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="ti-layout-sidebar-left"></i>&nbsp; Logout</a></li>
               </a>

               <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                   @csrf
               </form>
                </ul>
            </li>
         </ul>
         <!-- /.navbar-top-links-->
      </div>
   </nav>
   <!-- /.Navigation-->
   @yield('content')
   <script src="/countrymap.js"></script>
   <script src="/assets/plugins/jQuery/jquery-1.12.4.min.js"></script><script src="/assets/plugins/jquery-ui-1.12.1/jquery-ui.min.js"></script><script src="/assets/bootstrap/js/bootstrap.min.js"></script><script src="/assets/plugins/metisMenu/metisMenu.min.js"></script><script src="/assets/plugins/lobipanel/lobipanel.min.js"></script><script src="/assets/plugins/animsition/js/animsition.min.js"></script><script src="/assets/plugins/fastclick/fastclick.min.js"></script><script src="/assets/plugins/slimScroll/jquery.slimscroll.min.js"></script><script src="/assets/plugins/toastr/toastr.min.js"></script><script src="/assets/plugins/sparkline/sparkline.min.js"></script><script src="/assets/plugins/counterup/jquery.counterup.min.js"></script><script src="/assets/plugins/counterup/waypoints.js"></script><script src="/assets/plugins/emojionearea/emojionearea.min.js"></script><script src="/assets/plugins/monthly/monthly.min.js"></script><script src="/assets/plugins/amcharts/amcharts.js"></script><script src="/assets/plugins/amcharts/ammap.js"></script><script src="/assets/plugins/amcharts/worldLow.js"></script><script src="/assets/plugins/amcharts/serial.js"></script><script src="/assets/plugins/amcharts/export.min.js"></script><script src="/assets/plugins/amcharts/light.js"></script><script src="/assets/plugins/amcharts/pie.js"></script><script src="/assets/dist/js/app.min.js"></script><script src="/assets/dist/js/page/dashboard.min.js"></script><script src="/assets/dist/js/jQuery.style.switcher.min.js"></script>

</div>
