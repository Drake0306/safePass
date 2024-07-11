<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">

    <title>E-SafePass System</title>
    <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--
    =========================================================
    * ArchitectUI HTML Theme Dashboard - v1.0.0
    =========================================================
    * Product Page: https://dashboardpack.com
    * Copyright 2019 DashboardPack (https://dashboardpack.com)
    * Licensed under MIT (https://github.com/DashboardPack/architectui-html-theme-free/blob/master/LICENSE)
    =========================================================
    * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
    -->
    @include('script&css')
    <style>
        div.app-container.app-theme-white.body-tabs-shadow.fixed-sidebar.fixed-header {
            /* font-size: 12px; */
        }
    </style>
</head>

<body>
    @include('header')
    <div class="app-main">
        @include('sidebar')
        <div class="app-main__outer">
            <div class="app-main__inner">

                <div class="row">
                    <div class="col-md-12 col-lg-12">

                        <div class="col-md-12">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3 card">
                                        <div class="card-header-tab card-header-tab-animation card-header" style="background-color: #F79646">
                                            <div class="card-header-title text-light">
                                                <i class="header-icon lnr-apartment icon-gradient bg-love-kiss">
                                                </i>
                                                Labour / Guard Report </div>

                                        </div>
                                        <div class="card-body">
                                            <div class="tab-content">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <form target="_blank" action="{{url('labour/report/generate/list')}}">
                                                            @csrf
                                                            <div class="row">
                                                                {{-- <div class="col-md-12">
                                                                        <h4>Personal Details</h4>
                                                                        <br>
                                                                    </div> --}}
                                                                <!-- Fields for entry-->

                                                                <div class="col-md-6">
                                                                    <div class="form-floating">
                                                                        <input type="date" class="form-control"
                                                                        id="from_date" name="from_date"
                                                                        aria-describedby="helpId" value=""
                                                                        placeholder="" required>
                                                                        <label for="from_date">From Date <b class="text-danger">*</b></label>
                                                                        
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div class="form-floating">
                                                                        <input type="date" class="form-control"
                                                                        id="to_date" name="to_date"
                                                                        aria-describedby="helpId" value=""
                                                                        placeholder="" required>
                                                                        <label for="to_date">To Date <b class="text-danger">*</b></label>
                                                                        
                                                                    </div>
                                                                </div>
                                                                {{-- <div class="col-md-12 mt-5">
                                                                    <div class="form-check">
                                                                        <label class="form-check-label">
                                                                            <input type="checkbox"
                                                                                class="form-check-input"
                                                                                name="valid_end_status" id=""
                                                                                value="checkedValue">
                                                                            Validation End Status Report ( 30 days
                                                                            before )
                                                                        </label>
                                                                    </div>
                                                                </div> --}}


                                                                <div class="col-md-12 mt-4">
                                                                    <hr>
                                                                </div>
                                                                <!-- Fields for entry End-->
                                                                <div class="col-md-8 mt-1">
                                                                    <button type="submit" id="next"
                                                                        class="btn btn-primary">Generate</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                </div>
                <!-- <div class="app-wrapper-footer">
                        <div class="app-footer">
                            <div class="app-footer__inner">
                                <div class="app-footer-left">
                                    <ul class="nav">
                                        <li class="nav-item">
                                            <a href="javascript:void(0);" class="nav-link">
                                                Footer Link 1
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="javascript:void(0);" class="nav-link">
                                                Footer Link 2
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="app-footer-right">
                                    <ul class="nav">
                                        <li class="nav-item">
                                            <a href="javascript:void(0);" class="nav-link">
                                                Footer Link 3
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="javascript:void(0);" class="nav-link">
                                                <div class="badge badge-success mr-1 ml-0">
                                                    <small>NEW</small>
                                                </div>
                                                Footer Link 4
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div> -->
            </div>
            <!--<script src="http://maps.google.com/maps/api/js?sensor=true"></script>-->
        </div>
    </div>
    <script>
        $('#user_role_name').keyup(function () {
            var user_role_name_non_tream = $('#user_role_name').val();
            var usr_role_trim = user_role_name_non_tream.trim();
            if (usr_role_trim == '') {
                $('#error').show(500);
            } else {
                $('#error').hide(500);
            }
        });
    </script>
</body>

</html>