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
                        <form method="POST" novalidate id="registervalidation" role="form" enctype="multipart/form-data"
                            action="{{url('labour/data/image/file/upload/section/'.$labour_data->id)}}">
                            @csrf
                            <div class="col-md-12" id="input_part">
                                <div class="mb-3 card">
                                    <div class="card-header-tab card-header-tab-animation card-header"
                                        style="background-color: #F79646">
                                        <div class="card-header-title text-light" style="font-size:18px">
                                            <i class="header-icon lnr-apartment icon-gradient bg-love-kiss"> </i>
                                            Upload / Click Picture
                                        </div>
                                        <span> <a style="text-decoration:none"
                                                href="{{url('/labour/data/scan/edit/'.$labour_data->id)}}">&nbsp;&nbsp;&nbsp;<i
                                                    class="fa fa-angle-left" aria-hidden="true"></i> Back</a> </span>

                                    </div>
                                    <div class="card-body">
                                        <div class="tab-content">
                                            <div class="row">
                                                <div class="col-md-12">

                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <button type="button" id="scannerBTN"
                                                                        style="margin-top: 31px"
                                                                        onClick="toggleDataScanner('#toggle_scanner')"
                                                                        class="btn btn-secondary"> <i
                                                                            class="fas fa-chevron-down"></i> &nbsp;
                                                                        Open / Hide Scanner</button>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <button disabled
                                                                        style="margin-top: 31px;float: right;"
                                                                        onClick="take_snapshot()" id="scannerSNAP"
                                                                        type="button" class="btn btn-primary"> <i
                                                                            class="fa fa-camera" aria-hidden="true"></i>
                                                                        &nbsp;
                                                                        Snap New Picture</button>
                                                                </div>
                                                            </div>

                                                            <div class="row mt-4" style="display:none"
                                                                id="toggle_scanner">
                                                                {{-- <div class="col-md-12">
                                                                        <button style="margin-top: 2px;"
                                                                            onClick="take_snapshot()" type="button"
                                                                            class="btn btn-primary"> <i
                                                                                class="fas fa-chevron-right"></i> &nbsp;
                                                                            Take Picture</button>

                                                                    </div> --}}
                                                                <div class="col-md-6">
                                                                    <div id="my_camera_snap"
                                                                        style="border-radius: 10px"></div>
                                                                </div>
                                                                <div class="col-md-6"
                                                                    style="border: 1px solid #0000004a;display: flex;align-items: center;justify-content: center;">
                                                                    <div id="results">
                                                                        {{-- Your
                                                                            captured image will
                                                                            appear here... --}}
                                                                        <img style="width: 400px;height: 237px;"
                                                                            class="image-tag-image"
                                                                            alt="Your captured image will appear here..."
                                                                            width="500" height="600">
                                                                    </div>
                                                                    <input type="hidden" name="image" id="image"
                                                                        class="image-tag">
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="row upload-SHOW_HIDE">
                                                            <div class="col-md-12 mt-5">
                                                                <hr>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="formFile" class="form-label">Upload
                                                                        Picture</label>
                                                                    <input class="form-control"
                                                                        name="upload_photo_documents"
                                                                        onchange="readURL(this)"
                                                                        value="{{@$labour_data->upload_photo_documents}}"
                                                                        type="file" id="formFile">

                                                                    <small id="helpId" class="form-text text-primary"><a
                                                                            target="_blank"
                                                                            href="{{url('/files/'.@$labour_data->upload_photo_documents)}}">{{@$labour_data->upload_photo_documents}}</a></small>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6"
                                                                style="display: flex;align-items: center;justify-content: center;padding:27px">
                                                                <img style="width: 400px;height: 237px;object-fit: contain;"
                                                                    src="{{url('/files/'.@$labour_data->upload_photo_documents)}}"
                                                                    class="image-tag-image-preview"
                                                                    alt="Your captured image will appear here..."
                                                                    width="500" height="600">
                                                            </div>
                                                        </div>




                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-8 mt-5">
                                                            <button type="submit" class="btn"
                                                                style="background-color: #F79646;color: white">Update &
                                                                Next</button>
                                                            <!-- <a href="{{url('/truck/data/pdf/print/'.$labour_data->id)}}"
                                                                    class="btn ml-5 btn-secondary text-light">Next</a> -->

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
    <script language="JavaScript">
        Webcam.set({
            width: 320,
            height: 240,
            dest_width: 640,
            dest_height: 480,
            image_format: 'jpeg',
            jpeg_quality: 90,
            force_flash: false,
            flip_horiz: true,
            fps: 45
        });

        Webcam.attach('#my_camera_snap');

        function take_snapshot() {
            Webcam.snap(function (data_uri) {
                $(".image-tag").val(data_uri);
                // document.getElementById('results').innerHTML = '<img src="' + data_uri + '"/>';
                $('.image-tag-image').attr('src', data_uri);
                // $('#at_submit').click();

                // window.location.href = "{{url('/view_home')}}";
                // $('#url_at_click').click();
            });
        }
    </script>

    <script>
        function toggleDataScanner(id) {
            $('#scannerSNAP').removeAttr('disabled', 'disabled');
            $('.upload-SHOW_HIDE').toggle();
            $(id).toggle();
        }

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('.image-tag-image-preview').attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>




</body>

</html>