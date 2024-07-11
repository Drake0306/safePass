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
                    {{-- <div class="col-md-12 col-lg-12">
                        <div class="mb-3 card">
                            <div class="card-header-tab card-header-tab-animation card-header">
                                <div class="card-header-title">
                                    <i class="header-icon lnr-apartment icon-gradient bg-love-kiss"> </i>

                                </div>
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
                        <form method="POST" novalidate id="registervalidation" role="form" enctype="multipart/form-data"
                            action="{{url('/truck/data/update/'.$truck_data->id)}}">
                            @csrf
                            <div class="mb-3 card">
                                @if(@$data)
                                <div class="alert alert-info" role="alert">
                                    {{@$data}}
                                </div>
                                @endif
                                <div class="card-header-tab card-header-tab-animation card-header" style="background-color: #F79646">
                                    <div class="card-header-title text-light">
                                        <i class="header-icon lnr-apartment icon-gradient bg-love-kiss"> </i>
                                        Driver / Helper
                                    </div>

                                </div>
                                <style>
                                    img {
                                        vertical-align: middle;
                                        border-style: none;
                                        width: 100%;
                                    }
                                </style>

                                <div class="card-body" id="scan_part">
                                    <div class="tab-content">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <img style="width: 400px;height: 237px;object-fit: contain;"
                                                    src="{{url('/files/'.@$truck_data->upload_photo_documents)}}"
                                                    class="image-tag-image-preview"
                                                    alt="Your captured image will appear here..."
                                                    width="500" height="600">
                                            </div>
                                            <div class="col-md-6">
                                                <div class="col-md-12">
                                                    <div class="input-group flex-nowrap" style="">
                                                        <input readonly type="number" style="height: 58px;" aria-describedby="addon-wrapping"
                                                            class="form-control" name="adhar_no"
                                                            value="{{@$truck_data->adhar_no}}"
                                                            onKeyUp="CheckAadhar(this.value)" id="adhar_no"
                                                            aria-describedby="helpId" placeholder="Enter Aadhar Number"
                                                            required>
                                                        <span class="input-group-text" id="addon-wrapping">Check for
                                                            BLACKLISTED Numbers</span>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-floating">
                                                        <input type="date" class="form-control"
                                                            name="recipent_date"
                                                            value="{{@$truck_data->recipent_date}}"
                                                            id="floatingInput" readonly aria-describedby="helpId"
                                                            required placeholder="Enter Address">
                                                        <label for="floatingInput">Card Issue Date<b
                                                                class="text-danger">*</b></label>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-floating">
                                                        <select class="form-control" name="card_type" id="floatingInput"
                                                            required>
                                                            <option selected value="{{@$truck_data->card_type}}">
                                                                {{@$truck_data->card_type}}</option>
                                                            <option value="" disabled>---</option>
    
                                                            <option value="Temporary">Temporary</option>
                                                            <option value="Permanent">Permanent</option>
                                                        </select>
                                                        <label for="floatingInput">Card Type</label>
                                                        <!--  -->
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mt-3">
                                                    <span style="color: red;
                                                    font-weight: 600;
                                                    font-size: 15px;
                                                    font-family: cursive;"
                                                    >All fields marked with " * " are mandatory</span>
                                                </div>
                                            </div>
                                            

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="col-md-12" id="input_part" style="display: none"> -->

                            <div class="col-md-12" id="input_part">
                                <div class="mb-3 card">
                                    <div class="card-header-tab card-header-tab-animation card-header"
                                        style="background-color: #F79646">
                                        <div class="card-header-title text-light" style="font-size:18px">
                                            <i class="header-icon lnr-apartment icon-gradient bg-love-kiss"> </i>
                                            Personal Details
                                        </div>

                                    </div>
                                    <div class="card-body">
                                        <div class="tab-content">
                                            <div class="row">
                                                <div class="col-md-12">

                                                    <div class="row">
                                                        <!-- <div class="col-md-12">
                                                                <h4>Personal Details</h4>
                                                                <br>
                                                            </div> -->
                                                        <!-- Fields for entry-->
                                                        {{-- <div class="col-md-3">
                                                            <div class="form-floating">
                                                                <select class="form-control" name="catagoty_type"
                                                                    onChange="loadAjaxParty(this.value)"
                                                                    id="floatingInput" required>
                                                                    @if(@$truck_data->catagoty_type !== null)
                                                                    <option selected
                                                                        value="{{@$catagory_master_view->id}}">
                                                                        {{@$catagory_master_view->catagory_name}}
                                                                    </option>
                                                                    <option value="" disabled>----</option>
                                                                    @else
                                                                    <option selected value="">Select</option>
                                                                    @endif
                                                                    @foreach($catagory_master as $item)
                                                                    <option value="{{$item->id}}">
                                                                        {{$item->catagory_name}}</option>
                                                                    @endforeach
                                                                </select>
                                                                <label for="floatingInput">Catagory</label>
                                                                <!--  -->
                                                            </div>
                                                        </div> --}}

                                                        <div class="col-md-6">
                                                            <div class="form-floating">
                                                                <select class="form-control" name="party" id="party_no" onChange="loadAjax(this.value)" required>
                                                                    @if($party_name)
                                                                    <option value="{{$party_name->sap_code}}">
                                                                        {{$party_name->party_name}}</option>
                                                                        <option value="" disabled>---</option>
                                                                    @else
                                                                    <option value="">Select</option>
                                                                    @endif
                                                                    @foreach($party_master as $item)
                                                                    <option value="{{$item->sap_code}}">
                                                                            {{$item->party_name}}</option>
                                                                    @endforeach
                                                                </select>
                                                                <label for="party_no">Party</label>
                                                                <!--  -->
                                                            </div>
                                                        </div>
                                                       
                                                       
                                                        {{-- <div class="col-md-3">
                                                            <div class="form-floating">
                                                                <select class="form-control" name="party"
                                                                    onChange="loadAjax(this.value)" id="party_no"
                                                                    required>
                                                                    @if($party_name)
                                                                    <option value="{{$party_name->sap_code}}">
                                                                        {{$party_name->party_name}}</option>
                                                                    @else
                                                                    <option value="">Select</option>
                                                                    @endif
                                                                </select>
                                                                <label for="party_no">Party</label>
                                                                <!--  -->
                                                            </div>
                                                        </div> --}}

                                                        <div class="col-md-3">
                                                            <div class="form-floating">
                                                                <select class="form-control" id="truck_no"
                                                                    name="truck_no" required required>
                                                                    @if($party_wise_tt)
                                                                    <option value="{{$party_wise_tt->id}}">
                                                                        {{$party_wise_tt->truck_no}}</option>
                                                                    @endif
                                                                </select>
                                                                <label for="truck_no">Truck Number <b
                                                                        class="text-danger">*</b> </label>

                                                            </div>
                                                        </div>

                                                        <div class="col-md-3">
                                                            <div class="form-floating">
                                                                <select class="form-control" id="floatingInput"
                                                                    name="type" required required>
                                                                    <option selected value="{{@$truck_data->type}}">
                                                                        {{@$truck_data->type}}</option>
                                                                    <option value="">----</option>
                                                                    <option value="Driver">Driver</option>
                                                                    <option value="Helper">Helper</option>
                                                                </select>
                                                                <label for="floatingInput">Type <b
                                                                        class="text-danger">*</b></label>

                                                            </div>
                                                        </div>



                                                        <div class="col-md-3">
                                                            <div class="form-floating">
                                                                <input type="date" class="form-control" name="yob"
                                                                    id="floatingInput" value="{{@$truck_data->yob}}"
                                                                    aria-describedby="helpId"
                                                                    placeholder="Enter date of birth (dd-mm-yyyy)"
                                                                    required>
                                                                <label for="floatingInput">DOB <b
                                                                        class="text-danger">*</b></label>

                                                            </div>
                                                        </div>

                                                        <div class="col-md-3">
                                                            <div class="form-floating">
                                                                <input type="text" class="form-control" name="full_name"
                                                                    id="floatingInput"
                                                                    value="{{@$truck_data->full_name}}"
                                                                    placeholder="Enter Full Name" required>
                                                                <label for="floatingInput">Full Name <b
                                                                        class="text-danger">*</b></label>

                                                            </div>
                                                        </div>

                                                        <div class="col-md-3">
                                                            <div class="form-floating">
                                                                <input type="text" class="form-control"
                                                                    name="fathers_name" id="floatingInput"
                                                                    aria-describedby="helpId"
                                                                    value="{{@$truck_data->fathers_name}}"
                                                                    placeholder="Enter Name" required>
                                                                <label for="floatingInput">Fathers Name <b
                                                                        class="text-danger">*</b></label>

                                                            </div>
                                                        </div>


                                                        <div class="col-md-3">
                                                            <div class="form-floating">
                                                                <input type="number" class="form-control" name="mobile"
                                                                    id="floatingInput" value="{{@$truck_data->mobile}}"
                                                                    aria-describedby="helpId"
                                                                    placeholder="Enter Number">
                                                                <label for="floatingInput">Phone Number</label>

                                                                <!--  -->
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6" style="display: none">
                                                            <div class="form-floating">
                                                                <input type="text" class="form-control" name="e"
                                                                    id="floatingInput" aria-describedby="helpId"
                                                                    placeholder="Enter Email">
                                                                <label for="floatingInput">Email</label>


                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 mt-2">
                                                            <div class="form-floating">
                                                                <input type="text" class="form-control" name="house"
                                                                    id="floatingInput" value="{{@$truck_data->house}}"
                                                                    aria-describedby="helpId" required
                                                                    placeholder="Enter Address">
                                                                <label for="floatingInput">Address <b
                                                                        class="text-danger">*</b></label>


                                                            </div>
                                                        </div>
                                                        <!-- <div class="col-md-2 mt-2">
                                                            <div class="form-floating">
                                                                <input type="date" class="form-control"
                                                                    name="valid_up_to"
                                                                    value="{{@$truck_data->valid_up_to}}"
                                                                    id="valid_up_to" aria-describedby="helpId"
                                                                    required placeholder="Enter Address">
                                                                <label for="valid_up_to">Valid Up To <b
                                                                        class="text-danger">*</b></label>


                                                            </div>
                                                        </div> -->
                                                        
                                                        <div class="col-md-2 mt-2">
                                                            <div class="form-floating">
                                                                <select class="form-control" name="hiv_test"
                                                                    id="hiv_test" required>
                                                                    <option selected value="{{@$truck_data->hiv_test}}">
                                                                        {{@$truck_data->hiv_test}}</option>
                                                                    <option value="" disabled>----</option>
                                                                    <option value="Yes">Yes</option>
                                                                    <option value="No">No</option>
                                                                </select>
                                                                <label for="floatingInput">HIV Test</label>


                                                            </div>
                                                        </div>
                                                        <div class="col-md-2 mt-2">
                                                            <div class="form-floating">
                                                                <input type="date" class="form-control"
                                                                    name="hiv_test_date" id="floatingInput"
                                                                    value="{{@$truck_data->hiv_test_date}}"
                                                                    aria-describedby="helpId" placeholder="Enter">
                                                                <label for="floatingInput">HIV Test Date</label>
                                                                <!--  -->
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2 mt-2">
                                                            <div class="form-floating">
                                                                <select class="form-control" name="eye_sight"
                                                                    id="floatingInput" required>
                                                                    <option selected
                                                                        value="{{@$truck_data->eye_sight}}">
                                                                        {{@$truck_data->eye_sight}}</option>
                                                                    <option value="" disabled>----</option>
                                                                    <option value="OK">OK</option>
                                                                    <option value="SPECTS">SPECTS</option>
                                                                </select>
                                                                <label for="floatingInput">Eye sight</label>
                                                                <!--  -->
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2 mt-2">
                                                            <div class="form-floating">
                                                                <select class="form-control" name="blood_group"
                                                                    id="floatingInput" required>
                                                                    <option selected
                                                                        value="{{@$truck_data->blood_group}}">
                                                                        {{@$truck_data->blood_group}}</option>
                                                                    <option value="" disabled>----</option>
                                                                    <option value="A">A</option>
                                                                    <option value="B">B</option>
                                                                    <option value="A+">A+</option>
                                                                    <option value="A-">A-</option>
                                                                    <option value="B+">B+</option>
                                                                    <option value="B-">B-</option>
                                                                    <option value="O+">O+</option>
                                                                    <option value="O-">O-</option>
                                                                    <option value="AB+">AB+</option>
                                                                    <option value="AB-">AB-</option>
                                                                </select>
                                                                <label for="floatingInput">Blood Group</label>


                                                            </div>
                                                        </div>
                                                        <div class="col-md-2 mt-2">
                                                            <div class="form-floating">
                                                                <select class="form-control"
                                                                    name="insurance_twelve_rupee" id="floatingInput"
                                                                    required>
                                                                    <option selected
                                                                        value="{{@$truck_data->insurance_twelve_rupee}}">
                                                                        {{@$truck_data->insurance_twelve_rupee}}
                                                                    </option>
                                                                    <option value="" disabled>----</option>
                                                                    <option value="">Select</option>
                                                                    <option value="Yes">Yes</option>
                                                                    <option value="No">No</option>
                                                                </select>
                                                                <label for="floatingInput">Insurance ₹12</label>


                                                            </div>
                                                        </div>
                                                        <div class="col-md-2 mt-2">
                                                            <div class="form-floating">
                                                                <select class="form-control"
                                                                    name="insurance_three_thirty_rupee"
                                                                    id="floatingInput" required>
                                                                    <option selected
                                                                        value="{{@$truck_data->insurance_three_thirty_rupee}}">
                                                                        {{@$truck_data->insurance_three_thirty_rupee}}
                                                                    </option>
                                                                    <option value="" disabled>----</option>
                                                                    <option value="Yes">Yes</option>
                                                                    <option value="No">No</option>
                                                                </select>
                                                                <label for="floatingInput">Insurance ₹330</label>


                                                            </div>
                                                        </div>

                                                        <div class="col-md-2 mt-2">
                                                            <div class="form-floating">
                                                                <input type="text" class="form-control"
                                                                    name="nominee_name"
                                                                    value="{{@$truck_data->nominee_name}}"
                                                                    id="floatingInput" aria-describedby="helpId"
                                                                    required placeholder="Enter">
                                                                <label for="floatingInput">Nominee Name</label>


                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 mt-2">
                                                            <div class="form-floating">
                                                                <input type="text" class="form-control" name="bank_ac"
                                                                    id="floatingInput" value="{{@$truck_data->bank_ac}}"
                                                                    aria-describedby="helpId" required
                                                                    placeholder="Enter">
                                                                <label for="floatingInput">Bank Account</label>


                                                            </div>
                                                        </div>

                                                        <div class="col-md-3 mt-2">
                                                            <div class="form-floating">
                                                                <input type="date" class="form-control"
                                                                    name="insurance_validity"
                                                                    value="{{@$truck_data->insurance_validity}}"
                                                                    id="floatingInput" aria-describedby="helpId"
                                                                    placeholder="Enter">
                                                                <label for="floatingInput">Insurance Validity</label>
                                                                <!--  -->
                                                            </div>
                                                        </div>

                                                        <div class="col-md-3 mt-2">
                                                            <div class="form-floating">
                                                                <input type="date" class="form-control"
                                                                    name="helth_checkup"
                                                                    value="{{@$truck_data->helth_checkup}}"
                                                                    id="floatingInput" aria-describedby="helpId"
                                                                    placeholder="Enter">
                                                                <label for="floatingInput">Health Checkup</label>
                                                                <!--  -->
                                                            </div>
                                                        </div>



                                                        <div class="col-md-6 mt-2">
                                                            <div class="form-floating">
                                                                <input type="text" class="form-control"
                                                                    name="identity_mark" id="floatingInput"
                                                                    value="{{@$truck_data->identity_mark}}"
                                                                    aria-describedby="helpId" placeholder="Enter">
                                                                <label for="floatingInput">Identity Mark</label>
                                                                <!--  -->
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-3 mt-2">
                                                            <div class="form-floating">
                                                                <input type="date" class="form-control"
                                                                    name="card_valid_from" id="floatingInput"
                                                                    value="{{@$truck_data->card_valid_from}}"
                                                                    aria-describedby="helpId" placeholder="Enter">
                                                                <label for="floatingInput">Card Valid From</label>
                                                                <!--  -->
                                                            </div>
                                                        </div>

                                                        <div class="col-md-3 mt-2">
                                                            <div class="form-floating">
                                                                <input type="date" class="form-control"
                                                                    name="card_valid_to" id="floatingInput"
                                                                    value="{{@$truck_data->card_valid_to}}"
                                                                    aria-describedby="helpId" placeholder="Enter">
                                                                <label for="floatingInput">Card Valid Upto <b class="text-danger">*</b></label>
                                                                
                                                                <!--  -->
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 card">
                                    <div class="card-header-tab card-header-tab-animation card-header"
                                        style="background-color: #F79646">
                                        <div class="card-header-title text-light" style="font-size:18px">
                                            <i class="header-icon lnr-apartment icon-gradient bg-love-kiss"> </i>
                                            Professional Details
                                        </div>

                                    </div>
                                    <div class="card-body">
                                        <div class="tab-content">
                                            <div class="row">
                                                <div class="col-md-12">

                                                    <div class="row">

                                                        <div class="col-md-3">
                                                            <div class="form-floating">
                                                                <input type="text" class="form-control" name="dl_no"
                                                                    id="floatingInput" value="{{@$truck_data->dl_no}}"
                                                                    aria-describedby="helpId" placeholder="Enter Number"
                                                                    required>
                                                                <label for="floatingInput">DL Number <b
                                                                        class="text-danger">*</b></label>

                                                            </div>
                                                        </div>

                                                        <div class="col-md-3">
                                                            <div class="form-floating">
                                                                <input type="date" class="form-control"
                                                                    name="issue_date"
                                                                    value="{{@$truck_data->issue_date}}"
                                                                    id="floatingInput" aria-describedby="helpId"
                                                                    placeholder="Enter Date" required>
                                                                <label for="floatingInput">DL Validity <b
                                                                        class="text-danger">*</b></label>

                                                            </div>
                                                        </div>



                                                        <div class="col-md-6">
                                                            <div class="form-floating">
                                                                <input type="text" class="form-control"
                                                                    name="issueing_rto" id="floatingInput"
                                                                    aria-describedby="helpId"
                                                                    value="{{@$truck_data->issueing_rto}}"
                                                                    placeholder="Enter">
                                                                <label for="floatingInput">Issueing RTO</label>
                                                                <!--  -->
                                                            </div>
                                                        </div>



                                                        <div class="col-md-3">
                                                            <div class="form-floating">
                                                                <select class="form-control" name="from_j"
                                                                    id="floatingInput">
                                                                    <option selected value="{{@$truck_data->from_j}}">
                                                                        {{@$truck_data->from_j}}</option>
                                                                    <option value="" disabled>----</option>
                                                                    <option value="Yes">Yes</option>
                                                                    <option value="No">No</option>
                                                                </select>
                                                                <label for="floatingInput">From J</label>
                                                                <!--  -->
                                                            </div>
                                                        </div>


                                                        <div class="col-md-3">
                                                            <div class="form-floating">
                                                                <select class="form-control" name="from_h"
                                                                    id="floatingInput">
                                                                    <option selected value="{{@$truck_data->from_h}}">
                                                                        {{@$truck_data->from_h}}</option>
                                                                    <option value="" disabled>----</option>
                                                                    <option value="Yes">Yes</option>
                                                                    <option value="No">No</option>
                                                                </select>
                                                                <label for="floatingInput">From H</label>
                                                                <!--  -->
                                                            </div>
                                                        </div>

                                                        <div class="col-md-3">
                                                            <div class="form-floating">
                                                                <select class="form-control" name="police_verification"
                                                                    id="floatingInput" required>
                                                                    <option selected
                                                                        value="{{@$truck_data->police_verification}}">
                                                                        {{@$truck_data->police_verification}}</option>
                                                                    <option value="" disabled>----</option>
                                                                    <option value="Yes">Yes</option>
                                                                    <option value="No">No</option>
                                                                </select>
                                                                <label for="floatingInput">Police Verification</label>
                                                                <!--  -->
                                                            </div>
                                                        </div>

                                                        <div class="col-md-3">
                                                            <div class="form-floating">
                                                                <input type="text" class="form-control" name="ref"
                                                                    id="floatingInput" value="{{@$truck_data->ref}}"
                                                                    aria-describedby="helpId" required
                                                                    placeholder="Enter Ref">
                                                                <label for="floatingInput">Ref <b
                                                                        class="text-danger">*</b></label>

                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-floating">
                                                                <input type="text" class="form-control"
                                                                    name="police_station" id="floatingInput"
                                                                    value="{{@$truck_data->police_station}}"
                                                                    aria-describedby="helpId" placeholder="Enter">
                                                                <label for="floatingInput">Police Station</label>
                                                                <!--  -->
                                                            </div>
                                                        </div>

                                                        <div class="col-md-3">
                                                            <div class="form-floating">
                                                                <input type="date" class="form-control"
                                                                    name="valid_from" id="floatingInput"
                                                                    value="{{@$truck_data->valid_from}}"
                                                                    aria-describedby="helpId" placeholder="Enter">
                                                                <label for="floatingInput">Valid From</label>
                                                                <!--  -->
                                                            </div>
                                                        </div>

                                                        <div class="col-md-3">
                                                            <div class="form-floating">
                                                                <input type="date" class="form-control" name="valid_to"
                                                                    id="floatingInput" aria-describedby="helpId"
                                                                    value="{{@$truck_data->valid_to}}"
                                                                    placeholder="Enter">
                                                                <label for="floatingInput">Valid To</label>
                                                                <!--  -->
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 mt-3 mb-3">
                                                            <hr>
                                                        </div>

                                                        <div class="col-md-3">
                                                            <div class="form-floating">
                                                                <select class="form-control" name="hg_training"
                                                                    id="floatingInput">
                                                                    <option selected
                                                                        value="{{@$truck_data->hg_training}}">
                                                                        {{@$truck_data->hg_training}}</option>
                                                                    <option value="" disabled>----</option>
                                                                    <option value="Yes">Yes</option>
                                                                    <option value="No">No</option>
                                                                </select>
                                                                <label for="floatingInput">HG Training</label>
                                                                <!--  -->
                                                            </div>
                                                        </div>

                                                        <div class="col-md-3">
                                                            <div class="form-floating">
                                                                <input type="date" class="form-control"
                                                                    name="valid_from_training" id="floatingInput"
                                                                    aria-describedby="helpId"
                                                                    value="{{@$truck_data->valid_from_training}}"
                                                                    placeholder="Enter">
                                                                <label for="floatingInput">Valid From</label>
                                                                <!--  -->
                                                            </div>
                                                        </div>

                                                        <div class="col-md-3">
                                                            <div class="form-floating">
                                                                <input type="date" class="form-control"
                                                                    name="valid_to_training" id="floatingInput"
                                                                    aria-describedby="helpId"
                                                                    value="{{@$truck_data->valid_to_training}}"
                                                                    placeholder="Enter">
                                                                <label for="floatingInput">Valid To</label>
                                                                <!--  -->
                                                            </div>
                                                        </div>

                                                        <div class="col-md-3">
                                                        </div>

                                                        <div class="col-md-3">
                                                            <div class="form-floating">
                                                                <select class="form-control" name="oisd_training"
                                                                    id="floatingInput">
                                                                    <option selected
                                                                        value="{{@$truck_data->oisd_training}}">
                                                                        {{@$truck_data->oisd_training}}</option>
                                                                    <option value="" disabled>----</option>
                                                                    <option value="Yes">Yes</option>
                                                                    <option value="No">No</option>
                                                                </select>
                                                                <label for="floatingInput">OISD Training</label>
                                                                <!--  -->
                                                            </div>
                                                        </div>

                                                        <div class="col-md-3">
                                                            <div class="form-floating">
                                                                <input type="date" class="form-control"
                                                                    name="valid_from_training_oisd" id="floatingInput"
                                                                    aria-describedby="helpId"
                                                                    value="{{@$truck_data->valid_from_training_oisd}}"
                                                                    placeholder="Enter">
                                                                <label for="floatingInput">Valid From</label>
                                                                <!--  -->
                                                            </div>
                                                        </div>

                                                        <div class="col-md-3">
                                                            <div class="form-floating">
                                                                <input type="date" class="form-control"
                                                                    name="valid_to_training_oisd" id="floatingInput"
                                                                    aria-describedby="helpId"
                                                                    value="{{@$truck_data->valid_to_training_oisd}}"
                                                                    placeholder="Enter">
                                                                <label for="floatingInput">Valid To</label>
                                                                <!--  -->
                                                            </div>
                                                        </div>



                                                        <div class="col-md-6" style="margin-top:20px">
                                                            <div class="form-floating mb-3">
                                                                <label class="input-group-text" for="formFile">Upload
                                                                    Documents</label>
                                                                <input style="margin-left: 50px;"
                                                                    value="{{@$truck_data->upload_documents}}"
                                                                    name="upload_documents" type="file"
                                                                    class="form-control" id="formFile">
                                                            </div>
                                                            <small id="formFile" class="form-text text-primary"><a
                                                                    target="_blank"
                                                                    href="{{url('../public/files/'.@$truck_data->upload_documents)}}">{{@$truck_data->upload_documents}}
                                                                    <- Click To View File</a> </small> </div> <div
                                                                        class="col-md-6" style="margin-top:20px">

                                                        </div>

                                                        <!-- Fields for entry End-->
                                                        <div class="col-md-8 mt-4">
                                                            <button type="submit" id="Sub-button" class="btn"
                                                                style="background-color: #3f6ad8;color: white; width: 150px">Next</button>
                                                            {{-- <span class="text-danger ml-5">All Fields Marked with
                                                                <b>*</b> Are Requred</span> --}}

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

    <script>
        function loadAjaxParty(value) {
            $('#party_no').empty();
            $.ajax({ //create an ajax request to display.php
                type: "GET",
                url: "{{url('party/ajax/load')}}",
                data: {
                    value: value
                },
                dataType: "json",
                success: function (response) {
                    console.log(response);
                    var tag = `<option value="" selected>Select</option>`;
                    for (var i = 0; i < response.length; i++) {
                        tag += `<option value="` + response[i].sap_code + `" >` + response[i].party_name +
                            `</option>`
                    }
                    $('#party_no').append(tag);
                    //alert(response);
                },
                error: function (error) {
                    console.log(response);
                }

            });
        }
    </script>

    {{-- <script language="JavaScript">
        Webcam.set({
            width: 450,
            height: 390,
            image_format: 'png',
            jpeg_quality: 100
        });

        Webcam.attach('#my_camera');

        function take_snapshot() {
            Webcam.snap(function (data_uri) {
                $(".image-tag").val(data_uri);
                document.getElementById('results').innerHTML = '<img  src="' + data_uri + '"/>';
            });
        }
    </script> --}}

    <script type="text/javascript">
        $(function () {
            $('#registervalidation').bootstrapValidator({
                message: 'This value is not valid',
                fields: {
                    passport: {
                        validators: {
                            file: {
                                extension: 'jpg,pdf',
                                maxSize: 5 * 1024 * 1024, // 5 MB
                                message: 'Please upload a .pdf or .jpg file - max. size 5MB'
                            },
                            notEmpty: {
                                message: 'Please select Passport File'
                            }
                        }
                    },
                }
            });

        });
    </script>

    {{-- <script>
        function check() {
            var image = $('#image').val();
            if (image) {
                $('#at_submit').click();
            } else {
                alert('Cannot Be submited without a snapshot');
            }
        }
    </script> --}}


    <script>
        function CheckCardType(e) {
            if (e === "Temporary") {
                $('#valid_up_to').removeAttr('readonly', 'readonly')
                $('#valid_up_to').attr('required', 'required')
            } else {
                $('#valid_up_to').val('');
                $('#valid_up_to').attr('readonly', 'readonly')
                $('#valid_up_to').removeAttr('required', 'required')
            }
        }
    </script>

    <script>
        function load() {
            scanner.addListener('scan', function (content) {
                alert('done' + content);
                window.open(content, "_blank");
            });
        }
    </script>
    <script>
        function window_change() {
            var id_one = $('#id_one').val();
            if (id_one == '') {
                alert('Camera needed to selected')
            } else {

                Instascan.Camera.getCameras().then(cameras => {
                    console.log(cameras);
                    if (cameras.length > 0) {
                        var val = cameras.length;
                        scanner.start(cameras[id_one]);
                    } else {
                        console.error("Not found!");
                    }
                });
            }
        }
    </script>

    <script>
        function validatedate() {
            var date_input_text = $('#box_4').val();
            var dateformat = /^(0?[1-9]|[12][0-9]|3[01])[\/\-](0?[1-9]|1[012])[\/\-]\d{4}$/;
            // Match the date format through regular expression
            if (date_input_text.match(dateformat)) {
                $('#helpId_date').focus();
                //Test which seperator is used '/' or '-'
                var opera1 = date_input_text.split('/');
                var opera2 = date_input_text.split('-');
                lopera1 = opera1.length;
                lopera2 = opera2.length;
                // Extract the string into month, date and year
                if (lopera1 > 1) {
                    // var pdate = date_input_text.split('/');
                    $('#helpId_date').show(500);
                    $('#helpId_date').focus();
                    alert("invalid date Format");
                } else if (lopera2 > 1) {
                    var pdate = date_input_text.split('-');
                }
                var dd = parseInt(pdate[0]);
                var mm = parseInt(pdate[1]);
                var yy = parseInt(pdate[2]);
                // Create list of days of a month [assume there is no leap year by default]
                var ListofDays = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
                if (mm == 1 || mm > 2) {
                    if (dd > ListofDays[mm - 1]) {
                        $('#helpId_date').show(500);
                        $('#helpId_date').focus();
                        alert("invalid date");
                    } else {
                        $('#helpId_date').hide(500);
                        $('#at_submit').click();
                    }
                }
                if (mm == 2) {
                    var lyear = false;
                    if ((!(yy % 4) && yy % 100) || !(yy % 400)) {
                        lyear = true;
                        $('#helpId_date').hide(500);
                        $('#at_submit').click();
                    }
                    if ((lyear == false) && (dd >= 29)) {
                        $('#helpId_date').show(500);
                        $('#helpId_date').focus();
                        alert("invalid date");
                    }
                    if ((lyear == true) && (dd > 29)) {
                        $('#helpId_date').show(500);
                        $('#helpId_date').focus();
                        alert("invalid date");
                    }

                }
            } else {
                $('#helpId_date').show(500);
                $('#helpId_date').focus();
                alert("invalid date");
            }
        }
    </script>
    <script>
        $('#change_no').click(function () {
            var value_data_one = $('#value_data_one').val();
            if (value_data_one == 0) {
                $('#text_change').html('GES');
                $('#value_data_one').val(1);

            } else {
                $('#text_change').html('gate entry system');
                $('#value_data_one').val(0);
            }
        });
    </script>


    <script>
        function InitiateScanTimer() {
            setTimeout(function () {
                InitiateScan();
            }, 30000);
            // $('#input_part').show(500);
            // $('#scan_part').hide(500);
        }

        function InitiateScan() {
            let scanner = new Instascan.Scanner({
                video: document.getElementById('preview')
            });
            InitiateScanTimer();
            scanner.addListener('scan', function (content) {

                // alert(content);
                // console.log(content);

                //Work on XML
                var XML_data = content;
                var check_adar = XML_data.split('"');
                var xml_value_data = '<';
                var xml_l = '?xml version=';
                var full = xml_value_data + xml_l;
                var data_val = String(full);
                if (check_adar[0] == data_val) {
                    console.log(full);
                    //Data stored on variable
                    var XML_split = XML_data.split('"');
                    //C as default
                    var c = 1;
                    //For loop for getting index no for these files
                    for (i = 5; i <= 29; i++) {

                        //for calculating odd numbers
                        if (i % 2 != 0) {
                            //Putting data in variable
                            var XML_val = XML_split[i];
                            var temp_text_id = '#box_' + c;

                            if (c == 3) {
                                if (XML_val == 'M') {
                                    $(temp_text_id).append('<option value="' + XML_val +
                                        '" selected>Male</option>');
                                } else if (XML_val == 'F') {
                                    $(temp_text_id).append('<option value="' + XML_val +
                                        '" selected>Female</option>');
                                } else {
                                    $(temp_text_id).append('<option value="' + XML_val +
                                        '" selected>Other</option>');
                                }
                            } else {
                                if ((i == 13) || (i == 23) || (i == 29)) {} else {
                                    if (c == 5) {
                                        var temp_value_id = $(temp_text_id).val();
                                        $(temp_text_id).val(temp_value_id + ' ' + XML_val);
                                    } else {
                                        $(temp_text_id).val(XML_val);
                                    }
                                }

                            }

                            //increamenting C 
                            if (c == 5) {} else {
                                c = c + 1;
                            }
                            // console.log(c);
                        }

                    }

                    //Static values IGNORE
                    // 11
                    // 15 17 19 21 25 27
                    // console.log(XML_split[5]);
                    // console.log(XML_split[7]);
                    // console.log(XML_split[9]);
                    // console.log(XML_split[11]);
                    // console.log(XML_split[13]);
                    // console.log(XML_split[15]);
                    // console.log(XML_split[17]);
                    // console.log(XML_split[19]);
                    // console.log(XML_split[21]);
                    // console.log(XML_split[23]);
                    // console.log(XML_split[25]);
                    // console.log(XML_split[27]);
                    // console.log(XML_split[29]);

                    //END Ignore

                    // window.open(content, "_blank");
                } else {
                    var c = 2;
                    // 2, 4, 1
                    var f = 0;
                    //split pan detail
                    var PAN = XML_data.split(':');
                    for (var j = 0; j <= 4; j++) {
                        // var pan_split = new Array()

                        pan_split = PAN[j].split("\n");
                        // var val_temp_id = '#box_' + c;
                        if (f == 0) {
                            f++;
                        } else if (f == 1) {
                            //split spaces
                            var value = pan_split[0].replace(/^\s+|\s+$/g, '');
                            $('#box_2').val(value);
                            f++;
                        } else if (f == 2) {
                            f++;
                        } else if (f == 3) {
                            //split spaces
                            var value = pan_split[0].replace(/^\s+|\s+$/g, '');
                            $('#box_4').val(value);
                            f++;
                        } else if (f == 4) {
                            //split spaces
                            var value = pan_split[0].replace(/^\s+|\s+$/g, '');
                            $('#box_1').val(value);
                            f++;
                        }

                    }

                }

                $('#input_part').show(500);
                $('#scan_part').hide(500);
                alert('Scan Complete');
            });

            function isMobileDevice() {
                return (typeof window.orientation !== "undefined") || (navigator.userAgent
                    .indexOf('IEMobile') !== -1);
            }

            Instascan.Camera.getCameras().then(function (cameras) {
                console.log(cameras);
                if (cameras.length > 0) {
                    $('#id_one').empty();
                    var val = cameras.length;
                    for (i = 0; i < val; i++) {
                        $('#id_one').append('<option value="' + i + '">' + cameras[i].name + '</option>');
                        // alert(i);
                    }
                    scanner.start(cameras[0]);
                } else {
                    console.error("Not found!");
                }
            });
        }

        $(document).ready(function () {
            setTimeout(function () {
                InitiateScan();
            }, 30000);
        });
    </script>

    <script>
        function toggleDataScanner(id) {
            $('#' + id).toggle(500);
        }
    </script>
    <script>
        function loadAjax(value) {
            $('#truck_no').empty();
            $.ajax({ //create an ajax request to display.php
                type: "GET",
                url: "{{url('truck/ajax/load')}}",
                data: {
                    value: value
                },
                dataType: "json",
                success: function (response) {
                    console.log(response);
                    var tag = `<option value="" selected>Select</option>`;
                    for (var i = 0; i < response.length; i++) {
                        tag += `<option value="` + response[i].id + `" >` + response[i].truck_no +
                            `</option>`
                    }
                    $('#truck_no').append(tag);
                    //alert(response);
                },
                error: function (error) {
                    console.log(response);
                }

            });
        }
    </script>

    <script>
        function CheckAadhar(value) {
            $('#box_1').css('border-color', '#e3e7ea');
            if (value) {
                $.ajax({ //create an ajax for blacklist check
                    type: "GET",
                    url: "{{url('check/blacklist/aadhar-no')}}",
                    data: {
                        value: value
                    },
                    dataType: "json",
                    success: function (response) {
                        if (response == true) {
                            $('#box_1').css('border-color', 'red');
                            alert('This Aadhar No is Blacklisted') ? "" : $('#box_1').css('color', 'red');
                        }
                    },
                    error: function (error) {
                        console.log(response);
                    }

                });

            }
        }
    </script>


</body>

</html>