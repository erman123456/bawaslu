<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" src="{{asset('template/img/favicon.png')}}">

  <title>Badan Pengawas Pemilu Provinsi Sumatera utara / {{$pageTitle}}</title>
  <link rel="shortcut icon" type="image/x-icon" href="{{asset('images/logo.jpg')}}">
    <!-- Bootstrap core CSS -->
    <link href="{{asset('template/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('template/css/bootstrap-reset.css')}}" rel="stylesheet">
    <!--external css-->
    <link href="{{asset('template/assets/font-awesome/css/font-awesome.css')}}" rel="stylesheet" />

    <!--right slidebar-->
    <link href="{{asset('template/css/slidebars.css')}}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset('template/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('template/css/style-responsive.css')}}" rel="stylesheet" />

    <!-- Select2-->
    <link href="{{asset('template/assets/select2/css/select2.css')}}" rel="stylesheet" />
    <link href="{{asset('template/assets/select2/css/select2.min.css')}}" rel="stylesheet" />

    <!-- Datatable-->
    <link href="{{asset('template/assets/datatable/dataTables.bootstrap4.min.css')}}"  />
    <link href="{{asset('template/assets/datatable/buttons.bootstrap4.min.css')}}" />
    <!--dynamic table-->
    <link rel="stylesheet" href="{{asset('template/assets/data-tables/DT_bootstrap.css')}}" />

    <script src="{{asset('template/js/jquery.js')}}"></script>
    
    {{-- DatePicker --}}
    <link rel="stylesheet" type="text/css"  href="{{asset('template/assets/bootstrap-fileupload/bootstrap-fileupload.css')}}" />
    <link rel="stylesheet" type="text/css"  href="{{asset('template/assets/bootstrap-wysihtml5/bootstrap-wysihtml5.css')}}" />
    <link rel="stylesheet" type="text/css"  href="{{asset('template/assets/bootstrap-datepicker/css/datepicker.css')}}" />
    <link rel="stylesheet" type="text/css"  href="{{asset('template/assets/bootstrap-timepicker/compiled/timepicker.css')}}" />
    <link rel="stylesheet" type="text/css"  href="{{asset('template/assets/bootstrap-colorpicker/css/colorpicker.css')}}" />
    <link rel="stylesheet" type="text/css"  href="{{asset('template/assets/bootstrap-daterangepicker/daterangepicker-bs3.css')}}" />
    <link rel="stylesheet" type="text/css"  href="{{asset('template/assets/bootstrap-datetimepicker/css/datetimepicker.css')}}" />
    <link rel="stylesheet" type="text/css"  href="{{asset('template/assets/jquery-multi-select/css/multi-select.css')}}" />

    <!--bootstrap switcher-->
    <link rel="stylesheet" type="text/css"  href="{{asset('template/assets/bootstrap-switch/static/stylesheets/bootstrap-switch.css')}}" />

    <!-- switchery-->
    <link rel="stylesheet" type="text/css"  href="{{asset('template/assets/switchery/switchery.css')}}" />

    <!--right slidebar-->
    <link  href="{{asset('template/css/slidebars.css')}}" rel="stylesheet">

    <!--  summernote -->
    <link  href="{{asset('template/assets/summernote/dist/summernote.css')}}" rel="stylesheet">



  </head>
  <body>

