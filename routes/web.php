<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::any('/','log_inController@log_in');
Route::any('/log_in','log_inController@log_in_config');
Route::any('/register','viewController@register');
Route::any('/view_home','viewController@home');
Route::any('/store_image','viewController@storeimg');
Route::any('log_out','viewController@log_out');
Route::any('/store_visitor_data','viewController@store_visitor_data');
Route::any('/in_out_register','viewController@in_out_register');

// Search
Route::any('/search-driver-helper','viewController@searchDriverHelper');
Route::any('/search-temp-labour','viewController@searchTempLabour');
Route::any('/party-type-search','viewController@partyTypeSearch');

Route::any('/visitor_register','viewController@visitor_register');
Route::any('/search_visitor_register','viewController@search_visitor_register');
Route::any('/snap','viewController@snap');
Route::any('/out_entry','viewController@out');
Route::any('/out_entry_data','viewController@out_entry_data');
//NEW ADDED
Route::get('/edit_visit_entry/{id}','viewController@edit_visit_entry');
Route::get('/snap_edit/{id}','viewController@snap_edit');
Route::any('/update_visitor_data/{id}','viewController@update_visitor_data');
Route::any('/print_pdf_new_updated/{id}','viewController@print_pdf_new_updated');
//15/4/2020
Route::any('/edit_visitor/{id}','viewController@edit_visitor');
Route::any('/update_visitor_personal_data/{id}','viewController@update_visitor_personal_data');
Route::any('/create_user_roll','viewController@create_user_roll');
//16/4/2020
Route::any('/create_new_user','viewController@create_new_user');
Route::any('/check_new_user_id','viewController@check_new_user_id');
Route::any('/create_new_user_/','viewController@create_new_user_');
// Truck Scan 
Route::any('/truck/data/scan','viewController@truckDataScan');
Route::any('/truck/visit/list','viewController@TruckVisitList');
Route::any('/truck/data/add','viewController@DriverHelperAdd');
Route::any('/truck/data/scan/edit/{id}','viewController@DriverHelperEditList');
Route::any('/truck/data/update/{id}','viewController@DriverHelperEditUpdate');
Route::any('/truck/data/update/file/upload/section/{id}','viewController@TruckVisitEditUploadSection');
Route::any('/truck/data/image/upload/{id}','viewController@TruckVisitUploadFile');
Route::any('/truck/data/pdf/print/{id}','viewController@TruckVisitPdfPrintView');
Route::any('/truck/data/pdf/print/now/{id}','viewController@TruckVisitPdfPrintNow');


// Ajax
Route::any('truck/ajax/load','viewController@truckDataloadAjax');
Route::any('check/blacklist/aadhar-no','viewController@BlacklistAadharNo');
Route::any('party/ajax/load','viewController@partyDataloadAjax');


// Labour type
Route::any('/labour_type/create','viewController@LabourTypeCreateView');
Route::any('/labour_type/list','viewController@LabourTypeListView');
Route::any('/labour/type/name/update/{id}','viewController@LabourTypeEditUpdate');
Route::any('/labour_type/edit/{id}','viewController@LabourTypeEditView');
Route::any('/labour/type/name','viewController@LabourTypeCreate');

// Labour Scan
Route::any('labour/data/scan','viewController@LabourDataScan');
Route::any('labour/data/add','viewController@LabourDataAdd');
Route::any('labour/data/image/upload/{id}','viewController@LabourPicUpload');
Route::any('labour/data/pdf/print/{id}','viewController@LabourPdf');
Route::any('labour/data/scan/edit/{id}','viewController@LabourEdit');
Route::any('labour/data/update/{id}','viewController@LabourUpdate');
Route::any('labour/data/list','viewController@LabourDataList');
Route::any('labour/data/image/file/upload/section/{id}','viewController@LabourUploadFile');

// master 
// Master Party 
Route::any('/master/party/home','viewController@paryMasterView');
Route::any('/master/search/party/master','viewController@paryMasterSearch');
Route::any('/master/party/list','viewController@paryMasterList');
Route::any('/master/pary/edit/{id}','viewController@paryMasterEdit');
Route::any('/master/party/update/{id}','viewController@paryMasterUpadte');
Route::any('/master/party/create','viewController@paryMasterAdd');
// Master Party 
Route::any('/company','viewController@companyAdd');
Route::any('/company/update/{id}','viewController@companyUpdate');
// Master Party 
Route::any('/party_wise_tt','viewController@paryMasterttHome');
Route::any('/party_wise_tt/list','viewController@paryMasterttList');
Route::any('/master/pary_tt/edit/{id}','viewController@paryMasterttEdit');
Route::any('/master/party_master_tt/update{id}','viewController@paryMasterttUpdate');
Route::any('/master/party_master_tt/search','viewController@paryMasterTTSearch');
Route::any('/master/party_master_tt/create','viewController@paryMasterttAdd');

// Master Catagory 
Route::any('/master/catagory/home','viewController@catagoryMasterView');
Route::any('/master/search/catagory/master','viewController@catagoryMasterSearch');
Route::any('/master/catagory/list','viewController@catagoryMasterList');
Route::any('/master/catagory/edit/{id}','viewController@catagoryMasterEdit');
Route::any('/master/catagory/update/{id}','viewController@catagoryMasterUpadte');
Route::any('/master/catagory/create','viewController@catagoryMasterAdd');

// Blacklist Truck
Route::any('/blacklist','viewController@blackListList');
Route::any('/blacklist/add','viewController@blackListAdd');
Route::any('/revert/blacklist/{id}','viewController@blackListRemove');
Route::any('/blacklist/search','viewController@blackListSearch');

// Report
Route::any('driver/report/view','viewController@driverReportView');
Route::any('driver/report/generate','viewController@driverReportGenerate');
Route::any('driver/report/generate/list','viewController@driverReportList');

Route::any('labour/report/view','viewController@labourReportView');
Route::any('labour/report/generate','viewController@labourReportGenerate');
Route::any('labour/report/generate/list','viewController@labourReportList');




//Dashboard
Route::any('/dashboard','viewController@dashboardHome');

//Renew
Route::any('/truck/data/scan/renew/temp/{id}','viewController@DriverHelperRenewTemp');
Route::any('/truck/data/scan/renew/per/{id}','viewController@DriverHelperRenewPer');

Route::any('labour/data/scan/renew/temp/{id}','viewController@LabourRenewTemp');
Route::any('labour/data/scan/renew/per/{id}','viewController@LabourRenewPer');