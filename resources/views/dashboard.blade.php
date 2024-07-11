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

        .add-padding-left {
            padding-left: 50px;
        }

        .table-hover tbody tr:hover {
            background-color: #f7964600;
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

                    <div class="col-md-6 col-xl-4">
                        <div class="card mb-3 widget-content bg-primary">
                            <div class="widget-content-wrapper text-white">
                                <div class="widget-content-left">
                                    <i class="fa fa-truck" aria-hidden="true"></i>
                                    <div class="widget-heading">Driver / Helper</div>
                                    <div class="widget-subheading">Total</div>
                                </div>
                                <div class="widget-content-right add-padding-left">
                                    <div class="widget-numbers text-white"><span>{{$truck_data}}</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-4">
                        <div class="card mb-3 widget-content bg-success">
                            <div class="widget-content-wrapper text-white">
                                <div class="widget-content-left">
                                    <i class="fa fa-truck" aria-hidden="true"></i>
                                    <i class="fa fa-id-card" aria-hidden="true"></i>
                                    <div class="widget-heading">Permanent</div>
                                    <div class="widget-subheading">Cards</div>
                                </div>
                                <div class="widget-content-right add-padding-left">
                                    <div class="widget-numbers text-white"><span>{{$truck_data_Permanent}}</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-4">
                        <div class="card mb-3 widget-content bg-info">
                            <div class="widget-content-wrapper text-dark">
                                <div class="widget-content-left">
                                    <i class="fa fa-truck" aria-hidden="true"></i>
                                    <i class="fa fa-id-card" aria-hidden="true"></i>
                                    <div class="widget-heading">Temporary</div>
                                    <div class="widget-subheading">Cards</div>
                                </div>
                                <div class="widget-content-right add-padding-left">
                                    <div class="widget-numbers text-dark"><span>{{$truck_data_Temporary}}</span></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-xl-4">
                        <div class="card mb-3 widget-content bg-secondary">
                            <div class="widget-content-wrapper text-white">
                                <div class="widget-content-left">
                                    <i class="fa fa-users" aria-hidden="true"></i>
                                    <div class="widget-heading">Labour / Guard</div>
                                    <div class="widget-subheading">Total</div>
                                </div>
                                <div class="widget-content-right add-padding-left">
                                    <div class="widget-numbers text-white"><span>{{$labour_data}}</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-4">
                        <div class="card mb-3 widget-content bg-success">
                            <div class="widget-content-wrapper text-light">
                                <div class="widget-content-left">
                                    <i class="fa fa-users" aria-hidden="true"></i> 
                                    <i class="fa fa-id-card" aria-hidden="true"></i>
                                    <div class="widget-heading">Permanent</div>
                                    <div class="widget-subheading">Cards</div>
                                </div>
                                <div class="widget-content-right add-padding-left">
                                    <div class="widget-numbers text-light"><span>{{$labour_data_Permanent}}</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-4">
                        <div class="card mb-3 widget-content bg-info">
                            <div class="widget-content-wrapper text-dark">
                                <div class="widget-content-left">
                                    <i class="fa fa-users" aria-hidden="true"></i> 
                                    <i class="fa fa-id-card" aria-hidden="true"></i>
                                    <div class="widget-heading">Temporary</div>
                                    <div class="widget-subheading">Cards</div>
                                </div>
                                <div class="widget-content-right add-padding-left">
                                    <div class="widget-numbers text-dark"><span>{{$labour_data_Temporary}}</span></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-xl-4">
                        <div class="card mb-3 widget-content bg-danger">
                            <div class="widget-content-wrapper text-white">
                                <div class="widget-content-left">
                                    <i class="fa fa-users" aria-hidden="true"></i> 
                                    <i class="fa fa-truck" aria-hidden="true"></i>

                                    <i class="fa fa-clipboard" aria-hidden="true"></i>
                                    <div class="widget-heading">Black List</div>
                                    <div class="widget-subheading">Card</div>
                                </div>
                                <div class="widget-content-right add-padding-left">
                                    <div class="widget-numbers text-white"><span>{{$blacklist}}</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-4">
                        <div class="card mb-3 widget-content bg-warning">
                            <div class="widget-content-wrapper text-dark">
                                <div class="widget-content-left">
                                    <i class="fa fa-truck" aria-hidden="true"></i>
                                    <i class="fa fa-recycle" aria-hidden="true"></i>
                                    <div class="widget-heading">Renew Driver</div>
                                    <div class="widget-subheading">Cards</div>
                                </div>
                                <div class="widget-content-right add-padding-left">
                                    <div class="widget-numbers text-dark"><span>{{$RenewDriver}}</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-4">
                        <div class="card mb-3 widget-content bg-warning">
                            <div class="widget-content-wrapper text-dark">
                                <div class="widget-content-left">
                                    <i class="fa fa-users" aria-hidden="true"></i> 
                                    <i class="fa fa-recycle"aria-hidden="true"></i>
                                    <div class="widget-heading">Renew Labour</div>
                                    <div class="widget-subheading">Cards</div>
                                </div>
                                <div class="widget-content-right add-padding-left">
                                    <div class="widget-numbers text-dark"><span>{{$RenewLabour}}</span></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-xl-none d-lg-block col-md-6 col-xl-4">
                        <div class="card mb-3 widget-content bg-premium-dark">
                            <div class="widget-content-wrapper text-white">
                                <div class="widget-content-left">
                                    <div class="widget-heading">Products Sold</div>
                                    <div class="widget-subheading">Revenue streams</div>
                                </div>
                                <div class="widget-content-right">
                                    <div class="widget-numbers text-warning"><span>$14M</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12" style="max-height: 500px;overflow: scroll;">
                        <div class="main-card mb-3 card">
                            <div class="card-header text-dark">Issued in last 7 days Driver / Helper
                                <div class="btn-actions-pane-right">
                                    <div role="group" class="btn-group-sm btn-group">
                                        <button class="active btn btn-focus">Last 7 days</button>
                                        {{-- <button class="btn btn-focus">All Month</button> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="align-middle mb-0 table table-borderless table table-hover">
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="width: 5%">#</th>
                                            <th style="width: 10%">Issue Date</th>
                                            <th style="width: 15%">Card No</th>
                                            <th style="width: 15%">Aadhar</th>
                                            <th style="width: 20%">Name</th>
                                            <th class="text-center">Valid Up To</th>
                                            <th class="text-center">Card Type</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($issuedInLastweekDriver as $key => $item)

                                        <tr>
                                            <td class="text-center text-muted">#{{$key + 1}}</td>
                                            <td>
                                                {{date('d-m-Y',strtotime(@$item->issue_date))}}
                                            </td>
                                            <td>{{@$item->card_number}}</td>
                                            <td>
                                                <a href="{{url('/truck/data/scan/edit/'.$item->id)}}"
                                                    data-toggle="tooltip"
                                                    title="{{@$item->adhar_no}} ( click to edit )">{{substr(@$item->adhar_no, 0, 20)}}
                                                    ..</a>
                                            </td>
                                            <td>
                                                <div class="widget-content p-0">
                                                    <div class="widget-content-wrapper">
                                                        <div class="widget-content-left me-3">
                                                            <div class="widget-content-left">
                                                                @if($item->upload_photo_documents)
                                                                <img width="40" height="40" class="rounded-circle"
                                                                    src="{{url('../public/files/'.$item->upload_photo_documents)}}"
                                                                    alt="">
                                                                @else
                                                                <img width="40" height="40" class="rounded-circle"
                                                                    src="{{url('../public/files/1642441947.png')}}"
                                                                    alt="">
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="widget-content-left">
                                                            <div class="widget-heading">{{@$item->full_name}}</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <button type="button" id="PopoverCustomT-1"
                                                    class="btn btn-primary disabled btn-sm">{{date('d-m-Y',strtotime(@$item->valid_up_to))}}</button>
                                            </td>
                                            <td class="text-center">
                                                @if(@$item->card_type == "Temporary")
                                                <button type="button" id="PopoverCustomT-1"
                                                    class="btn btn-info btn-sm">{{@$item->card_type}}</button>
                                                @else
                                                <button type="button" id="PopoverCustomT-1"
                                                    class="btn btn-success btn-sm">{{@$item->card_type}}</button>
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @if($value ?? '' == 1)
                                {{@$issuedInLastweekDriver->links()}}
                                @endif
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-12" style="max-height: 500px;overflow: scroll;">
                        <div class="main-card mb-3 card">
                            <div class="card-header text-dark">Issued in last 7 days Temporary Labour
                                <div class="btn-actions-pane-right">
                                    <div role="group" class="btn-group-sm btn-group">
                                        <button class="active btn btn-focus">Last 7 days</button>
                                        {{-- <button class="btn btn-focus">All Month</button> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="align-middle mb-0 table table-borderless table table-hover">
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="width: 5%">#</th>
                                            <th style="width: 10%">Issue Date</th>
                                            <th style="width: 15%">Card No</th>
                                            <th style="width: 15%">Aadhar</th>
                                            <th style="width: 20%">Name</th>
                                            <th class="text-center">Valid Up To</th>
                                            <th class="text-center">Card Type</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($issuedInLastweekHelper as $key => $item)

                                        <tr>
                                            <td class="text-center text-muted">#{{$key + 1}}</td>
                                            <td>
                                                {{date('d-m-Y',strtotime(@$item->issue_date))}}
                                            </td>
                                            <td>{{@$item->card_number}}</td>
                                            <td>
                                                <a href="{{url('/truck/data/scan/edit/'.$item->id)}}"
                                                    data-toggle="tooltip"
                                                    title="{{@$item->adhar_no}} ( click to edit )">{{substr(@$item->adhar_no, 0, 20)}}
                                                    ..</a>
                                            </td>
                                            <td>
                                                <div class="widget-content p-0">
                                                    <div class="widget-content-wrapper">
                                                        <div class="widget-content-left me-3">
                                                            <div class="widget-content-left">
                                                                @if($item->upload_photo_documents)
                                                                <img width="40" height="40" class="rounded-circle"
                                                                    src="{{url('../public/files/'.$item->upload_photo_documents)}}"
                                                                    alt="">
                                                                @else
                                                                <img width="40" height="40" class="rounded-circle"
                                                                    src="{{url('../public/files/1642441947.png')}}"
                                                                    alt="">
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="widget-content-left">
                                                            <div class="widget-heading">{{@$item->full_name}}</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <button type="button" id="PopoverCustomT-1"
                                                    class="btn btn-primary disabled btn-sm">{{date('d-m-Y',strtotime(@$item->valid_up_to))}}</button>
                                            </td>
                                            <td class="text-center">
                                                @if(@$item->card_type == "Temporary")
                                                <button type="button" id="PopoverCustomT-1"
                                                    class="btn btn-info btn-sm">{{@$item->card_type}}</button>
                                                @else
                                                <button type="button" id="PopoverCustomT-1"
                                                    class="btn btn-success btn-sm">{{@$item->card_type}}</button>
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @if($value ?? '' == 1)
                                {{@$issuedInLastweekHelper->links()}}
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</body>