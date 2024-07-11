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
                                <div class="mb-3 card">

                                    <div class="card-header-tab card-header-tab-animation card-header">
                                        <div class="card-header-title">
                                            <i class="header-icon lnr-apartment icon-gradient bg-love-kiss"> </i>
                                            PARTY SEARCH
                                        </div>

                                    </div>
                                    <div class="card-body">
                                        <div class="tab-content">
                                            <form action="{{url('/party-type-search')}}" method="get">
                                                <div class="row">
                                                    <div class="col-md-7">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" name="search" id=""
                                                                aria-describedby="helpId" placeholder="Name">
                                                        </div>

                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <select class="form-control" name="type" id="">
                                                                <option value="10">Show 10 Results</option>
                                                                <option value="20">Show 20 Results</option>
                                                                <option value="30">Show 30 Results</option>
                                                                <option value="0">Show all</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <button type="submit" class="btn btn-outline-primary"
                                                            style="width:100%;height:40px;"><i class="fa fa-search"
                                                                aria-hidden="true"></i>&nbsp; Search</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">

                                    <div class="card-header-tab card-header-tab-animation card-header">
                                        <div class="card-header-title">
                                            <i class="header-icon lnr-apartment icon-gradient bg-love-kiss"> </i>
                                            LIST
                                        </div>

                                    </div>

                                    <div class="tab-content">
                                        <div class="row">
                                            <div class="col-md-12">

                                                <div class="main-card mb-3 card">
                                                    <div class="card-body">
                                                        <table class="mb-0 table table-borderless">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>Labour Type Name</th>
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody style="font-size:12px;">
                                                                <?php $c = 1; ?>
                                                                @foreach($labour_type as $item)
                                                                <?php //echo $item->party_name;?>
                                                                <tr>
                                                                    <th scope="row">{{$item->id}}</th>
                                                                    <td><a href="{{url('/labour_type/edit/'.$item->id)}}"
                                                                            data-toggle="tooltip"
                                                                            title="{{@$item->name}} ( click to edit )">{{@$item->name}}
                                                                            </a></td>
                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                        @if($value ?? '' == 1)
                                                        {{@$labour_type->links()}}
                                                        @endif
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
        
</body>

</html>