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
                                                        @include('precess_stage_labour')
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
                                action="{{url('/truck/data/image/upload/'.$labour_data->id)}}">
                                @csrf
                                <div class="col-md-12" id="input_part">
                                    <div class="mb-3 card">
                                        <div class="card-header-tab card-header-tab-animation card-header"
                                            style="background-color: #F79646">
                                            <div class="card-header-title text-light" style="font-size:18px">
                                                <i class="header-icon lnr-apartment icon-gradient bg-love-kiss"> </i>
                                                Print / Download PDF
                                            </div>
                                            <span> <a style="text-decoration:none" href="{{url('/labour/data/image/upload/'.$labour_data->id)}}">&nbsp;&nbsp;&nbsp;<i class="fa fa-angle-left" aria-hidden="true"></i>  Back</a> </span>

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
                                        <div class="card-body">
                                            <div class="tab-content">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-12 mt-5">
                                                                <center id="printableArea">

                                                                    <div class=""
                                                                        style="width:21cm; padding-left: 20px; padding-right: 20px; padding-top: 20px">
                                                                        <table width="100%"
                                                                            style="border: 1px solid black">
                                                                            <!--  -->
                                                                            <tr>
                                                                                <td style="width: 400px">
                                                                                    <table width="100%" cellspacing="0"
                                                                                        style="font-size:10px; padding: 0px; border-spacing: 0;border-collapse: collapse;">
                                                                                        <tr>
                                                                                            <th>Image</th>
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
                                                                                                </p>
                                                                                                <p> <u
                                                                                                        class="KrutiDev_hindi_text">¼
                                                                                                        fpÙkkSM+x<+
                                                                                                            VfeZuy ½</u>
                                                                                                            &nbsp;
                                                                                                            Chittorgarh
                                                                                                            Terminal</p>
                                                                                                            <p>
                                                                                                            <u
                                                                                                                class="KrutiDev_hindi_text">¼
                                                                                                                vkxarqd
                                                                                                                izos'k
                                                                                                                irz
                                                                                                                ½</u>
                                                                                                            &nbsp;
                                                                                                            <u>Visitor's
                                                                                                                Pass</u>
                                                                                                </p>
                                                                                            </th>
                                                                                            <th style="width: 60px">
                                                                                                &nbsp;
                                                                                            </th>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td
                                                                                                style="border-spacing: 0;border-collapse: collapse;margin:0px">
                                                                                                <p> <u
                                                                                                        class="KrutiDev_hindi_text">
                                                                                                        ¼la[;k½ </u>
                                                                                                    &nbsp;
                                                                                                    Sr No. COR-1</p>
                                                                                            </td>
                                                                                            <td colspan="2"
                                                                                                style="text-align: right; margin:0px">
                                                                                                <p> <u
                                                                                                        class="KrutiDev_hindi_text">
                                                                                                        ¼ frfFk ½ </u>
                                                                                                    &nbsp; Date.
                                                                                                    December
                                                                                                    15, 2017 &nbsp;</p>
                                                                                            </td>

                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td colspan="2"
                                                                                                style="border-spacing: 0;border-collapse: collapse; margin:0px">
                                                                                                <p> <u
                                                                                                        class="KrutiDev_hindi_text">
                                                                                                        ¼uke½ </u>
                                                                                                    &nbsp;
                                                                                                    Name. PRANAV PANKAJ
                                                                                                    <br>
                                                                                                    <u
                                                                                                        class="KrutiDev_hindi_text">
                                                                                                        irk½ </u> &nbsp;
                                                                                                    Address. COMSYS IT
                                                                                                    DELH
                                                                                                    <br>
                                                                                                    <u
                                                                                                        class="KrutiDev_hindi_text">
                                                                                                        ¼Qksu½ </u>
                                                                                                    &nbsp;
                                                                                                    Phone. 9911331144
                                                                                                    <br>
                                                                                                    <u
                                                                                                        class="KrutiDev_hindi_text">
                                                                                                        xkgh la[;k½ </u>
                                                                                                    &nbsp; Vechile No:
                                                                                                    <br>
                                                                                                    <u
                                                                                                        class="KrutiDev_hindi_text">
                                                                                                        ¼feyus ckys
                                                                                                        C;fDr½
                                                                                                    </u> &nbsp; Person
                                                                                                    to
                                                                                                    meet: Finance
                                                                                                    <br>
                                                                                                    <u
                                                                                                        class="KrutiDev_hindi_text">
                                                                                                        ¼m}s";½ </u>
                                                                                                    &nbsp;
                                                                                                    Purpose. Official
                                                                                                    <br>
                                                                                                    <u
                                                                                                        class="KrutiDev_hindi_text">
                                                                                                        ¼C;fDr;ks dk
                                                                                                        la[;k½
                                                                                                    </u> &nbsp; No. of
                                                                                                    Persons: 1
                                                                                                    <br>
                                                                                                    <u
                                                                                                        class="KrutiDev_hindi_text">
                                                                                                        ços'k le;½ </u>
                                                                                                    &nbsp; In Time:
                                                                                                    12:38:05
                                                                                                    <br>
                                                                                                    <u
                                                                                                        class="KrutiDev_hindi_text">
                                                                                                        ckgj tkus dk
                                                                                                        le;½
                                                                                                    </u> &nbsp; Out
                                                                                                    time:
                                                                                                    12:38:05
                                                                                                </p>

                                                                                            </td>
                                                                                            <td rowspan="1">Image</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td colspan="1">
                                                                                                <p> <u
                                                                                                        class="KrutiDev_hindi_text">
                                                                                                        ¼ xkMZ dk
                                                                                                        gLrk{kj ½
                                                                                                    </u> <br> Signature
                                                                                                    of
                                                                                                    Security</p>
                                                                                            </td>
                                                                                            <td colspan="1">
                                                                                                <p> <u
                                                                                                        class="KrutiDev_hindi_text">
                                                                                                        ¼ vf/kdkjh dk
                                                                                                        gLrk{kj ½ </u>
                                                                                                    <br>
                                                                                                    Signature of officer
                                                                                                </p>
                                                                                            </td>
                                                                                            <td colspan="1"
                                                                                                style="width: 100px">
                                                                                                <p> <u
                                                                                                        class="KrutiDev_hindi_text">
                                                                                                        ¼ vkxarqd dk
                                                                                                        gLrk{kj
                                                                                                        ½ </u> <br>
                                                                                                    Signature of visitor
                                                                                                </p>
                                                                                            </td>
                                                                                        </tr>

                                                                                    </table>
                                                                                </td>
                                                                                <td style="border-left: 1px solid black"
                                                                                    width="400px">
                                                                                    <table width="100%"
                                                                                        style="font-size: 10px;">
                                                                                        <tr>
                                                                                            <th>
                                                                                                <p
                                                                                                    style="text-align:center">
                                                                                                    <u
                                                                                                        class="KrutiDev_hindi_text">egRoiq.kZ
                                                                                                        funsZ'k</u>
                                                                                                    <br>
                                                                                                    <u>IMPORTANT
                                                                                                        INSTRUCTION</u>
                                                                                                    <br>
                                                                                                </p>
                                                                                                <p>
                                                                                                    *<span
                                                                                                        class="KrutiDev_hindi_text">;g
                                                                                                        ,d izfrcaf/kr
                                                                                                        {ks=
                                                                                                        gSA</span>
                                                                                                    <br>
                                                                                                    * This is a
                                                                                                    prohibted
                                                                                                    area
                                                                                                    <br>
                                                                                                    *<span
                                                                                                        class="KrutiDev_hindi_text">vkils
                                                                                                        vuqjks/k gS fd
                                                                                                        lqj{kk ,oa
                                                                                                        lqj{kk
                                                                                                        fu;eksa dk ikyu
                                                                                                        djsaA</span>
                                                                                                    <br>
                                                                                                    * Kindly follow
                                                                                                    Safety
                                                                                                    and Security rules.
                                                                                                    <br>
                                                                                                    *<span
                                                                                                        class="KrutiDev_hindi_text">;gk¡
                                                                                                        eksckbZy Qksu]
                                                                                                        ekfpl] ykbZVj]
                                                                                                        flxjsV ,oa
                                                                                                        vlr&'kL=
                                                                                                        dk iz;ksx
                                                                                                        iw.kZr%
                                                                                                        oftZr gSA</span>
                                                                                                    <br>
                                                                                                    * Mobiles, Matches,
                                                                                                    Lighter, Smoking and
                                                                                                    Arms prohibited.
                                                                                                    <br>
                                                                                                    *<span
                                                                                                        class="KrutiDev_hindi_text">Ifjlj
                                                                                                        esa ;krk;kr
                                                                                                        fu;eksa
                                                                                                        dk ikyu
                                                                                                        djsA</span>
                                                                                                    <br>
                                                                                                    * Follow Traffic
                                                                                                    Rules
                                                                                                    in premises.
                                                                                                    <br>
                                                                                                    *<span
                                                                                                        class="KrutiDev_hindi_text">ykbZlsalM
                                                                                                        ifjlj esa izos'k
                                                                                                        gsrq fo'ks"k
                                                                                                        vuqefr
                                                                                                        dh vko';drk
                                                                                                        gksrh
                                                                                                        gSA ykbZlsal
                                                                                                        ifjlj
                                                                                                        esa fcuk lqj{kk
                                                                                                        gsyesV ,oa lqj{k
                                                                                                        twrs ds izos'k
                                                                                                        oftZr
                                                                                                        gSA</span>
                                                                                                    <br>
                                                                                                    * Entry in Licensed
                                                                                                    area
                                                                                                    is permitted only
                                                                                                    with
                                                                                                    Safety Shoes and
                                                                                                    Helmet.
                                                                                                    <br>
                                                                                                    *<span
                                                                                                        class="KrutiDev_hindi_text">VfeZuy
                                                                                                        ds ifjlj esa
                                                                                                        QksVks&xzkQh@foMh;ks&xzkQh
                                                                                                        djuk euk
                                                                                                        gSA</span>
                                                                                                    <br>
                                                                                                    * Camera,
                                                                                                    photography/videography
                                                                                                    strictly prohibited.
                                                                                                    <br>
                                                                                                    *<span
                                                                                                        class="KrutiDev_hindi_text">;gk¡&rgk¡
                                                                                                        xanxh u QSyk,
                                                                                                        ,oa
                                                                                                        dqMsnku dk
                                                                                                        iz;ksx
                                                                                                        djsA</span>
                                                                                                    <br>
                                                                                                    * Don't Litter, use
                                                                                                    Dust
                                                                                                    bins.
                                                                                                    <br>
                                                                                                    *<span
                                                                                                        class="KrutiDev_hindi_text">Ifjlj
                                                                                                        ds vanj
                                                                                                        vkikrdkyhu
                                                                                                        esa ?kcjk, ugha
                                                                                                        ,oa
                                                                                                        rqjar eq[;
                                                                                                        izos'k
                                                                                                        }kj ds ikl
                                                                                                        igqapsA
                                                                                                        fn;s tk jgs
                                                                                                        lqj{kk
                                                                                                        funsZ'kksa dk
                                                                                                        ikyu
                                                                                                        djsA</span>
                                                                                                    <br>
                                                                                                    * In emergency reach
                                                                                                    towards Main Gate
                                                                                                    and
                                                                                                    follow provided
                                                                                                    Safety
                                                                                                    Instructions.
                                                                                                    <br>
                                                                                                    <span
                                                                                                        class="KrutiDev_hindi_text">vkils
                                                                                                        lg;ksx vkisf{kr
                                                                                                        gSA</span>
                                                                                                    <br>
                                                                                                    Kindly Cooperate
                                                                                                    with
                                                                                                    Security.
                                                                                                </p>
                                                                                            </th>
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