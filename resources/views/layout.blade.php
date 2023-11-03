<!doctype html>
<html lang="en">


<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="{{ asset('images/icon.png') }}" type="image/png" />
    <!--plugins-->
    <link href="{{ asset('plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
    <link href="{{ asset('plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
    <link href="{{ asset('plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
    <!-- loader-->
    <link href="{{ asset('css/pace.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('js/pace.min.js') }}"></script>
    <!-- Bootstrap CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-extended.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/icons.css') }}" rel="stylesheet">
    <!-- Theme Style CSS -->
    <link rel="stylesheet" href="{{ asset('css/dark-theme.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/semi-dark.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/header-colors.css') }}" />

    <link href="{{ asset('plugins/select2/css/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('plugins/select2/css/select2-bootstrap4.css') }}" rel="stylesheet" />
    <title>Forewer Workers</title>
    <style>
        .popover__title {
            font-size: 12px;
            text-decoration: none;
            color: #0d6efd;
            text-align: center;
        }

        .popover__wrapper {
            position: relative;
            display: inline-block;
        }

        .popover__content {
            opacity: 0;
            visibility: hidden;
            position: absolute;
            left: -40px;
            transform: translate(0, 10px);
            background-color: #fcfcfc;
            padding: 1.5rem;
            box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.26);
            border-bottom: 2px solid #a1a1a1;

        }

        .popover__content:before {
            position: absolute;
            z-index: 100;
            right: calc(50% - 10px);
            top: -8px;
            border-style: solid;
            border-width: 0 10px 10px 10px;
            border-color: transparent transparent #bfbfbf transparent;
            transition-duration: 0.3s;
            transition-property: transform;
        }

        .popover__wrapper:hover .popover__content {
            z-index: 100;
            opacity: 1;
            visibility: visible;
            transform: translate(0, 0px);
            transition: all 0.5s cubic-bezier(0.75, -0.02, 0.2, 0.97);
        }
    </style>
</head>

