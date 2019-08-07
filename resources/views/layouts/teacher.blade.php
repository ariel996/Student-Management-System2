<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="Admin, Dashboard, Bootstrap" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" type="image/png" sizes="16x16" href="/img/favicon/favicon-16x16.png">

    <!-- fonts -->
    <link rel="stylesheet" href="/fonts/md-fonts/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!-- animate css -->
    <link rel="stylesheet" href="/libs/animate.css/animate.min.css">

    @yield('style')
    <!-- octadmin main style -->
    <link id="pageStyle" rel="stylesheet" href="/css/style.css">

     <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

</head>

<body class="app sidebar-fixed aside-menu-off-canvas aside-menu-hidden header-fixed footer-fixed">
    <header class="app-header navbar">
        <div class="hamburger hamburger--arrowalt-r navbar-toggler mobile-sidebar-toggler d-lg-none mr-auto">
            <div class="hamburger-box">
                <div class="hamburger-inner"></div>
            </div>
        </div>
        <!-- end hamburger -->
        <a class="navbar-brand" href="{{ route('dashboard.index') }}"> <strong>Teacher Panel</strong></a>

        <div class="hamburger hamburger--arrowalt-r navbar-toggler sidebar-toggler d-md-down-none mr-auto">
            <div class="hamburger-box">
                <div class="hamburger-inner"></div>
            </div>
        </div>
        <!-- end hamburger -->

        <div class="navbar-search">
            <button type="submit" class="navbar-search-btn">
                <i class="mdi mdi-magnify"></i>
            </button>
            <input type="text" class="navbar-search-input" placeholder="Find User a user, team, meeting ..">
        </div>
        <!-- end navbar-search -->
        <ul class="nav navbar-nav ">
          <li class="nav-item dropdown">
              <a class="nav-link " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="mdi mdi-bell-ring"></i>
                  <span class="notification hertbit"></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right notification-list animated flipInY nicescroll-box">

                  <div class="dropdown-header">
                      <strong>Notification</strong>
                      <span class="badge badge-pill badge-theme pull-right"> new 5</span>
                  </div>
                  <!--end dropdown-header -->

                  <div class="wrap">

                      <a href="#" class="dropdown-item">
                          <div class="message-box">
                              <div class="u-img">
                                  <img src="http://via.placeholder.com/100x100" alt="user" />
                              </div>
                              <!-- end u-img -->
                              <div class="u-text">
                                  <div class="u-name">
                                      <strong>A New Order has Been Placed </strong>
                                  </div>
                                  <small>2 minuts ago</small>
                              </div>
                              <!-- end u-text -->
                          </div>
                          <!-- end message-box -->
                      </a>
                      <!-- end dropdown-item -->

                      <a href="#" class="dropdown-item">
                          <div class="message-box">
                              <div class="u-img">
                                  <img src="http://via.placeholder.com/100x100" alt="user" />
                              </div>
                              <div class="u-text">
                                  <div class="u-name">
                                      <strong>Order Updated</strong>
                                  </div>
                                  <small>10 minuts ago</small>
                              </div>
                              <!-- end u-text -->
                          </div>
                          <!-- end message-box -->
                      </a>
                      <!-- end dropdown-item -->

                      <a href="#" class="dropdown-item">
                          <div class="message-box">
                              <div class="u-img">
                                  <img src="http://via.placeholder.com/100x100" alt="user" />
                              </div>
                              <!-- end u-img -->
                              <div class="u-text">
                                  <div class="u-name">
                                      <strong>A New Order has Been Placed </strong>
                                  </div>
                                  <small>30 minuts ago</small>
                              </div>
                              <!-- end u-text -->
                          </div>
                          <!-- end message-box -->
                      </a>
                      <!-- end dropdown -->

                      <a href="#" class="dropdown-item">
                          <div class="message-box">
                              <div class="u-img">
                                  <img src="http://via.placeholder.com/100x100" alt="user" />
                              </div>
                              <!-- end u-img -->
                              <div class="u-text">
                                  <div class="u-name">
                                      <strong> Order has Been Rated </strong>
                                  </div>
                                  <small>32 minuts ago</small>
                              </div>
                              <!-- end u-text -->
                          </div>
                          <!-- end message-box -->
                      </a>
                      <!-- end dropdown -->
                  </div>
                  <!-- end wrap -->

                  <div class="dropdown-footer ">
                      <a href="">
                          <strong>See all messages (150) </strong>
                      </a>
                  </div>
                  <!-- end dropdown-footer -->
              </div>
              <!-- end notification-list -->

          </li>
          <!-- end nav-item -->

          <li class="nav-item ">
              <a class="nav-link" href="#" data-toggle="dropdown">
                  <i class="mdi mdi-forum"></i>
                  <span class="notification hertbit"></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right message-list animated flipInY nicescroll-box">

                  <div class="dropdown-header">
                      <strong>Messages</strong>
                      <span class="badge badge-pill badge-theme pull-right"> new 15</span>
                  </div>
                  <!-- end dropdown-header -->
                  <div class="wrap">

                      <a href="#" class="dropdown-item">
                          <div class="message-box">
                              <div class="u-img">
                                  <img src="http://via.placeholder.com/100x100" alt="user" />
                                  <span class="notification online"></span>
                              </div>
                              <!-- end u-img -->
                              <div class="u-text">
                                  <div class="u-name">
                                      <strong>Natalie Wall</strong>
                                  </div>
                                  <p class="text-muted">Anyways i would like just do it</p>
                                  <small>2 minuts ago</small>
                              </div>
                              <!-- end u-text -->
                          </div>
                          <!-- end message-box -->
                      </a>
                      <!-- end dropdown-item -->

                      <a href="#" class="dropdown-item">
                          <div class="message-box">
                              <div class="u-img">
                                  <img src="http://via.placeholder.com/100x100" alt="user" />
                                  <span class="notification offline"></span>
                              </div>
                              <!-- end u-img -->
                              <div class="u-text">
                                  <div class="u-name">
                                      <strong>Steve johns</strong>
                                  </div>
                                  <p class="text-muted">There is Problem inside the Application</p>
                                  <small>10 minuts ago</small>
                              </div>
                              <!-- end u-text -->
                          </div>
                          <!-- end message-box -->
                      </a>
                      <!-- end dropdown-item -->

                      <a href="#" class="dropdown-item">
                          <div class="message-box">
                              <div class="u-img">
                                  <img src="http://via.placeholder.com/100x100" alt="user" />
                                  <span class="notification buzy"></span>
                              </div>
                              <!-- end u-img -->
                              <div class="u-text">
                                  <div class="u-name">
                                      <strong>Taniya Jan</strong>
                                  </div>
                                  <p class="text-muted">Please Checkout The Attachment</p>
                                  <small>30 minuts ago</small>
                              </div>
                              <!-- end u-text -->
                          </div>
                          <!-- end message-box -->
                      </a>
                      <!-- end dropdown-item -->

                      <a href="#" class="dropdown-item">
                          <div class="message-box">
                              <div class="u-img">
                                  <img src="http://via.placeholder.com/100x100" alt="user" />
                                  <span class="notification away"></span>
                              </div>
                              <!-- end u-img -->
                              <div class="u-text">
                                  <div class="u-name">
                                      <strong>Tim Johns</strong>
                                  </div>
                                  <!-- end u-name -->
                                  <p class="text-muted">Anyways i would like just do it</p>
                                  <small>32 minuts ago</small>
                              </div>
                              <!-- end u-text -->
                          </div>
                          <!-- end message-box -->
                      </a>
                      <!-- end dropdown-item -->
                  </div>
                  <!-- end wrap -->
                  <div class="dropdown-footer ">
                      <a href="">
                          <strong>See all messages (150) </strong>
                      </a>
                  </div>
                  <!-- end dropdown-footer -->
              </div>
              <!-- end message-list -->
          </li>
          <!-- end nav-item -->


          <li class="nav-item ">
              <a class="nav-link" href="#" data-toggle="dropdown">
                  <i class="mdi mdi-cards"></i>
                  <span class="notification hertbit"></span>
              </a>
              <!-- end navlink -->
              <div class="dropdown-menu dropdown-menu-right task-list animated flipInY nicescroll-box">

                  <div class="dropdown-header">
                      <strong>Task List</strong>
                      <span class="badge badge-pill badge-theme pull-right"> new 3</span>
                  </div>
                  <!-- end dropdown-header -->
                  <div class="wrap">
                      <a href="#" class="dropdown-item">
                          <strong>Task 1</strong>
                          <small class="pull-right">50% Complete</small>
                          <div class="progress xs">
                              <div class="progress-bar bg-danger" style="width: 50%" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">

                              </div>
                          </div>
                      </a>
                      <!-- end dropdown-item -->

                      <a href="#" class="dropdown-item">
                          <strong>Task 2</strong>
                          <small class="pull-right">20% Complete</small>

                          <div class="progress xs">
                              <div class="progress-bar bg-success" style="width: 20%" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">

                              </div>
                          </div>
                      </a>

                      <!-- end dropdown-item -->
                      <a href="#" class="dropdown-item">
                          <strong>Task 3</strong>
                          <small class="pull-right">80% Complete</small>

                          <div class="progress xs ">
                              <div class="progress-bar bg-warning" style="width: 80%" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">

                              </div>
                          </div>
                      </a>
                      <!-- end dropdown-item -->

                      <a href="#" class="dropdown-item">
                          <strong>Task 4</strong>
                          <small class="pull-right">60% Complete</small>

                          <div class="progress xs ">
                              <div class="progress-bar bg-info" style="width: 60%" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">

                              </div>
                          </div>
                      </a>
                      <!-- end dropdown-item -->
                  </div>
                  <!-- end wrap -->
                  <div class="dropdown-footer ">
                      <a href="">
                          <strong>view all task (20) </strong>
                      </a>
                  </div>
                  <!-- end dropdown-footer -->

              </div>
              <!-- dropdown-menu -->
          </li>
          <!-- end navitem -->

          <li class="nav-item dropdown">
              <a class="btn btn-round btn-theme btn-sm" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">

                  <span class="">{{ Auth::user()->username }}
                      <i class="fa fa-arrow-down"></i>
                  </span>
              </a>
              <div class="dropdown-menu dropdown-menu-right user-menu animated flipInY ">
                  <div class="wrap">
                      <div class="dw-user-box">
                          <div class="u-img">
                              <img src="http://via.placeholder.com/100x100" alt="user" />
                          </div>
                          <div class="u-text">
                          <h5>{{ Auth::user()->username }}</h5>
                          <p class="text-muted">{{ Auth::user()->email }}</p>
                              <a href="#" class="btn btn-round btn-theme btn-sm">View Profile</a>
                          </div>
                      </div>
                      <!-- end dw-user-box -->

                      <a class="dropdown-item" href="#">
                          <i class="fa fa-user"></i> Profile</a>
                      <a class="dropdown-item" href="#">
                          <i class="fa fa-wrench"></i> Settings</a>

                      <div class="divider"></div>

                      <a class="dropdown-item" href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                          <i class="fa fa-lock"></i> {{ __('Logout') }}</a>
                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                  </div>
                  <!-- end wrap -->
              </div>
              <!-- end dropdown-menu -->
          </li>
          <!-- end nav-item -->
      </ul>
        <div class="hamburger hamburger--arrowalt-r navbar-toggler aside-menu-toggler ">
            <div class="hamburger-box">
                <div class="hamburger-inner"></div>
            </div>
        </div>
    </header>
    <!-- end header -->

    <div class="app-body">
        <div class="sidebar" id="sidebar">
            <nav class="sidebar-nav" id="sidebar-nav-scroller">
                <ul class="nav">
                    <li class="nav-item nav-dropdown">
                        <a class="nav-link nav-dropdown-toggle" href="{{ route('dashboard.index') }}">
                          <i class="mdi mdi-gauge"></i> Dashboard
                        </a>
                    </li>

                    <li class="nav-item nav-dropdown">
                      <a href="#" class="nav-link nav-dropdown-toggle">
                        <i class="mdi mdi-account-check"></i>ATTENDANCE
                      </a>
                        <ul class="nav-dropdown-items">
                          <li class="nav-item">
                            <a href="{{ route('attendance.index') }}" class="nav-link">List</a>
                          </li>
                          <li class="nav-item">
                            <a href="{{ route('attendance.create') }}" class="nav-link">Mark Attendance</a>
                          </li>
                        </ul>
                    </li>
                    <li class="nav-item nav-dropdown">
                        <a href="{{ route('mark.index') }}" class="nav-link nav-dropdown-toggle">
                            <i class="mdi mdi-account-check"></i>MARKS
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        <!-- end sidebar -->

        <main class="main">
            @yield('content')

        </main>
        <!-- end main -->

    </div>
    <!-- end app-body -->



    <footer class="app-footer">
    <a href="{{ route('student') }}" class="text-theme">Student Management System</a> © 2019 Flavie DT.
        <span class="float-right">Powered by
            <a href="#" class="text-theme">Flavie DT.</a>
        </span>
    </footer>


    <!-- Bootstrap and necessary plugins -->
    <script src="/libs/jquery/dist/jquery.min.js"></script>
    <script src="/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="/libs/bootstrap/bootstrap.min.js"></script>
    <script src="/libs/PACE/pace.min.js"></script>
    <script src="/libs/chart.js/dist/Chart.min.js"></script>
    <script src="/libs/nicescroll/jquery.nicescroll.min.js"></script>

    @yield('script')

    <!-- octadmin Main Script -->
    <script src="/js/app.js"></script>

</body>

</html>