<section id="container" class="">
    <!--header start-->
    <header class="header white-bg">
        <div class="sidebar-toggle-box">
            <i class="fa fa-bars"></i>
        </div>
        <!--logo start-->
        <a href="{{url("dashboard")}}" class="logo" >
            <img alt="avatar" src="{{asset('images/logo.jpg')}}" class="txt- center" height="50px"><span>Bawaslu</span></a>
        <!--logo end-->
        <div class="nav notify-row" id="top_menu">
          <!--  notification start -->
          <ul class="nav top-menu">
            <!-- settings start -->
            <li class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                    <i class="fa fa-tasks"></i>
                    <span class="badge bg-success">6</span>
                </a>
                <ul class="dropdown-menu extended tasks-bar">
                    <div class="notify-arrow notify-arrow-green"></div>
                    <li>
                        <p class="green">You have 6 pending tasks</p>
                    </li>
                    <li>
                        <a href="#">
                            <div class="task-info">
                                <div class="desc">Dashboard v1.3</div>
                                <div class="percent">40%</div>
                            </div>
                            <div class="progress progress-striped">
                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                    <span class="sr-only">40% Complete (success)</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="task-info">
                                <div class="desc">Database Update</div>
                                <div class="percent">60%</div>
                            </div>
                            <div class="progress progress-striped">
                                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                    <span class="sr-only">60% Complete (warning)</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="task-info">
                                <div class="desc">Iphone Development</div>
                                <div class="percent">87%</div>
                            </div>
                            <div class="progress progress-striped">
                                <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 87%">
                                    <span class="sr-only">87% Complete</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="task-info">
                                <div class="desc">Mobile App</div>
                                <div class="percent">33%</div>
                            </div>
                            <div class="progress progress-striped">
                                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 33%">
                                    <span class="sr-only">33% Complete (danger)</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="task-info">
                                <div class="desc">Dashboard v1.3</div>
                                <div class="percent">45%</div>
                            </div>
                            <div class="progress progress-striped active">
                                <div class="progress-bar"  role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%">
                                    <span class="sr-only">45% Complete</span>
                                </div>
                            </div>

                        </a>
                    </li>
                    <li class="external">
                        <a href="#">See All Tasks</a>
                    </li>
                </ul>
            </li>
            <!-- settings end -->
            <!-- inbox dropdown start-->
            <li id="header_inbox_bar" class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-important">5</span>
                </a>
                <ul class="dropdown-menu extended inbox">
                    <div class="notify-arrow notify-arrow-red"></div>
                    <li>
                        <p class="red">You have 5 new messages</p>
                    </li>
                    <li>
                        <a href="#">
                            <span class="photo"><img alt="avatar" src="{{asset('template/img/avatar-mini.jpg')}}"></span>
                                  <span class="subject">
                                  <span class="from">Jonathan Smith</span>
                                  <span class="time">Just now</span>
                                  </span>
                                  <span class="message">
                                      Hello, this is an example msg.
                                  </span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="photo"><img alt="avatar" src="{{asset('template/img/avatar-mini2.jpg')}}"></span>
                                  <span class="subject">
                                  <span class="from">Jhon Doe</span>
                                  <span class="time">10 mins</span>
                                  </span>
                                  <span class="message">
                                   Hi, Jhon Doe Bhai how are you ?
                                  </span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="photo"><img alt="avatar" src="{{asset('template/img/avatar-mini3.jpg')}}"></span>
                                  <span class="subject">
                                  <span class="from">Jason Stathum</span>
                                  <span class="time">3 hrs</span>
                                  </span>
                                  <span class="message">
                                      This is awesome dashboard.
                                  </span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="photo"><img alt="avatar" src="{{asset('template/img/avatar-mini4.jpg')}}"></span>
                                  <span class="subject">
                                  <span class="from">Jondi Rose</span>
                                  <span class="time">Just now</span>
                                  </span>
                                  <span class="message">
                                      Hello, this is metrolab
                                  </span>
                        </a>
                    </li>
                    <li>
                        <a href="#">See all messages</a>
                    </li>
                </ul>
            </li>
            <!-- inbox dropdown end -->
            <!-- notification dropdown start-->
            <li id="header_notification_bar" class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">

                    <i class="fa fa-bell-o"></i>
                    <span class="badge bg-warning">7</span>
                </a>
                <ul class="dropdown-menu extended notification">
                    <div class="notify-arrow notify-arrow-yellow"></div>
                    <li>
                        <p class="yellow">You have 7 new notifications</p>
                    </li>
                    <li>
                        <a href="#">
                            <span class="label label-danger"><i class="fa fa-bolt"></i></span>
                            Server #3 overloaded.
                            <span class="small italic">34 mins</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="label label-warning"><i class="fa fa-bell"></i></span>
                            Server #10 not respoding.
                            <span class="small italic">1 Hours</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="label label-danger"><i class="fa fa-bolt"></i></span>
                            Database overloaded 24%.
                            <span class="small italic">4 hrs</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="label label-success"><i class="fa fa-plus"></i></span>
                            New user registered.
                            <span class="small italic">Just now</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="label label-info"><i class="fa fa-bullhorn"></i></span>
                            Application error.
                            <span class="small italic">10 mins</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">See all notifications</a>
                    </li>
                </ul>
            </li>
            <!-- notification dropdown end -->
        </ul>
        </div>
        <div class="top-nav ">
            <ul class="nav pull-right top-menu">
                <li>
                    <input type="text" class="form-control search" placeholder="Search">
                </li>
                <!-- user login dropdown start-->
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <img alt="" src="{{asset('template/img/avatar1_small.jpg')}}">
                        <span class="username">{{Auth::user()->email}}</span>
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu extended logout">
                        <div class="log-arrow-up"></div>
                        <li><a href="#"><i class=" fa fa-suitcase"></i>Profile</a></li>
                        <li><a href="#"><i class="fa fa-cog"></i> Settings</a></li>
                        <li><a href="#"><i class="fa fa-bell-o"></i> Notification</a></li>
                    <li><a href="{{url('logout')}}"><i class="fa fa-key"></i> Log Out</a></li>
                    </ul>
                </li>

                <!-- user login dropdown end -->
                <li class="sb-toggle-right">
                    <i class="fa  fa-align-right"></i>
                </li>
            </ul>
        </div>
    </header>
    <!--header end-->
    {{-- content --}}
        @include('layouts.content')
            @yield('content')
        @include('layouts.footer')
    </body>
</html>
