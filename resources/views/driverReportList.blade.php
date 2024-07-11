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
                    <div class="col-md-12" style="">
                        <div class="main-card mb-3 card">
                            <div class="card-header text-dark">Report Driver / Helper
                                <div class="btn-actions-pane-right">
                                    <div role="group" class="btn-group-sm btn-group">
                                        <form action="{{url('driver/report/generate')}}">
                                            <input type="hidden" name="from_date" value="{{$from_date}}">
                                            <input type="hidden" name="to_date" value="{{$to_date}}">
                                            <button class="active btn bg-danger text-light" type="submit">PRINT PDF</button>
                                        </form>
                                        {{-- <button class="btn btn-focus">All Month</button> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive" style="overflow: scroll">
                                <table class="align-middle mb-0 table-sm table-hover" style="width: 300%;">
                                    <thead class="thead-dark" style="border: 1px solid black;">
                                        <tr style="border: 1px solid black;">
                                            <th class="text-center" style="width: 5%"></th>
                                            <th style="width:"></th>
                                            <th style="width:"></th>
                                            <th style="width:"></th>
                                            <th style="width:"></th>
                                            <th style="width:"></th>
                                            <th style="width:"></th>
                                            <th style="width:"></th>
                                            <th style="width:"></th>
                                            <th style="border: 1px solid black;" colspan="2"> Police Verification</th>
                                            <th style="width:"></th>
                                            <th style="border: 1px solid black;" colspan="2"> Driving Licance</th>
                                            <th style="width:"></th>
                                            <th style="width:"></th>
                                            <th style="width:"></th>
                                            <th style="border: 1px solid black;" colspan="2"> Training Valid</th>
                                            <th style="border: 1px solid black;" colspan="2"> Card Valid</th>
                                            <th style="width:"></th>
                                        </tr>
                                        <tr style="border: 1px solid black;">
                                            <th class="text-center" style="border: 1px solid black;5%">#</th>
                                            <th style="border: 1px solid black;">Issue Date</th>
                                            <th style="border: 1px solid black;">Card No</th>
                                            <th style="border: 1px solid black;">Aadhar</th>
                                            <th style="border: 1px solid black;">Name</th>
                                            <th style="border: 1px solid black;">DOB</th>
                                            <th style="border: 1px solid black;">Designations</th>
                                            <th style="border: 1px solid black;"> Fathers Name</th>
                                            <th style="border: 1px solid black;"> Address</th>
                                            <th style="border: 1px solid black;" colspan="1">Number</th>
                                            <th style="border: 1px solid black;" colspan="1">Date</th>
                                            <th style="border: 1px solid black;"> Police Station</th>
                                            <th style="border: 1px solid black;" colspan="1">Number</th>
                                            <th style="border: 1px solid black;" colspan="1">Valid up to</th>
                                            <th style="border: 1px solid black;"> Blood Group</th>
                                            <th style="border: 1px solid black;"> HIV TEST</th>
                                            <th style="border: 1px solid black;"> Eye Test</th>
                                            <th style="border: 1px solid black;" colspan="1">From</th>
                                            <th style="border: 1px solid black;" colspan="1">To</th>
                                            <th style="border: 1px solid black;" colspan="1">From</th>
                                            <th style="border: 1px solid black;" colspan="1">To</th>
                                            <th style="border: 1px solid black;"> No of Renewal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($truck_data as $key => $item)

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
                                            <td class="">
                                                {{date('d-m-Y',strtotime(@$item->yob))}}
                                            </td>
                                            <td class="">
                                                {{@$item->type}}
                                            </td>
                                            <td class="">
                                                {{@$item->fathers_name}}
                                            </td>
                                            <td class="">
                                                {{@$item->house}}
                                            </td>
                                            <td class="">
                                                {{@$item->ref}}
                                            </td>
                                            <td class="">
                                                {{date('d-m-Y',strtotime(@$item->valid_from))}}
                                            </td>
                                            <td class="">
                                                {{@$item->police_station}}
                                            </td>
                                            <td class="">
                                                {{@$item->dl_no}}
                                            </td>
                                            <td class="">
                                                {{date('d-m-Y',strtotime(@$item->issue_date))}}
                                            </td>
                                            <td class="">
                                                {{@$item->blood_group}}
                                            </td>
                                            <td class="">
                                                {{@$item->hiv_test}}
                                            </td>
                                            <td class="">
                                                {{@$item->eye_sight}}
                                            </td>
                                            <td class="">
                                                {{date('d-m-Y',strtotime(@$item->valid_from_training))}}
                                            </td>
                                            <td class="">
                                                {{date('d-m-Y',strtotime(@$item->valid_to_training))}}
                                            </td>
                                            <td class="">
                                                {{date('d-m-Y',strtotime(@$item->card_valid_from))}}
                                            </td>
                                            <td class="">
                                                {{date('d-m-Y',strtotime(@$item->card_valid_to))}}
                                            </td>
                                            <td class="">
                                                {{@$item->renual_count}}
                                            </td>

                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @if($value ?? '' == 1)
                                {{@$truck_data->links()}}
                                @endif
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</body>