<body>
    <!--wrapper-->
    <div class="wrapper">
        <!--sidebar wrapper -->
        <div class="sidebar-wrapper" data-simplebar="true">
            <div class="sidebar-header">
                <div>
                    <img src="{{ asset('images/icon.png') }}" style="width: 90%;height:auto;" class="logo-icon"
                        alt="logo icon">
                </div>

                <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
                </div>
            </div>
            <!--navigation-->
            <ul class="metismenu" id="menu">
                <li>
                    <a href="{{ route('dashboards') }}">
                        <div class="parent-icon"><i class='bx bx-home-circle'></i>
                        </div>
                        <div class="menu-title">Dashboard</div>
                    </a>

                </li>


                <li>
                    <a href="" class="has-arrow">
                        <div class="parent-icon"><i class="bx bx-category"></i>
                        </div>
                        <div class="menu-title">Masters</div>
                    </a>

                    <ul>
                        <li> <a href="{{ route('Master.location') }}"><i
                                    class="bx bx-right-arrow-alt"></i>Workplace/Location </a>
                        </li>
                        <li> <a href="{{ route('master.company') }}"><i class="bx bx-right-arrow-alt"></i>Company
                                Registration</a>
                        </li>
                        <li> <a href="{{ route('master.employee') }}"><i class="bx bx-right-arrow-alt"></i>Employee
                                Registration</a>
                        </li>
                        <li> <a href="{{ route('master.payoutpayrun') }}"><i
                                    class="bx bx-right-arrow-alt"></i>Payrun/Payout Type</a>
                        </li>

                    </ul>
                </li>


                <li>
                    <a href="#" class="has-arrow">
                        <div class="parent-icon"><i class="bx bx-detail"></i>
                        </div>
                        <div class="menu-title">Tax Master</div>
                    </a>
                    <ul>
                        <li> <a href="{{ route('taxmaster.fedralslab') }}"><i class="bx bx-right-arrow-alt"></i>Federal
                                Tax Slab</a>
                        </li>
                        <li> <a href="{{ route('taxmaster.provitialslab') }}"><i
                                    class="bx bx-right-arrow-alt"></i>Provintial Tax Slab</a>
                        </li>
                        <li> <a href="{{ route('taxmaster.fedralrebate') }}"><i class="bx bx-right-arrow-alt"></i>
                                Federal Tax Rebate</a>
                        </li>
                        <li> <a href="{{ route('taxmaster.othertax') }}"><i class="bx bx-right-arrow-alt"></i>Other
                            Taxes </a>
                    </li>
                      <li> <a href="{{ route('time-master') }}"><i class="bx bx-right-arrow-alt"></i>Time Master </a>
                </li>


                    </ul>
                </li>
                <li>
                    <a href="{{ route('assignjob') }}">
                        <div class="parent-icon"><i class='bx bx-list-ul'></i>
                        </div>
                        <div class="menu-title">Assign Job/Task</div>
                    </a>

                </li>
                <li>
                    <a href="{{ route('timesheet') }}">
                        <div class="parent-icon"><i class='bx bx-calendar'></i>
                        </div>
                        <div class="menu-title">Timesheet</div>
                    </a>

                </li>
                <li>
                    <a href="{{ route('payroll') }}">
                        <div class="parent-icon"><i class='bx bx-dollar-circle'></i>
                        </div>
                        <div class="menu-title">Payroll</div>
                    </a>

                </li>
                <!-- <li>
       <a href="payroll_setting.html">
        <div class="parent-icon"><i class='bx bx-credit-card-alt'></i>
        </div>
        <div class="menu-title">Payroll Settings</div>
       </a>
       
      </li> -->


            </ul>
            <!--end navigation-->
        </div>
        <!--end sidebar wrapper -->
        <!--start header -->
        <header>
            <div class="topbar d-flex align-items-center">
                <nav class="navbar navbar-expand">
                    <div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
                    </div>

                    <div class="top-menu ms-auto">
                        <ul class="navbar-nav align-items-center">
                            <li class="nav-item mobile-search-icon">
                                <!-- <a class="nav-link" href="#">	<i class='bx bx-search'></i>
        </a> -->
                            </li>

                            <li class="nav-item dropdown dropdown-large">
                                <!-- <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <span class="alert-count">5</span>
         <i class='bx bx-bell'></i>
        </a> -->
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="javascript:;">
                                        <div class="msg-header">
                                            <p class="msg-header-title">Notifications</p>
                                            <p class="msg-header-clear ms-auto">Marks all as read</p>
                                        </div>
                                    </a>
                                    <div class="header-notifications-list">
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="notify bg-light-primary text-primary"><i
                                                        class="bx bx-group"></i>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">New Customers<span
                                                            class="msg-time float-end">14 Sec
                                                            ago</span></h6>
                                                    <p class="msg-info">5 new user registered</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="notify bg-light-danger text-danger"><i
                                                        class="bx bx-cart-alt"></i>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">New Orders <span class="msg-time float-end">2
                                                            min
                                                            ago</span></h6>
                                                    <p class="msg-info">You have recived new orders</p>
                                                </div>
                                            </div>
                                        </a>

                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="notify bg-light-info text-info"><i
                                                        class="bx bx-home-circle"></i>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">New Product Approved <span
                                                            class="msg-time float-end">2 hrs ago</span></h6>
                                                    <p class="msg-info">Your new product has approved</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="notify bg-light-danger text-danger"><i
                                                        class="bx bx-message-detail"></i>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">New Comments <span
                                                            class="msg-time float-end">4
                                                            hrs
                                                            ago</span></h6>
                                                    <p class="msg-info">New customer comments recived</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="notify bg-light-success text-success"><i
                                                        class='bx bx-check-square'></i>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">Your item is shipped <span
                                                            class="msg-time float-end">5 hrs
                                                            ago</span></h6>
                                                    <p class="msg-info">Successfully shipped your item</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="notify bg-light-primary text-primary"><i
                                                        class='bx bx-user-pin'></i>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">New 24 authors<span
                                                            class="msg-time float-end">1 day
                                                            ago</span></h6>
                                                    <p class="msg-info">24 new authors joined last week</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="notify bg-light-warning text-warning"><i
                                                        class='bx bx-door-open'></i>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">Defense Alerts <span
                                                            class="msg-time float-end">2 weeks
                                                            ago</span></h6>
                                                    <p class="msg-info">45% less alerts last 4 weeks</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <a href="javascript:;">
                                        <div class="text-center msg-footer">View All Notifications</div>
                                    </a>
                                </div>
                            </li>
                            <li class="nav-item dropdown dropdown-large">
                                <!-- <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <span class="alert-count">3</span>
         <i class='bx bx-comment'></i>
        </a> -->
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="javascript:;">
                                        <div class="msg-header">
                                            <p class="msg-header-title">Messages</p>
                                            <p class="msg-header-clear ms-auto">Marks all as read</p>
                                        </div>
                                    </a>
                                    <div class="header-message-list">
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="user-online">
                                                    <img src="{{ asset('images/avatars/avatar-1.png') }}"
                                                        class="msg-avatar" alt="user avatar">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">Daisy Anderson <span
                                                            class="msg-time float-end">5 sec
                                                            ago</span></h6>
                                                    <p class="msg-info">Today all Task Completed</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="user-online">
                                                    <img src="{{ asset('images/avatars/avatar-2.png') }}"
                                                        class="msg-avatar" alt="user avatar">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">Althea Cabardo <span
                                                            class="msg-time float-end">14
                                                            min ago</span></h6>
                                                    <p class="msg-info">5 phone is still remaining.</p>
                                                </div>
                                            </div>
                                        </a>

                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="user-online">
                                                    <img src="{{ asset('images/avatars/avatar-9.png') }}"
                                                        class="msg-avatar" alt="user avatar">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">David Buckley <span
                                                            class="msg-time float-end">2 hrs
                                                            ago</span></h6>
                                                    <p class="msg-info">3 phone is ready to deployment</p>
                                                </div>
                                            </div>
                                        </a>

                                    </div>
                                    <a href="javascript:;">
                                        <div class="text-center msg-footer">View All Messages</div>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="user-box dropdown">
                        <a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret"
                            href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{ asset('images/avatars/avatar-1.png') }}" class="user-img"
                                alt="user avatar">
                            <div class="user-info ps-3">
                                <!-- <p class="user-name mb-0">Yash Pantawane</p> -->
                                <p class="designattion mb-0">Admin</p>
                            </div>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">

                            <li><a class="dropdown-item" href="javascript:;"><i
                                        class='bx bx-log-out-circle'></i><span>Logout</span></a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </header>
        <!--end header -->
        @yield('content')

        <!--start overlay-->
        <div class="overlay toggle-icon"></div>
        <!--end overlay-->
        <!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i
                class='bx bxs-up-arrow-alt'></i></a>
        <!--End Back To Top Button-->

        <!-- </div> -->



    </div>

    </div>




    <!--end wrapper-->
    <!--start switcher-->

    <!--end switcher-->
    <!-- Bootstrap JS -->
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <!--plugins-->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('plugins/simplebar/js/simplebar.min.js') }}"></script>
    <script src="{{ asset('plugins/metismenu/js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('js/table-datatable.js') }}"></script>
    <script src="https://cdn.datatables.net/fixedcolumns/4.2.2/js/dataTables.fixedColumns.min.js"></script>
    <script src="{{ asset('plugins/select2/js/select2.min.js') }}"></script>

    <script src="{{ asset('js/form-select2.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/jquery.validate.min.js" integrity="sha512-WMEKGZ7L5LWgaPeJtw9MBM4i5w5OSBlSjTjCtSnvFJGSVD26gE5+Td12qN5pvWXhuWaWcVwF++F7aqu9cvqP0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!--app JS-->
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        $(document).ready(function() {
            setTimeout(() => {
                $(".btn-alert-close").click();
            }, 5000);
            var table = $('#example').DataTable({

                scrollCollapse: true,
                paging: true,
                fixedColumns: {
                    leftColumns: 0,
                    right: 1
                }
            });

            $(document).on('change', '.paginate_length', function() {
                $(this).closest('form').submit();
            })

            $(document).on('click', '.reassign_model', function() {
                $("#exampleLargeModal").modal('show');
                $("#model_id").val($(this).attr('job_id'));
                $("#modal_date").val($(this).attr('date'));
                $("#modal_location_id").val($(this).attr('location_id'));
                $("#modal_company_id").val($(this).attr('company_id')).change();
                $("#modal_employee_id").val($(this).attr('employee_id')).change();
                $("#modal_job_title").val($(this).attr('job_title'));
                $("#modal_job_description").val($(this).attr('job_description'));

             


            })

            $(".single-select2").select2({
                dropdownParent: $("#exampleLargeModal")
            });
            $(".single-select3").select2({
                dropdownParent: $("#exampleLargeModal")
            });
            $(".single-select4").select2({
                dropdownParent: $("#exampleLargeModal")
            });
        });
    </script>


    @yield('js')
</body>


</html>
