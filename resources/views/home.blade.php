@extends('layouts.app')

@section('content')
<div class="sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="nav-heading"></li>
            <li class="active"><a class="material-ripple" href="/home"><i class="material-icons">home</i> Overview</a></li>
            @if (Auth::user()->usertype == 'admin')
                <li>
                    <a class="material-ripple" href="#"><i class="material-icons">bubble_chart</i> Operations Manager<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                    <li><a href="/spraylocation">Setup Spraying Location</a></li>
                    <li><a href="/droneDeployment">Drone Deployment Setup</a></li>
                    <li><a href="/manageDeployment">Manage Deployment</a></li>
                    </ul>
                </li>
                <li>
                    <a class="material-ripple" href="#"><i class="material-icons">bubble_chart</i> Drone Setup<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                    <li><a href="/addnewdrone">Setup New Drone</a></li>
                    <li><a href="/manageclientdrone">Manage Client Drone</a></li>
                    </ul>
                </li>
                <li>
                    <a class="material-ripple" href="#"><i class="material-icons">bubble_chart</i> Manage Client<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                    <li><a href="#">Browse Client List</a></li>
                    </ul>
                </li>
                <li>
                    <a class="material-ripple" href="#"><i class="material-icons">bubble_chart</i> User Account Setup<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                    <li><a href="#">Setup New User Account</a></li>
                    </ul>
                </li>
            @else
                {{--
                <li>
                    <a class="material-ripple" href="#"><i class="material-icons">bubble_chart</i> Drone Service<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                    <li><a href="#">View Drone Report</a></li>
                    </ul>
                </li> --}}
            @endif

        </ul>
    </div>
    <!-- /.sidebar-collapse-->
</div>

<!-- /.Right Sidebar-->
<div id="page-wrapper">
    <div class="content">
        <div class="content-header"></div>
        <div class="row">
            <div style="width:100%">
                <h3> Drone Spraying Location - 2018/2019 </h3>
            </div>
            <hr>
            {{--
            @foreach ($drones as $k)
                @if ($k->drone_status == 'Ready')
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                        <div class="statistic-box statistic-filled-5">
                        <h2><span style="font-family:courier">{{$k->drone_code}}</span><span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"> </i> </span></h2>
                        <div class="small"></div>
                        </div>
                    </div>
                @else
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                        <div class="statistic-box statistic-filled-4">
                        <h2><span style="font-family:courier">{{$k->drone_code}}</span><span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"> </i> </span></h2>
                        <div class="small"> <a href="#" style="color:white">Check status >>></a></div>
                        </div>
                    </div>
                @endif
            @endforeach --}}

            <div id="map" class="center-block"></div>
        </div>
        <div class="row">
            @if (Auth::user()->usertype == 'admin')
                <div style="width:100%">
                    <h3> Avaliable Client Drones </h3>
                </div>
                <hr>

                @foreach ($alldrones as $k)
                    @if ($k->drone_status == 'Ready')
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                            <div class="statistic-box statistic-filled-5">
                            <h2><span style="font-family:courier">{{$k->drone_code}}</span><span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"> </i> </span></h2>
                            <div class="small"> <a href="#" style="color:#babde2">Check status >>></a></div>
                            </div>
                        </div>
                    @else
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                            <div class="statistic-box statistic-filled-4">
                            <h2><span style="font-family:courier">{{$k->drone_code}}</span><span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"> </i></span></h2>
                            <div class="small"> <a href="#" style="color:#babde2">Check status >>></a></div>
                            </div>
                        </div>
                    @endif
                @endforeach

            @endif
        </div>
    </div>
</div>
<script>
var simplemaps_countrymap_mapdata={
  main_settings: {
   //General settings
    width: "500", //'700' or 'responsive'
    background_color: "#FFFFFF",
    background_transparent: "yes",
    border_color: "#ffffff",
    state_description: "",
    state_color: "green",
    state_hover_color: "darkgreen",
    state_url: "",
    border_size: 1.5,
    all_states_inactive: "no",
    all_states_zoomable: "no",

    //Location defaults
    location_description: "Location description",
    location_url: "",
    location_color: "#FF0067",
    location_opacity: 0.8,
    location_hover_opacity: 1,
    location_size: 25,
    location_type: "square",
    location_image_source: "frog.png",
    location_border_color: "#FFFFFF",
    location_border: 2,
    location_hover_border: 2.5,
    all_locations_inactive: "no",
    all_locations_hidden: "no",

    //Label defaults
    label_color: "#d5ddec",
    label_hover_color: "#d5ddec",
    label_size: 22,
    label_font: "Arial",
    hide_labels: "no",
    hide_eastern_labels: "no",

    //Zoom settings
    zoom: "no",
    manual_zoom: "no",
    back_image: "no",
    initial_back: "no",
    initial_zoom: "-1",
    initial_zoom_solo: "no",
    region_opacity: 1,
    region_hover_opacity: 0.6,
    zoom_out_incrementally: "yes",
    zoom_percentage: 0.99,
    zoom_time: 0.5,

    //Popup settings
    popup_color: "white",
    popup_opacity: 0.9,
    popup_shadow: 1,
    popup_corners: 5,
    popup_font: "12px/1.5 Verdana, Arial, Helvetica, sans-serif",
    popup_nocss: "no",

    //Advanced settings
    div: "map",
    auto_load: "yes",
    url_new_tab: "no",
    images_directory: "default",
    fade_time: 0.1,
    link_text: "View Website",
    popups: "detect",
    state_image_url: "",
    state_image_position: "",
    location_image_url: ""
  },
  state_specific: {
    GHA2155: {
      name: "Northern",
      description: "Tamale",
      url: "/region/northern"
    },
    GHA2156: {
      name: "Upper East",
      description: "Bolgatanga",
      url: "/region/upper-east"
    },
    GHA2157: {
      name: "Upper West",
      description: "Wa",
      url: "/region/upper-west"
    },
    GHA2158: {
      name: "Ashanti",
      description: "Kumasi",
      url: "/region/asanti"
    },
    GHA2159: {
      name: "Brong Ahafo",
      description: "Sunyani",
      url: "/region/brong-ahafo"
    },
    GHA2160: {
      name: "Central",
      description: "Cape Coast",
      url: "/region/central"
    },
    GHA2161: {
      name: "Eastern",
      description: "Koforidua",
      url: "/region/eastern"
    },
    GHA2162: {
      name: "Western",
      description: "Sekondi-Takoradi",
      url: "/region/western-region"
    },
    GHA2172: {
      name: "Greater Accra",
      description: "Accra",
      url: "/region/greater-accra"
    },
    GHA2173: {
      name: "Volta",
      description: "Ho",
      url: "/region/volta"
    }
  },
  locations: {
    // "0": {
    //   lat: "5.554828",
    //   lng: "-0.200086",
    //   name: "Accra"
    // },
    // "1": {
    // 	lat: "5.666667",
    // 	lng: "0.000000",
    // 	name: "Tema"
    // },
    // "2": {
    // 	lat: "6.700071",
    // 	lng: "-1.630783",
    // 	name: "Kumasi"
    // },
    // "3": {
    //     lat: "9.432919",
    //     lng: "-0.848452",
    //     name: "Tamale"
    // },

    "0": {
      lat: "{{ 5.554828 }}",
      lng: "-0.200086",
      name: "Accra"
    },

  },
  labels: {},
  regions: {}
};
</script>
@endsection
