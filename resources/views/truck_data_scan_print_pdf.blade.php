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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

        @include('script&css')

    <style>
        @font-face {
            font-family: 'Kruti Dev 010';
            src: url('{{url("../public/assets/fonts/KrutiDev010.woff2")}}') format('woff2'),
            url('{{url("../public/assets/fonts/KrutiDev010.woff")}}') format('woff');
            font-weight: normal;
            font-style: normal;
            font-display: swap;
        }

        .KrutiDev_hindi_text {
            font-family: 'Kruti Dev 010';
            font-weight: normal;
            font-style: normal;
        }

        .page {
            width: 21cm;
            min-height: 29.7cm;
            padding: 2cm;
            margin: 1cm auto;
            border: 1px #D3D3D3 solid;
            border-radius: 5px;
            background: white;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        .subpage {
            padding: 1cm;
            border: 5px red solid;
            height: 237mm;
            outline: 2cm white solid;
        }

        @page {
            size: A4;
            margin: 0;
        }

        @media print {
            .page {
                margin: 0;
                border: initial;
                border-radius: initial;
                width: initial;
                min-height: initial;
                box-shadow: initial;
                background: initial;
                page-break-after: always;
            }
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
                            {{-- <div class="mb-3 card">
                                <div class="card-header-tab card-header-tab-animation card-header">
                                    <div class="card-header-title">
                                        <i class="header-icon lnr-apartment icon-gradient bg-love-kiss"> </i>

                                    </div>
                                    <style>
                                        #my_camera_snap {
                                            -webkit-transform: scaleX(-1);
                                            transform: scaleX(-1);
                                        }
                                    </style>
                                    <div class="card-body">
                                        <div class="tab-content">
                                            <div class="row">
                                                <div class="col-md-12">

                                                    <div class="row">
                                                    @include('precess_stage_driver_helper')
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div> --}}
                            <!-- <div class="col-md-12" id="input_part" style="display: none"> -->
                            <form method="POST" novalidate id="registervalidation" role="form"
                                enctype="multipart/form-data"
                                action="{{url('/truck/data/image/upload/'.$truck_data->id)}}">
                                @csrf
                                <div class="col-md-12" id="input_part">
                                    <div class="mb-3 card">
                                        <div class="card-header-tab card-header-tab-animation card-header"
                                            style="background-color: #F79646">
                                            <div class="card-header-title text-light" style="font-size:18px">
                                                <i class="header-icon lnr-apartment icon-gradient bg-love-kiss"> </i>
                                                Print / Download PDF
                                            </div>
                                            <span> <a style="text-decoration:none" href="{{url('/truck/data/update/file/upload/section/'.$truck_data->id)}}">&nbsp;&nbsp;&nbsp;<i class="fa fa-angle-left" aria-hidden="true"></i>  Back</a> </span>

                                        </div>
                                        <div class="card-body">
                                            <div class="tab-content">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-6 mt-5">
                                                                <a href="#" onclick="printDiv('printableArea')"
                                                                    class="btn btn-danger"> <i class="fa fa-file-pdf"
                                                                        aria-hidden="true"></i>
                                                                    &nbsp;PRINT / DOWNLOAD</a>

                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body" style="display:block">
                                            <div class="tab-content">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-12 mt-5">
                                                                <center id="printableArea">

                                                                    <div class=""
                                                                        style="width:21cm; padding-left: 20px; min-height:, padding-right: 20px; padding-top: 20px">
                                                                        <table width="100%" style="">
                                                                            <!--  -->
                                                                            <tr>
                                                                                <td style="width: 400px">
                                                                                    <table width="100%" cellspacing="0"
                                                                                        style="border: 1px solid black;background-color:#FF6B2B;color: black;font-size:10px; padding: 0px; border-spacing: 0;border-collapse: collapse;">
                                                                                        <tr>
                                                                                            <th ><img src="{{url('files/iocl lOGO.jpg')}}"
                                                                                                    alt="Logo"
                                                                                                    style="width:70px; height: 70px;padding-left: 10px;position: absolute;top: 43px;">
                                                                                            </th>
                                                                                            <th
                                                                                                style="text-align:center">
                                                                                                <p><u
                                                                                                        class="KrutiDev_hindi_text">bafM;u
                                                                                                        v‚;y
                                                                                                        d‚j~iksZjs'ku
                                                                                                        fyfeVsM</u>
                                                                                                    <br>
                                                                                                    <b>Indian Oil
                                                                                                        Corporation
                                                                                                        Limited</b>
                                                                                                    <br>
                                                                                                    <span
                                                                                                        class="KrutiDev_hindi_text">¼foi.ku
                                                                                                        çHkkx½</span>
                                                                                                    <span>( Marketing
                                                                                                        Division)</span>
                                                                                                    <br>
                                                                                                    <span
                                                                                                        class="KrutiDev_hindi_text">¼tkjh
                                                                                                        djus dh
                                                                                                        frfFk%½</span>
                                                                                                    <span style="font-size: 8.5px">Date of issue
                                                                                                        {{date('d-m-Y',strtotime($truck_data->recipent_date))}}</span>
                                                                                                    <br>
                                                                                                    <span
                                                                                                        class="KrutiDev_hindi_text">oS/krk%½</span>
                                                                                                    <span>Validity
                                                                                                        Till</span>
                                                                                                    <span> {{date('d-m-Y',strtotime($truck_data->valid_up_to))}}</span>
                                                                                                    <br>
                                                                                                    <span
                                                                                                        class="KrutiDev_hindi_text">¼la[;k
                                                                                                        %½</span>
                                                                                                    <span>S.No.
                                                                                                    {{$truck_data->card_number}}</span>
                                                                                                    <br>
                                                                                                    <center>
                                                                                                        <div
                                                                                                            style="width:100px;padding: 1px; color: blue; border: 1px solid black; background-color: white;">
                                                                                                            DRIVER</div>
                                                                                                    </center>
                                                                                                </p>

                                                                                            </th>
                                                                                            <th style="width: 100px">
                                                                                                &nbsp;
                                                                                            </th>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>
                                                                                                @if(@$truck_data->upload_photo_documents)
                                                                                                    <img src="{{url('files/'.@$truck_data->upload_photo_documents)}}"
                                                                                                        alt="Logo"
                                                                                                        style="max-width:90px;margin-left: 10px; max-height: 80px, height: 50%;">
                                                                                                @else
                                                                                                    <img src="{{url('files/1642441947.png')}}"
                                                                                                        alt="Logo"
                                                                                                        style="max-width:90px;margin-left: 10px; max-height: 80px, height: 50%;">
                                                                                                @endif
                                                                                            </td>
                                                                                            <td>
                                                                                                <span
                                                                                                    class="KrutiDev_hindi_text">¼uke%½</span>
                                                                                                <span>Name {{$truck_data->full_name}}</span>
                                                                                                <br>
                                                                                                <span
                                                                                                    class="KrutiDev_hindi_text">¼fu;ksäk%½</span>
                                                                                                <span>Employer AUTO
                                                                                                    ENGINEERS SERVICE
                                                                                                    CENTRE</span>
                                                                                                <br>
                                                                                                <span
                                                                                                    class="KrutiDev_hindi_text">¼VhVh
                                                                                                    la[;k%½</span>
                                                                                                <span>TT No
                                                                                                {{$party_wise_tt->truck_no}}</span>
                                                                                                <br>
                                                                                                <span
                                                                                                    class="KrutiDev_hindi_text">¼vuqefrr%
                                                                                                    fpÙkkSM+x<+ VfeZuy
                                                                                                        ½</span> <br>
                                                                                                        <span>PERMITED
                                                                                                            INSIDE:
                                                                                                            Chittorgarh
                                                                                                            Terminal</span>

                                                                                            </td>
                                                                                            <td>&nbsp;</td>

                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td
                                                                                                style="text-align: center">
                                                                                                <p> <u
                                                                                                        class="KrutiDev_hindi_text">
                                                                                                        ¼/kkjd ds gLrk{kj½
                                                                                                    </u> <br> Signature of Holder</p>
                                                                                            </td>
                                                                                            <td
                                                                                                style="text-align: center">
                                                                                                <p> <u
                                                                                                        class="KrutiDev_hindi_text">
                                                                                                        ¼fu;ksäk ds gLrk{kj½ </u>
                                                                                                    <br>
                                                                                                    Signature of Contractor
                                                                                                </p>
                                                                                            </td>
                                                                                            <td style="text-align: left"
                                                                                                style="">
                                                                                                <p> <u
                                                                                                        class="KrutiDev_hindi_text">
                                                                                                        ¼tkjhdrkZ ds gLrk{kj½ </u> <br>
                                                                                                        Signature Issuing
                                                                                                </p>
                                                                                            </td>
                                                                                        </tr>

                                                                                    </table>
                                                                                </td>
                                                                                <td width="400px" style="position: absolute;">
                                                                                    <table width="100%" cellspacing="0"
                                                                                        style="min-height: 295px;border: 1px solid black;color: black;font-size:10px; padding: 0px; border-spacing: 0;border-collapse: collapse;">
                                                                                        <tr>
                                                                                            <th
                                                                                                style="text-align:center">
                                                                                                <p><span
                                                                                                        class="KrutiDev_hindi_text">
                                                                                                        bl igpku ds dkMZ
                                                                                                        /kkjd uhps ukfer
                                                                                                        fu;ksäk ds ,d
                                                                                                        deZpkjh
                                                                                                        gSA laLFkk esa
                                                                                                        ços'k dh vuqefr
                                                                                                        nh tkrh gSA
                                                                                                    </span>
                                                                                                    <br>
                                                                                                    <b>THE HOLDER OF
                                                                                                        THIS IDENTITY
                                                                                                        CARD IS AN
                                                                                                        EMPLOYEE
                                                                                                        OF THE
                                                                                                        CONTRACTOR AS
                                                                                                        NAME BELOW. MAY
                                                                                                        KINDLY BE
                                                                                                        PERMITTED ENTRY
                                                                                                        INTO THE
                                                                                                        LOCATION</b>
                                                                                                    <br>
                                                                                                </p>

                                                                                            </th>
                                                                                            
                                                                                        </tr>
                                                                                        <tr>
                                                                                            
                                                                                            <td>
                                                                                                <span class="KrutiDev_hindi_text" style="font-size:15px">¼uke vkSj fu;ksäk ds gLrk{kj ½</span>
                                                                                                <br>
                                                                                                <span>NAME & SIGNATURE OF CONTRACTOR ---- ---- ---- ---- ----</span>
                                                                                                <br>
                                                                                                <span class="KrutiDev_hindi_text" style="font-size:14px">¼irk ½</span> <span>---- ---- ---- ---- ---- ---- ---- ---- ---- ---- ---- ---- ---- ---- ---- ---- ---- ---</span>
                                                                                                <br>
                                                                                                <span >ADDRESS  ---- ---- ---- ---- ---- ---- ---- ---- ---- ---- ---- ---- ----</span>
                                                                                                <span > ---- ---- ---- ---- ---- ---- ---- ---- ---- ---- ---- ---- ---- ---- ---- ---- ---- ----</span>
                                                                                                <span > ---- ---- ---- ---- ---- ---- ---- ---- --- ---- ---- ---- ---- ---- ---- ---- ----</span>
                                                                                                <span > ---- ---- ---- ---- ---- ---- ---- ---- --- ---- ---- ---- ---- ---- ---- ---- ----</span>
                                                                                                <span > ---- ---- ---- ---- ---- ---- ---- ---- --- ---- ---- ---- ---- ---- ---- ---- ----</span>
                                                                                                <span > ---- ---- ---- ---- ---- ---- ---- ---- --- ---- ---- ---- ---- ---- ---- ---- ----</span>
                                                                                                <span > ---- ---- ---- ---- ---- ---- ---- ---- --- ---- ---- ---- ---- ---- ---- ---- ----</span>
                                                                                                <span > ---- ---- ---- ---- ---- ---- ---- ---- --- ---- ---- ---- ---- ---- ---- ---- ----</span>
                                                                                                <span > ---- ---- ---- ---- ---- ---- ---- ---- --- ---- ---- ---- ---- ---- ---- ---- ----</span>
                                                                                                <span > ---- ---- ---- ---- ---- ---- ---- ---- --- ---- ---- ---- ---- ---- ---- ---- ----</span>
                                                                                                

                                                                                            </td>

                                                                                        </tr>
                                                                                        

                                                                                    </table>
                                                                                </td>

                                                                            </tr>

                                                                        </table>


                                                                    </div>
                                                                </center>

                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

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
    <!--<script src="http://maps.google.com/maps/api/js?sensor=true"></script>-->
    </div>
    </div>
    <script>
        function printDiv(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();
            location.reload();
            document.body.innerHTML = originalContents;

        }
    </script>
</body>


</html>