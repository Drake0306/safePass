<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use DB;
use Mail;
use Session;
use Redirect;
use PDF;
use App\visitor;
use App\user_role;
use App\user_table;
use App\no_of_visit;
use App\permission;
use App\party_wise_tt;
use App\party_master;
use App\catagory_master;
use App\truck_data;
use App\location;
use App\company_master; 
use App\labour_type; 
use App\labour_data; 
use DateTime;
use DatePeriod;
use DateInterval;
use App\blacklist; 
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class viewController extends Controller
{
    public function __construct(){
        $this->middleware('check_jobseeker');
    }
   
    public function home(REQUEST $request){
        $type = $request->session()->get('type');
        
        // return $request->session()->get('mac');
        $in_entry = $request->session()->get('in_entry');
        if($in_entry == 0){
            return '<h2>Access Denied ... <small>( !! contact your head for adequate permission !! ) </small></h2>';
        }else{
            return view('home')->with('type',$type);   
        }
        
    }

    public function storeimg(REQUEST $request){
        // return $request;
        // exit;
        $img = $request->image;
        $image_parts = explode(";base64,", $img);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        
        //decoding image
        $image_base64 = base64_decode($image_parts[1]);
        $fileName = uniqid() . '.png';

        //saving image
        file_put_contents(public_path().'/scan/'.$fileName, $image_base64);

        //updating file name
        $update_file_name = no_of_visit::find($request->id);
        $update_file_name->image = $fileName;
        $update_file_name->save();

        //pdf
        $no_of_visit = no_of_visit::where('id',$request->id)->first();
        $visitor = visitor::where('uid',$no_of_visit->uid)->first();

        $data = array('no_of_visit' =>$no_of_visit ,'visitor'=> $visitor , 'fileName'=>$fileName);

        // return view('pdf',\compact('visitor','no_of_visit'));
        // $request->session()->forget('temp_id');
        $request->session()->put('temp_id', 0);

        $pdf = PDF::loadView('pdf',$data);
        return $pdf->stream();

        // return redirect('/view_home');
    }

    public function register(REQUEST $request){
        $user_role = user_role::get();
        // $type = $request->session()->get('type');
        // if($type !=0){
        //     return \redirect('/view_home');
        // }
        return view('register',compact('user_role'));
    }

    public function log_out(REQUEST $request){
        $request->session()->flush();
        return \redirect('/');
    }

    public function store_visitor_data(REQUEST $request){

        $date = date('d-m-Y | h:i:sa');
        $new_date = date('Y-m-d');
        
        $visitor_find = visitor::where('uid',$request->adhar_no)->first();
        
        // return $request->details;
        // exit;
        if($visitor_find){
            $no_of_visit_all = no_of_visit::where('uid',$request->adhar_no)
                                            ->where('visitor_id',$visitor_find->id)
                                            ->whereDate('created_at',$new_date)
                                            ->orderBy('id','DESC')
                                            ->first();

                // return $no_of_visit_all;
                // exit;
                // if($no_of_visit_all->in_or_out == 'IN'){
                //     //Add visiter 
                //     $no_of_visit_add = new no_of_visit();
                //     $no_of_visit_add->uid = $request->adhar_no;
                //     $no_of_visit_add->visitor_id = $visitor_find->id;
                //     $no_of_visit_add->in_or_out  = 'OUT';
                //     $no_of_visit_add->save();
                //     $data = 'Old Visiter Found ,Entry Updated OUT Time Registered '.$date ;
                // }else{
                //     //Add visiter 
                //     $no_of_visit_add = new no_of_visit();
                //     $no_of_visit_add->uid = $request->adhar_no;
                //     $no_of_visit_add->visitor_id = $visitor_find->id;
                //     $no_of_visit_all->visit_reason = $request->visiting_reason;
                //     // $no_of_visit_add->in_or_out  = 'IN';
                //     $no_of_visit_add->save();
                //     $data = 'Old Visiter Found , New Entry Added IN Time Registered '.$date ;
                // }

                //Add visiter 
                $no_of_visit_add = new no_of_visit();
                $no_of_visit_add->uid = $request->adhar_no;
                $no_of_visit_add->visitor_id = $visitor_find->id;
                $no_of_visit_add->visit_reason = $request->details;
                $no_of_visit_add->company_details = $request->company_details;
                $no_of_visit_add->company_address = $request->company_address;
                $no_of_visit_add->designation = $request->designation;
                $no_of_visit_add->department = $request->department;
                $no_of_visit_add->company_website = $request->company_website;
                $no_of_visit_add->company_mobile = $request->company_mobile;
                $no_of_visit_add->company_email = $request->company_email;
                $no_of_visit_add->whome_to_meet = $request->whome_to_meet;
                $no_of_visit_add->details = $request->details;
                // $no_of_visit_add->in_out = 'IN';
                $no_of_visit_add->in_time = date('Y-m-d h:i:s');
                // $no_of_visit_add->in_or_out  = 'IN';
                $no_of_visit_add->save();
                $id = $no_of_visit_add->id;
                $data = 'Old Visiter Found , New Entry Added IN Time Registered '.$date ;

                $request->session()->put('temp_id', $id);

                return redirect('/snap');
                // return redirect('/snap');
                // Redirect::to('/snap?id='. $id);
            
            }else{

                $visitor_add = new visitor();
                $visitor_add->uid = $request->adhar_no;
                $visitor_add->name = $request->full_name;
                $visitor_add->gender = $request->gender;
                $visitor_add->yob = date('Y-m-d',strtotime($request->yob));
                $visitor_add->house = $request->house;
                $visitor_add->mobile_no = $request->mobile;
                $visitor_add->email = $request->email;
                // $visitor_add->co = $request->co;
                // $visitor_add->street = $request->street;
                // $visitor_add->lm = $request->landmark;
                // $visitor_add->vtc = $request->name_of_village_or_town;
                // $visitor_add->po = $request->post_office;
                // $visitor_add->dist = $request->district;
                // $visitor_add->state = $request->state;
                // $visitor_add->pc = $request->postal;
                $visitor_add->save();

                //Add visiter 
                $no_of_visit_add = new no_of_visit();
                $no_of_visit_add->uid = $request->adhar_no;
                $no_of_visit_add->visitor_id = $visitor_add->id;
                $no_of_visit_add->visit_reason = $request->details;
                $no_of_visit_add->company_details = $request->company_details;
                $no_of_visit_add->company_address = $request->company_address;
                $no_of_visit_add->designation = $request->designation;
                $no_of_visit_add->department = $request->department;
                $no_of_visit_add->company_website = $request->company_website;
                $no_of_visit_add->company_mobile = $request->company_mobile;
                $no_of_visit_add->company_email = $request->company_email;
                $no_of_visit_add->whome_to_meet = $request->whome_to_meet;
                $no_of_visit_add->details = $request->details;
                // $no_of_visit_add->in_out = 'IN';
                $no_of_visit_add->in_time = date('Y-m-d h:i:s');
                // $no_of_visit_add->in_or_out  = 'IN';
                $no_of_visit_add->save();

                $data = 'New Visiter Created , New Entry Added IN Time Registered '.$date;
                $id = $no_of_visit_add->id;
                $request->session()->put('temp_id', $id);

                return redirect('/snap');
                // Redirect::to('/snap?id='. $id);
                // return redirect('/snap');
            }
            
    }

    public function in_out_register(REQUEST $request){
        $type = $request->session()->get('type');
        $no_of_visit = no_of_visit::orderBy('id','DESC')->paginate(15);
        $value = 1;
        
        $read_in_out = $request->session()->get('read_in_out');
        if($read_in_out == 0){
            return '<h2>Access Denied ... <small>( !! contact your head for adequate permission !! ) </small></h2>';
        }else{
            return view('in_out_register',\compact('type','no_of_visit','value'));
        }
    }
    

    public function searchDriverHelper(REQUEST $request){
        $search_value = $request->search;
        $type = $request->type;
        if($request->search == ''){
            $truck_data = truck_data::orderBy('id','DESC')->get();
        }else{
            $truck_data = truck_data::query();
            $truck_data = $truck_data->where('full_name','like','%'.$request->search.'%');
            $truck_data = $truck_data->orWhere('adhar_no','like','%'.$request->search.'%');
            $truck_data = $truck_data->orWhere('type','like','%'.$request->search.'%');
            $truck_data = $truck_data->orderBy('id','DESC');
            if($type == 0) {
                $truck_data = $truck_data->get();
            } else {
                $truck_data = $truck_data->paginate($type);
            }
        }   
        
        
        // $read_in_out = $request->session()->get('read_in_out');
        // if($read_in_out == 0){
        //     return '<h2>Access Denied ... <small>( !! contact your head for adequate permission !! ) </small></h2>';
        // }
        // else{
        //     return view('in_out_register',\compact('search_value','no_of_visit'));
        // }
        return view('truck_visits_list',\compact('search_value','truck_data'));
            
    }
    
    public function searchTempLabour(REQUEST $request){
        $search_value = $request->search;
        $type = $request->type;
        if($request->search == ''){
            $labour_data = labour_data::orderBy('id','DESC')->get();
        }else{
            $labour_data = labour_data::query();
            $labour_data = $labour_data->where('full_name','like','%'.$request->search.'%');
            $labour_data = $labour_data->orWhere('adhar_no','like','%'.$request->search.'%');
            $labour_data = $labour_data->orWhere('type','like','%'.$request->search.'%');
            $labour_data = $labour_data->orderBy('id','DESC');
            if($type == 0) {
                $labour_data = $labour_data->get();
            } else {
                $labour_data = $labour_data->paginate($type);
            }
        }   
        
        return view('labour_visits_list',\compact('search_value','labour_data'));
            
    }
    
    public function partyTypeSearch(REQUEST $request){
        $search_value = $request->search;
        $type = $request->type;
        if($request->search == ''){
            $labour_type = labour_type::orderBy('id','DESC')->get();
        }else{
            $labour_type = labour_type::query();
            $labour_type = $labour_type->where('name','like','%'.$request->search.'%');
            $labour_type = $labour_type->orderBy('id','DESC');
            if($type == 0) {
                $labour_type = $labour_type->get();
            } else {
                $labour_type = $labour_type->paginate($type);
            }
        }   
        
        return view('labour_type_list',\compact('search_value','labour_type'));
            
    }

    public function visitor_register(REQUEST $request){
        $visitor = visitor::orderBy('id','DESC')->paginate(10);
        $value = 1;

        $read_visitor = $request->session()->get('read_visitor');
        if($read_visitor == 0){
            return '<h2>Access Denied ... <small>( !! contact your head for adequate permission !! ) </small></h2>';
        }else{
            return view('visitor_register',\compact('visitor','value'));
        }
    }

    public function search_visitor_register(REQUEST $request){
        $search_value = $request->search;
        $type = $request->type;

        if($type == 'O'){
            $visitor = visitor::where('gender',$type)->Where('name','like','%'.$search_value.'%')->orderBy('id','DESC')->get();
        }
        else if($type == 'F'){
            $visitor = visitor::where('gender',$type)->Where('name','like','%'.$search_value.'%')->orderBy('id','DESC')->get();
        }
        else if($type == 'M'){
            $visitor = visitor::where('gender',$type)->Where('name','like','%'.$search_value.'%')->orderBy('id','DESC')->get();
        }
        else if($type == 'A'){
            $visitor = visitor::Where('name','like','%'.$search_value.'%')->orderBy('id','DESC')->get();
        }
        $read_visitor = $request->session()->get('read_visitor');
        if($read_visitor == 0){
            return '<h2>Access Denied ... <small>( !! contact your head for adequate permission !! ) </small></h2>';
        }else{
            return view('visitor_register',\compact('visitor'));
        }
    }

    public function snap(){
        if(Session::get('temp_id') == 0){
            return \redirect('/view_home');
        }else{
            return view('snap');
        }
    }
    
    public function out(REQUEST $request){
        $out_entry = $request->session()->get('out_entry');
        if($out_entry == 0){
            return '<h2>Access Denied ... <small>( !! contact your head for adequate permission !! ) </small></h2>';
        }else{
            return view('out');
        }
    }

    public function out_entry_data(REQUEST $request){
        // return $request;

        $no_of_visit_new_out = no_of_visit::find($request->out);
        $no_of_visit_new_out->in_out = date('Y-m-d h:i:s');
        $no_of_visit_new_out->save();

        $out_entry = $request->session()->get('out_entry');
        if($out_entry == 0){
            return '<h2>Access Denied ... <small>( !! contact your head for adequate permission !! ) </small></h2>';
        }else{
            return redirect('/out_entry');
        }
    }

    public function edit_visit_entry($id,REQUEST $request){
        $no_of_visit = no_of_visit::where('id',$id)->first();
        $visitor = visitor::where('id',$no_of_visit->visitor_id)->first();

        $read_in_out = $request->session()->get('read_in_out');
        if($read_in_out == 0){
            return '<h2>Access Denied ... <small>( !! contact your head for adequate permission !! ) </small></h2>';
        }else{
            return view('edit_visit_entry',\compact('id','no_of_visit','visitor'));
        }
    }

    public function snap_edit($id,REQUEST $request){
        $request->session()->put('temp_id', $id);

        if(Session::get('temp_id') == 0){
            return \redirect('/view_home');
        }else{
            return view('snap');
        }
    }

    public function update_visitor_data($id,REQUEST $request){

        $add = no_of_visit::find($id);
        $add->uid = $request->adhar_no;
        $add->company_details = $request->company_details;
        $add->company_address = $request->company_address;
        $add->company_website = $request->company_website;
        $add->company_email = $request->company_email;
        $add->company_mobile = $request->company_mobile;
        $add->whome_to_meet = $request->whome_to_meet;
        $add->designation = $request->designation;
        $add->department = $request->department;
        $add->details = $request->details;
        $add->visit_reason = $request->details;
        $add->save();

        return redirect('/edit_visit_entry/'.$id);
    }

    public function print_pdf_new_updated($id){
        //PDF
        $no_of_visit = no_of_visit::where('id',$id)->first();
        $visitor = visitor::where('uid',$no_of_visit->uid)->first();
        $fileName = $no_of_visit->image;
        // return $fileName;
        $data = array('no_of_visit' =>$no_of_visit ,'visitor'=> $visitor , 'fileName'=>$fileName);
        $pdf = PDF::loadView('pdf',$data);
        return $pdf->stream();
    }

    public function edit_visitor($id,REQUEST $request){
        $visitor = visitor::where('id',$id)->first();

        $read_visitor = $request->session()->get('read_visitor');
        if($read_visitor == 0){
            return '<h2>Access Denied ... <small>( !! contact your head for adequate permission !! ) </small></h2>';
        }else{
            return view('edit_visitor',\compact('id','visitor'));
        }
    }

    public function update_visitor_personal_data($id,REQUEST $request){
        $update = visitor::find($id);
        $update->uid = $request->adhar_no;
        $update->name = $request->full_name;
        $update->gender = $request->gender;
        $update->yob = date('Y-m-d',strtotime($request->yob));
        $update->house = $request->house;
        $update->mobile_no = $request->mobile;
        $update->email = $request->email;
        $update->save();

        return redirect('/edit_visitor/'.$id);
    }

    public function create_user_roll(REQUEST $request){

        $check_name = user_role::where('name',$request->usr_role_trim)->first();
        if($check_name){
            $data = '0';
        }else{
            $in_entry = $request->in_entry;
            $out_entry = $request->out_entry;
            $in_out_register = $request->in_out_register;
            $visitor_register = $request->visitor_register;
            $in_out_read = $request->in_out_read;
            $visitor_read = $request->visitor_read;

            $add_roll = new user_role();
            $add_roll->name =$request->usr_role_trim;
            //in_entry
            if($in_entry == 'false'){
                $add_roll->in_entry = 0;
            }else{
                $add_roll->in_entry = 1;
            }
            //out_entry
            if($out_entry == 'false'){
                $add_roll->out_entry = 0;
            }else{
                $add_roll->out_entry = 1;
            }
            //in_out_register
            if($in_out_register == 'false'){
                $add_roll->edit_in_out = 0;
            }else{
                $add_roll->edit_in_out = 1;
            }
            //visitor_register
            if($visitor_register == 'false'){
                $add_roll->edit_visitor = 0;
            }else{
                $add_roll->edit_visitor = 1;
            }
            //in_out_read
            if($in_out_read == 'false'){
                $add_roll->read_in_out = 0;
            }else{
                $add_roll->read_in_out = 1;
            }
            //visitor_read
            if($visitor_read == 'false'){
                $add_roll->read_visitor = 0;
            }else{
                $add_roll->read_visitor = 1;
            }
            $add_roll->save();
            $data = '1';
        }
        return \response($data);
    }

    public function create_new_user(){
        $user_role = user_role::get();
        return \response($user_role);
    }

    public function check_new_user_id(REQUEST $request){
        $user_table = user_table::where('user_id',$request->user_id_new)->first();
        if($user_table){
            $data = 1;
        }
        else{
            $data = 0;
        }
        return \response($data);
    }

    public function create_new_user_(REQUEST $request){
        $user_table = user_table::where('user_id',$request->user_id_new)->first();

        $full_name = $request->full_name;
        $user_id_new = $request->user_id_new;
        $password = $request->password;
        $user_role_create = $request->user_role_create;

        if($user_table){
            $data = 1;
        }
        else{
            $data = 0;

            $user_role_create_explode = \explode('|',$user_role_create);
            $user_role = user_role::where('id',$user_role_create_explode[0])->first();
            //USE ADDED
            // return $user_role;
            // exit;
            
            $user_table_add = new user_table();
            $user_table_add->name = $full_name;
            $user_table_add->user_id = $user_id_new;
            $user_table_add->password = $password;
            $user_table_add->type = $user_role_create_explode[0];
            $user_table_add->location_code = $request->session()->get('location_name');
            $user_table_add->save();

            //USER PERMISSION ADDED
            // $add_permission = new permission();
            // $add_permission->user_id = $user_table_add->id;
            // $add_permission->role_name = $user_role->name;
            // $add_permission->role_id = $user_role->id;
            // $add_permission->edit_in_out = $user_role->edit_in_out;
            // $add_permission->read_in_out = $user_role->read_in_out;
            // $add_permission->delete_in_out = $user_role->delete_in_out;
            // $add_permission->read_visitor = $user_role->read_visitor;
            // $add_permission->edit_visitor = $user_role->edit_visitor;
            // $add_permission->delete_visitor = $user_role->delete_visitor;
            // $add_permission->in_entry = $user_role->in_entry;
            // $add_permission->out_entry   = $user_role->out_entry ;
            // $add_permission->save();

        }
        return \response($data);
    }

    public function paryMasterView(REQUEST $request){
        $catagory_master = catagory_master::get();
        return view('party_master', compact('catagory_master'));
    }
    
    public function paryMasterAdd(REQUEST $request){
        $PARTY_MASTER_ADD = new party_master();
        $PARTY_MASTER_ADD->sap_code = $request->sap_code; 
        $PARTY_MASTER_ADD->catagoty_type = $request->catagoty_type; 
        $PARTY_MASTER_ADD->party_name = $request->name; 
        $PARTY_MASTER_ADD->party_address = $request->address; 
        $PARTY_MASTER_ADD->phone = $request->phone; 
        $PARTY_MASTER_ADD->email = $request->email; 
        $PARTY_MASTER_ADD->party_type = $request->party_type; 
        $PARTY_MASTER_ADD->location_code = $request->session()->get('location');
        $PARTY_MASTER_ADD->save(); 

        return redirect('/master/party/home');
    }
    
    public function paryMasterEdit(REQUEST $request, $id){
        $party_master = party_master::where('id',$id)->first();
        $catagory_master = catagory_master::get();
        $catagory_master_view = catagory_master::where('id',@$party_master->catagoty_type)->first();
        return view('party_master_edit',compact('party_master','catagory_master','catagory_master_view'));
    }
    
    public function paryMasterUpadte(REQUEST $request, $id){
        $PARTY_MASTER_ADD = party_master::find($id);
        $PARTY_MASTER_ADD->sap_code = $request->sap_code; 
        $PARTY_MASTER_ADD->catagoty_type = $request->catagoty_type; 
        $PARTY_MASTER_ADD->party_name = $request->name; 
        $PARTY_MASTER_ADD->party_address = $request->address; 
        $PARTY_MASTER_ADD->phone = $request->phone; 
        $PARTY_MASTER_ADD->email = $request->email; 
        $PARTY_MASTER_ADD->party_type = $request->party_type; 
        $PARTY_MASTER_ADD->save(); 

        return redirect('/master/pary/edit/'.$id);
    }

    public function paryMasterList(REQUEST $request){
        $party_master = party_master::paginate(10);
        return view('party_master_list',compact('party_master'));
    }
    
    public function companyAdd(REQUEST $request){
        $company_master = company_master::first();
        if (empty($company_master)){
            $company_master_add = new company_master();
            $company_master_add->location_code = '';
            $company_master_add->location_name = '';
            $company_master_add->location_address = '';
            $company_master_add->location_email = '';
            $company_master_add->location_phone = '';
            $company_master_add->save();
        }
        $company_master = company_master::first();
        return view('company_master',compact('company_master'));
    }
    
    public function companyUpdate(REQUEST $request, $id){
        $company_master_add = company_master::find($id);
        $company_master_add->location_code = $request->location_code;
        $company_master_add->location_name = $request->location_name;
        $company_master_add->location_address = $request->location_address;
        $company_master_add->location_email = $request->location_email;
        $company_master_add->location_phone = $request->location_phone;
        $company_master_add->save();
        return redirect('company');
    }
    
    public function paryMasterSearch(REQUEST $request){
        $party_master = party_master::where('party_name','like','%'.(string)$request->search.'%')
                    ->orWhere('sap_code','like','%'.(string)$request->search.'%')
                    ->orWhere('phone','like','%'.(string)$request->search.'%')
                    ->get();
                    
        return view('party_master_list',compact('party_master'));
    }
    
    public function paryMasterttHome(REQUEST $request){
        $catagory_master = catagory_master::get();
        $sap_code_list = party_master::select('sap_code','party_name')->get();
        return view('party_master_tt',compact('sap_code_list','catagory_master'));
    }
    
    public function paryMasterttAdd(REQUEST $request){
        $party_wise_tt_add = new party_wise_tt();
        $party_wise_tt_add->sap_code = $request->sap_code;
        $party_wise_tt_add->catagoty_type = $request->catagoty_type;
        $party_wise_tt_add->truck_no = $request->truck_no;
        $party_wise_tt_add->calibration_date = $request->calibration_date;
        $party_wise_tt_add->green_card = $request->green_card;
        $party_wise_tt_add->gc_valid_form = $request->gc_valid_form;
        $party_wise_tt_add->gc_valid_to = $request->gc_valid_to;
        $party_wise_tt_add->location_code = $request->session()->get('location');
        $party_wise_tt_add->save();
        return redirect('party_wise_tt');
    }
    
    public function paryMasterttList(REQUEST $request){
        $party_wise_tt = party_wise_tt::get();
        return view('party_master_tt_list',compact('party_wise_tt'));
    }
    
    public function paryMasterttEdit(REQUEST $request, $id){
        $party_wise_tt = party_wise_tt::where('id',$id)->first();
        $sap_code_list = party_master::select('sap_code')->get();
        $catagory_master = catagory_master::get();
        $catagory_master_view = catagory_master::where('id',@$party_wise_tt->catagoty_type)->first();
        return view('party_master_tt_edit',compact('party_wise_tt','sap_code_list','catagory_master','catagory_master_view'));
    }
    
    public function paryMasterttUpdate(REQUEST $request, $id){
        $party_wise_tt_add = party_wise_tt::find($id);
        $party_wise_tt_add->sap_code = $request->sap_code;
        $party_wise_tt_add->catagoty_type = $request->catagoty_type;
        $party_wise_tt_add->truck_no = $request->truck_no;
        $party_wise_tt_add->calibration_date = $request->calibration_date;
        $party_wise_tt_add->green_card = $request->green_card;
        $party_wise_tt_add->gc_valid_form = $request->gc_valid_form;
        $party_wise_tt_add->gc_valid_to = $request->gc_valid_to;
        // $party_wise_tt_add->location_code = $request->session()->get('location');
        $party_wise_tt_add->save();
        return redirect('/master/pary_tt/edit/'.$id);
    }

    public function paryMasterTTSearch(REQUEST $request){
        $party_wise_tt = party_wise_tt::where('sap_code','like','%'.(string)$request->search.'%')
                    ->get();
                    
        return view('party_master_tt_list',compact('party_wise_tt'));
    }
    
    public function truckDataScan(REQUEST $request){
        $party_master = party_master::get();
        $catagory_master = catagory_master::get();
        $party_master = party_master::where('party_type','Transporter')->get();
        return view('truck_data_scan', compact('party_master','catagory_master','party_master'));
    }
    
    public function DriverHelperEditList(REQUEST $request,$id){
        $truck_data = truck_data::where('id',$id)->first();
        $party_name = party_master::where('sap_code',@$truck_data->party)->first();
        $party_wise_tt = party_wise_tt::where('id',@$truck_data->truck_no)->first();
        $party_wise_tt_get = party_wise_tt::where('sap_code',@$truck_data->party)->get();
        $catagory_master = catagory_master::get();
        $catagory_master_view = catagory_master::where('id',@$truck_data->catagoty_type)->first();
        $party_master = party_master::where('party_type','Transporter')->get();

        // return $truck_data;
        return view('truck_data_scan_edit', compact('party_master','truck_data','party_name','party_wise_tt','party_wise_tt_get','catagory_master','catagory_master_view'));
    }
    
    
    public function truckDataloadAjax(REQUEST $request){
        $party_wise_tt = party_wise_tt::where('sap_code', $request->value)->get();
        return Response($party_wise_tt);
    }
    
    public function partyDataloadAjax(REQUEST $request){
        $party_master = party_master::where('catagoty_type', $request->value)->get();
        return Response($party_master);
    }
    
    public function LabourDataScan(REQUEST $request){
        $party_master = party_master::get();
        $labour_type = labour_type::get();
        $catagory_master = catagory_master::get();
        return view('labour_data_scan', compact('party_master','labour_type','catagory_master'));
    }
    
    public function TruckVisitList(REQUEST $request){
        $truck_data = truck_data::select('truck_data.*','party_wise_tt.truck_no')->leftJoin('party_wise_tt', 'truck_data.truck_no', '=', 'party_wise_tt.id')->paginate(10);
        return view('truck_visits_list', compact('truck_data'));
    }
    
    public function TruckVisitEditUploadSection(REQUEST $request, $id){
        $truck_data = truck_data::where('id',$id)->first();
        return view('truck_data_scan_pic_upload', compact('truck_data'));
    }
    
    public function TruckVisitPdfPrintView(REQUEST $request, $id){
        $truck_data = truck_data::where('id',$id)->first();
        $party_wise_tt = party_wise_tt::where('id',$truck_data->truck_no)->first();
        // return $truck_data;
        return view('truck_data_scan_print_pdf', compact('truck_data','party_wise_tt'));
    }
    
    public function TruckVisitPdfPrintNow(REQUEST $request, $id){
        $truck_data = truck_data::where('id',$id)->first();
        
        // return $truck_data;
        $pdf = PDF::loadView('truck_data_scan_pdf',$truck_data);
        return $pdf->stream();
    }
    
    public function TruckVisitUploadFile(REQUEST $request, $id){
        // return $request;
        if(!empty($request->image)) {
            // File Upload
            $img = $request->image;
            $image_parts = explode(";base64,", $img);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            
            //decoding image
            $image_base64 = base64_decode($image_parts[1]);
            $fileName = uniqid() . '.png';

            //saving image
            file_put_contents(public_path().'/files/'.$fileName, $image_base64);

            //updating file name
            $update_file_name = truck_data::find($id);
            $update_file_name->upload_photo_documents = $fileName;
            $update_file_name->process_stage = 2;
            $update_file_name->save();
        }
        else {
            if($request->hasFile('upload_photo_documents')) {
                $file_img_name = $request->file('upload_photo_documents');
                $file_name = time().'.'.$file_img_name->getClientOriginalExtension();
                $destinationPath = public_path('/files');
                $file_img_name->move($destinationPath, $file_name);
                
                $truck_data_update = truck_data::find($id);
                $truck_data_update->upload_photo_documents = $file_name;
                $truck_data_update->process_stage = 2;
                $truck_data_update->save();
            }

        }
        // return redirect('/truck/data/update/file/upload/section/'.$id);

        $temp_truck_data = truck_data::where('id',$id)->first();
        if(!empty($temp_truck_data->upload_photo_documents)) {
            return redirect('truck/data/pdf/print/'.$id);
        } else {
            return redirect('/truck/data/update/file/upload/section/'.$id);
        }
    }
    

    // DRIVER HELPER ADD
    public function DriverHelperAdd(REQUEST $request){
        // return $request;
        $truck_data_add = new truck_data();
        $truck_data_add->party = $request->party;
        $truck_data_add->truck_no = $request->truck_no;
        $truck_data_add->card_type = $request->card_type;
        // $truck_data_add->catagoty_type = $request->catagoty_type;
        $truck_data_add->recipent_date = $request->recipent_date;
        $truck_data_add->valid_to_training_oisd = $request->valid_to_training_oisd;
        $truck_data_add->valid_from_training_oisd = $request->valid_from_training_oisd;
        $truck_data_add->oisd_training = $request->oisd_training;
        $truck_data_add->type = $request->type;
        $truck_data_add->adhar_no = $request->adhar_no;
        $truck_data_add->full_name = $request->full_name;
        $truck_data_add->hiv_test = $request->hiv_test;
        $truck_data_add->fathers_name = $request->fathers_name;
        $truck_data_add->gender = $request->gender;
        $truck_data_add->yob = $request->yob;
        $truck_data_add->mobile = $request->mobile;
        $truck_data_add->house = $request->house;
        $truck_data_add->dl_no = $request->dl_no;

        $truck_data_add->helth_checkup = $request->helth_checkup;
        $truck_data_add->insurance_validity = $request->insurance_validity;

        $truck_data_add->issueing_rto = $request->issueing_rto;
        $truck_data_add->eye_sight = $request->eye_sight;
        $truck_data_add->from_j	 = $request->from_j;
        $truck_data_add->from_h = $request->from_h;
        $truck_data_add->police_verification = $request->police_verification;
        $truck_data_add->ref = $request->ref;
        $truck_data_add->police_station = $request->police_station;
        $truck_data_add->valid_from = $request->valid_from;
        $truck_data_add->valid_to = $request->valid_to;
        $truck_data_add->valid_from_training = $request->valid_from_training;
        $truck_data_add->valid_to_training = $request->valid_to_training;
        $truck_data_add->issue_date = $request->issue_date;
        $truck_data_add->hg_training = $request->hg_training;

        // $date = '';
        // if($request->card_type == "Temporary") {
        //     $date = date('Y-m-d');
        //     $date = strtotime($date);
        //     $date = strtotime("+7 day", $date);
        //     $date = date('Y-m-d', $date);
        // } else {
        //     $date = date('Y-m-d');
        //     $date = strtotime($date);
        //     $date = strtotime("+6 month", $date);
        //     $date = date('Y-m-d', $date);
        // }
        $truck_data_add->valid_up_to = $request->card_valid_to;


        $truck_data_add->blood_group = $request->blood_group;
        $truck_data_add->insurance_twelve_rupee = $request->insurance_twelve_rupee;
        $truck_data_add->insurance_three_thirty_rupee = $request->insurance_three_thirty_rupee;
        $truck_data_add->nominee_name = $request->nominee_name;
        $truck_data_add->bank_ac = $request->bank_ac;
        $truck_data_add->created_at = date('Y-m-d');
        $truck_data_add->identity_mark = $request->identity_mark;
        $truck_data_add->card_valid_from = $request->card_valid_from;
        $truck_data_add->card_valid_to = $request->card_valid_to;
        $truck_data_add->hiv_test_date = $request->hiv_test_date;

        //prifix
        // $location_code = location::where('id',$location_code_id)->first();
        $location_code = $request->session()->get('location_name');
        $location_name = substr(@$location_code, 0, 3);
        $temp = false;
        $RandNoPrefix = 'P';
        if ($temp == true) {
            $RandNoPrefix = 'T';
        }
        $countDriverHelper = truck_data::count();
        $pad_length = 4;
        $pad_char = 0;
        $str_type = 'd'; // treats input as integer, and outputs as a (signed) decimal number

        $format = "%{$pad_char}{$pad_length}{$str_type}"; // or "%04d"

        // output and echo
        printf($format, 123);

        // output to a variable
        $formatted_str = sprintf($format, $countDriverHelper);
        $CardType = $request->card_type;
        $truck_data_add->card_number = $CardType[0].$location_name.$RandNoPrefix.'1'.$formatted_str;
        $truck_data_add->temp = $temp;
        $truck_data_add->location_code = $request->session()->get('location_code');

        // File Upload
        if($request->hasFile('upload_documents')) {
            $file_img_name = $request->file('upload_documents');
            $file_name = time().'.'.$file_img_name->getClientOriginalExtension();
            $destinationPath = public_path('/files');
            $file_img_name->move($destinationPath, $file_name);
        
            $truck_data_add->upload_documents = $file_name;
          }

        $truck_data_add->process_stage = 1;
        // $truck_data_add->insuranse_rs_1 = $request->insuranse_rs_1;
        // $truck_data_add->insuranse_rs_2 = $request->insuranse_rs_2;
        // $truck_data_add->nominee = $request->nominee;
        // $truck_data_add->bank_account = $request->bank_account;
        // $truck_data_add->hiv_test = $request->hiv_test;
        // $truck_data_add->fitness_test = $request->fitness_test;
        
        // $truck_data_add->created_date = $request->
        $truck_data_add->create_user = $request->session()->get('id');
        // $truck_data_add->attach_document = $request->
        // $truck_data_add->location_code = $request->
        $truck_data_add->save();

        // return redirect('/truck/data/scan/edit/'.$truck_data_add->id);
        return redirect('/truck/data/update/file/upload/section/'.$truck_data_add->id);
    }

    public function DriverHelperRenewTemp(REQUEST $request, $id){
        $truck_data_old = truck_data::where('id',$id)->first();

        $someDate = new \DateTime($truck_data_old->valid_up_to);
        $now = new \DateTime();

        if($someDate->diff($now)->days > 7) {
            $date = date('Y-m-d');
            $date = strtotime($date);
            $date = strtotime("+7 day", $date);
            $date = date('Y-m-d', $date);
        } else {
            $date = date('Y-m-d');
            $date = strtotime($truck_data_old->valid_up_to);
            $date = strtotime("+7 day", $date);
            $date = date('Y-m-d', $date);
        }

        $truck_data_update = truck_data::find($id);
        $truck_data_update->valid_up_to = $date;
        $truck_data_update->temp_renew = (int)$truck_data_old->temp_renew + 1;
        $truck_data_update->save();

        return redirect('truck/visit/list');
        
    }
    public function DriverHelperRenewPer(REQUEST $request, $id){
        $truck_data_old = truck_data::where('id',$id)->first();

        $date = date('Y-m-d');
        $date = strtotime($date);
        $date = strtotime("+6 month", $date);
        $date = date('Y-m-d', $date);

        $truck_data_update = truck_data::find($id);
        $truck_data_update->valid_up_to = $date;
        $truck_data_update->per_renew = (int)$truck_data_old->per_renew + 1;
        $truck_data_update->save();

        return redirect('truck/visit/list');
        
    }
    
   
    public function LabourRenewTemp(REQUEST $request, $id){
        $labour_data_old = labour_data::where('id',$id)->first();
        $someDate = new \DateTime($labour_data_old->valid_up_to);
        $now = new \DateTime();

        if($someDate->diff($now)->days > 7) {
            $date = date('Y-m-d');
            $date = strtotime($date);
            $date = strtotime("+7 day", $date);
            $date = date('Y-m-d', $date);
        } else {
            $date = date('Y-m-d');
            $date = strtotime($labour_data_old->valid_up_to);
            $date = strtotime("+7 day", $date);
            $date = date('Y-m-d', $date);
        }

        $UPDATE_LABOUR_DATA = labour_data::find($id);
        $UPDATE_LABOUR_DATA->valid_up_to = $date;
        $UPDATE_LABOUR_DATA->temp_renew = (int)$labour_data_old->temp_renew + 1;
        $UPDATE_LABOUR_DATA->save();

        return redirect('labour/data/list');
        
    }
    
    public function LabourRenewPer(REQUEST $request, $id){
        $labour_data_old = labour_data::where('id',$id)->first();

        $date = date('Y-m-d');
        $date = strtotime($date);
        $date = strtotime("+6 month", $date);
        $date = date('Y-m-d', $date);

        $UPDATE_LABOUR_DATA = labour_data::find($id);
        $UPDATE_LABOUR_DATA->valid_up_to = $date;
        $UPDATE_LABOUR_DATA->per_renew = (int)$labour_data_old->per_renew + 1;
        $UPDATE_LABOUR_DATA->save();

        return redirect('labour/data/list');
        
    }
    
    public function DriverHelperEditUpdate(REQUEST $request, $id){
        // return $request;
        $truck_data_update = truck_data::find($id);
        $truck_data_update->party = $request->party;
        $truck_data_update->truck_no = $request->truck_no;
        $truck_data_update->card_type = $request->card_type;
        // $truck_data_update->catagoty_type = $request->catagoty_type;
        $truck_data_update->recipent_date = $request->recipent_date;
        $truck_data_update->valid_to_training_oisd = $request->valid_to_training_oisd;
        $truck_data_update->valid_from_training_oisd = $request->valid_from_training_oisd;
        $truck_data_update->oisd_training = $request->oisd_training;
        $truck_data_update->type = $request->type;
        $truck_data_update->adhar_no = $request->adhar_no;
        $truck_data_update->full_name = $request->full_name;
        $truck_data_update->hiv_test = $request->hiv_test;
        $truck_data_update->fathers_name = $request->fathers_name;
        $truck_data_update->gender = $request->gender;
        $truck_data_update->yob = $request->yob;
        $truck_data_update->mobile = $request->mobile;
        $truck_data_update->house = $request->house;
        $truck_data_update->dl_no = $request->dl_no;

        $truck_data_update->helth_checkup = $request->helth_checkup;
        $truck_data_update->insurance_validity = $request->insurance_validity;

        $truck_data_update->issueing_rto = $request->issueing_rto;
        $truck_data_update->eye_sight = $request->eye_sight;
        $truck_data_update->from_j	 = $request->from_j;
        $truck_data_update->from_h = $request->from_h;
        $truck_data_update->police_verification = $request->police_verification;
        $truck_data_update->ref = $request->ref;
        $truck_data_update->police_station = $request->police_station;
        $truck_data_update->valid_from = $request->valid_from;
        $truck_data_update->valid_to = $request->valid_to;
        $truck_data_update->valid_from_training = $request->valid_from_training;
        $truck_data_update->valid_to_training = $request->valid_to_training;
        $truck_data_update->issue_date = $request->issue_date;
        $truck_data_update->hg_training = $request->hg_training;    

        // $truck_data_old = truck_data::where('id',$id)->first();
        // if($request->card_type !== $truck_data_old->card_type) {
        //     $date = '';
        //     if($request->card_type == "Temporary") {
        //         $date = date('Y-m-d');
        //         $date = strtotime($date);
        //         $date = strtotime("+7 day", $date);
        //         $date = date('Y-m-d', $date);
        //     } else {
        //         $date = date('Y-m-d');
        //         $date = strtotime($date);
        //         $date = strtotime("+6 month", $date);
        //         $date = date('Y-m-d', $date);
        //     }

        //     $truck_data_update->valid_up_to = $date;
        // }

        $truck_data_update->valid_up_to = $request->card_valid_to;
        

        $truck_data_update->blood_group = $request->blood_group;
        $truck_data_update->insurance_twelve_rupee = $request->insurance_twelve_rupee;
        $truck_data_update->insurance_three_thirty_rupee = $request->insurance_three_thirty_rupee;
        $truck_data_update->nominee_name = $request->nominee_name;
        $truck_data_update->bank_ac = $request->bank_ac;
        $truck_data_update->identity_mark = $request->identity_mark;
        $truck_data_update->card_valid_from = $request->card_valid_from;
        $truck_data_update->card_valid_to = $request->card_valid_to;
        $truck_data_update->hiv_test_date = $request->hiv_test_date;

        // File Upload
        if($request->hasFile('upload_documents')) {
            $file_img_name = $request->file('upload_documents');
            $file_name = time().'.'.$file_img_name->getClientOriginalExtension();
            $destinationPath = public_path('/files');
            $file_img_name->move($destinationPath, $file_name);
        
            $truck_data_update->upload_documents = $file_name;
          }

        $truck_data_get = truck_data::where('id',$id)->first();
        $truck_data_update->process_stage = $truck_data_get->process_stage;

        // $truck_data_update->insuranse_rs_1 = $request->insuranse_rs_1;
        // $truck_data_update->insuranse_rs_2 = $request->insuranse_rs_2;
        // $truck_data_update->nominee = $request->nominee;
        // $truck_data_update->bank_account = $request->bank_account;
        // $truck_data_update->hiv_test = $request->hiv_test;
        // $truck_data_update->fitness_test = $request->fitness_test;
        $truck_data_update->save();

        // return redirect('/truck/data/scan/edit/'.$id);
        return redirect('/truck/data/update/file/upload/section/'.$id);
    }

    public function LabourPicUpload (REQUEST $request, $id) {
        $labour_data = labour_data::where('id',$id)->first();
        // return $labour_data;
        return view('labour_data_scan_pic_upload', compact('labour_data'));
    }
    
    public function LabourDataList (REQUEST $request) {
        $labour_data = labour_data::select('labour_type.name', 'labour_data.*')->leftJoin('labour_type', 'labour_data.type', '=', 'labour_type.id')->paginate(10);
        // return $labour_data;
        return view('labour_visits_list', compact('labour_data'));
    }
    
    public function LabourEdit (REQUEST $request, $id) {
        $labour_data = labour_data::where('id',$id)->first();
        $party_master = party_master::get();
        $labour_type_get = labour_type::get();
        $labour_type = labour_type::where('id',$labour_data->type)->first();
        $party_name = party_master::where('sap_code',@$labour_data->party)->first();
        $catagory_master = catagory_master::get();
        $catagory_master_view = catagory_master::where('id',@$labour_data->catagoty_type)->first();
        $party_master_data = party_master::where('id',$labour_data->party)->first();

        // return $labour_data;
        return view('labour_data_scan_edit', compact('labour_type_get','labour_type','labour_data','party_master','party_master_data','catagory_master_view','catagory_master','party_name'));
    }
    
    public function LabourPdf (REQUEST $request, $id) {
        $labour_data = labour_data::where('id',$id)->first();
        // return $labour_data;
        return view('labour_data_scan_pdf', compact('labour_data'));
    }

    public function LabourUploadFile(REQUEST $request, $id){
        // return $request;
        if(!empty($request->image)) {
            // File Upload
            $img = $request->image;
            $image_parts = explode(";base64,", $img);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            
            //decoding image
            $image_base64 = base64_decode($image_parts[1]);
            $fileName = uniqid() . '.png';

            //saving image
            file_put_contents(public_path().'/files/'.$fileName, $image_base64);

            //updating file name
            $update_file_name = labour_data::find($id);
            $update_file_name->upload_photo_documents = $fileName;
            $update_file_name->process_stage = 2;
            $update_file_name->save();
        }
        else {
            if($request->hasFile('upload_photo_documents')) {
                $file_img_name = $request->file('upload_photo_documents');
                $file_name = time().'.'.$file_img_name->getClientOriginalExtension();
                $destinationPath = public_path('/files');
                $file_img_name->move($destinationPath, $file_name);
                
                $labour_data_update = labour_data::find($id);
                $labour_data_update->upload_photo_documents = $file_name;
                $labour_data_update->process_stage = 2;
                $labour_data_update->save();
            }

        }
        // return redirect('/truck/data/update/file/upload/section/'.$id);

        $temp_labour_data = labour_data::where('id',$id)->first();
        if(!empty($temp_labour_data->upload_photo_documents)) {
            return redirect('labour/data/pdf/print/'.$id);
        } else {
            return redirect('labour/data/image/upload/'.$id);
        }
    }
    

    public function LabourDataAdd (REQUEST $request) {
        // return $request;

        $ADD_LABOUR_DATA = new labour_data();
        $ADD_LABOUR_DATA->party = $request->party;
        $ADD_LABOUR_DATA->truck_no = $request->truck_no;
        $ADD_LABOUR_DATA->card_type = $request->card_type;
        $ADD_LABOUR_DATA->catagoty_type = $request->catagoty_type;
        $ADD_LABOUR_DATA->recipent_date = $request->recipent_date;
        $ADD_LABOUR_DATA->valid_to_training_oisd = $request->valid_to_training_oisd;
        $ADD_LABOUR_DATA->valid_from_training_oisd = $request->valid_from_training_oisd;
        $ADD_LABOUR_DATA->oisd_training = $request->oisd_training;
        $ADD_LABOUR_DATA->type = $request->type;
        $ADD_LABOUR_DATA->adhar_no = $request->adhar_no;
        $ADD_LABOUR_DATA->full_name = $request->full_name;
        $ADD_LABOUR_DATA->hiv_test = $request->hiv_test;
        $ADD_LABOUR_DATA->fathers_name = $request->fathers_name;
        $ADD_LABOUR_DATA->gender = $request->gender;
        $ADD_LABOUR_DATA->yob = $request->yob;
        $ADD_LABOUR_DATA->mobile = $request->mobile;
        $ADD_LABOUR_DATA->house = $request->house;
        $ADD_LABOUR_DATA->dl_no = $request->dl_no;

        $ADD_LABOUR_DATA->helth_checkup = $request->helth_checkup;
        $ADD_LABOUR_DATA->insurance_validity = $request->insurance_validity;

        $ADD_LABOUR_DATA->issueing_rto = $request->issueing_rto;
        $ADD_LABOUR_DATA->eye_sight = $request->eye_sight;
        $ADD_LABOUR_DATA->from_j	 = $request->from_j;
        $ADD_LABOUR_DATA->from_h = $request->from_h;
        $ADD_LABOUR_DATA->police_verification = $request->police_verification;
        $ADD_LABOUR_DATA->ref = $request->ref;
        $ADD_LABOUR_DATA->police_station = $request->police_station;
        $ADD_LABOUR_DATA->valid_from = $request->valid_from;
        $ADD_LABOUR_DATA->valid_to = $request->valid_to;
        $ADD_LABOUR_DATA->valid_from_training = $request->valid_from_training;
        $ADD_LABOUR_DATA->valid_to_training = $request->valid_to_training;
        $ADD_LABOUR_DATA->issue_date = $request->issue_date;
        $ADD_LABOUR_DATA->hg_training = $request->hg_training;

        // $date = '';
        // if($request->card_type == "Temporary") {
        //     $date = date('Y-m-d');
        //     $date = strtotime($date);
        //     $date = strtotime("+7 day", $date);
        //     $date = date('Y-m-d', $date);
        // } else {
        //     $date = date('Y-m-d');
        //     $date = strtotime($date);
        //     $date = strtotime("+6 month", $date);
        //     $date = date('Y-m-d', $date);
        // }

        $ADD_LABOUR_DATA->valid_up_to = $request->card_valid_to;

        $ADD_LABOUR_DATA->blood_group = $request->blood_group;
        $ADD_LABOUR_DATA->insurance_twelve_rupee = $request->insurance_twelve_rupee;
        $ADD_LABOUR_DATA->insurance_three_thirty_rupee = $request->insurance_three_thirty_rupee;
        $ADD_LABOUR_DATA->nominee_name = $request->nominee_name;
        $ADD_LABOUR_DATA->bank_ac = $request->bank_ac;
        $ADD_LABOUR_DATA->identity_mark = $request->identity_mark;
        $ADD_LABOUR_DATA->card_valid_from = $request->card_valid_from;
        $ADD_LABOUR_DATA->card_valid_to = $request->card_valid_to;
        $ADD_LABOUR_DATA->created_at = date('Y-m-d');

        //prifix
        // $location_code = location::where('id',$location_code_id)->first();
        $location_code = $request->session()->get('location_name');
        $location_name = substr(@$location_code, 0, 3);
        $temp = false;
        $RandNoPrefix = 'P';
        if ($temp == true) {
            $RandNoPrefix = 'T';
        }
        $countDriverHelper = truck_data::count();
        $pad_length = 4;
        $pad_char = 0;
        $str_type = 'd'; // treats input as integer, and outputs as a (signed) decimal number

        $format = "%{$pad_char}{$pad_length}{$str_type}"; // or "%04d"

        // output and echo
        printf($format, 123);

        // output to a variable
        $formatted_str = sprintf($format, $countDriverHelper);
        $CardType = $request->card_type;
        $ADD_LABOUR_DATA->card_number = $CardType[0].$location_name.$RandNoPrefix.'1'.$formatted_str;
        $ADD_LABOUR_DATA->temp = $temp;
        $ADD_LABOUR_DATA->location_code = $request->session()->get('location_code');

        // File Upload
        if($request->hasFile('upload_documents')) {
            $file_img_name = $request->file('upload_documents');
            $file_name = time().'.'.$file_img_name->getClientOriginalExtension();
            $destinationPath = public_path('/files');
            $file_img_name->move($destinationPath, $file_name);
        
            $ADD_LABOUR_DATA->upload_documents = $file_name;
          }

        $ADD_LABOUR_DATA->process_stage = 1;
        $ADD_LABOUR_DATA->create_user = $request->session()->get('id');
        $ADD_LABOUR_DATA->save();


        // $ADD_LABOUR_DATA = new labour_data();
        // $ADD_LABOUR_DATA->party = $request->party;
        // $ADD_LABOUR_DATA->adhar_no = $request->adhar_no;
        // $ADD_LABOUR_DATA->type = $request->type;
        // $ADD_LABOUR_DATA->yob = $request->yob;
        // $ADD_LABOUR_DATA->full_name = $request->full_name;
        // $ADD_LABOUR_DATA->fathers_name = $request->fathers_name;
        // $ADD_LABOUR_DATA->mobile = $request->mobile;
        // $ADD_LABOUR_DATA->valid_up_to = $request->valid_up_to;
        // $ADD_LABOUR_DATA->house = $request->house;
        // $ADD_LABOUR_DATA->blood_group = $request->blood_group;
        // $ADD_LABOUR_DATA->issue_date = $request->issue_date;

        // $ADD_LABOUR_DATA->bank_ac = $request->bank_ac;
        // $ADD_LABOUR_DATA->nominee_name = $request->nominee_name;
        // $ADD_LABOUR_DATA->insurance_three_thirty_rupee = $request->insurance_three_thirty_rupee;
        // $ADD_LABOUR_DATA->insurance_twelve_rupee = $request->insurance_twelve_rupee;

        // $ADD_LABOUR_DATA->from_j = $request->from_j;
        // $ADD_LABOUR_DATA->from_h = $request->from_h;
        // $ADD_LABOUR_DATA->police_verification = $request->police_verification;
        // $ADD_LABOUR_DATA->ref = $request->ref;
        // $ADD_LABOUR_DATA->police_station = $request->police_station;
        // $ADD_LABOUR_DATA->valid_from = $request->valid_from;
        // $ADD_LABOUR_DATA->valid_to = $request->valid_to;
        // $ADD_LABOUR_DATA->process_stage = 1;

        // // $location_code = location::where('id',$location_code_id)->first();
        // $location_code = $request->session()->get('location_name');
        // $location_name = substr(@$location_code, 0, 3);
        // // return $location_name;
        // $temp = false;
        // $RandNoPrefix = 'P';
        // if ($temp == true) {
        //     $RandNoPrefix = 'T';
        // }
        // $countDriverHelper = labour_data::count();
        // $pad_length = 4;
        // $pad_char = 0;
        // $str_type = 'd'; // treats input as integer, and outputs as a (signed) decimal number

        // $format = "%{$pad_char}{$pad_length}{$str_type}"; // or "%04d"

        // // output and echo
        // printf($format, 123);

        // // output to a variable
        // $formatted_str = sprintf($format, $countDriverHelper);

        // $ADD_LABOUR_DATA->card_number = $location_name.$RandNoPrefix.'1'.$formatted_str;
        // $ADD_LABOUR_DATA->temp = $temp;
        // $ADD_LABOUR_DATA->location_code = $request->session()->get('location_code');


        // $ADD_LABOUR_DATA->save();

        // return $ADD_LABOUR_DATA;
        return redirect('labour/data/image/upload/'.$ADD_LABOUR_DATA->id);
    }
    
    public function LabourUpdate (REQUEST $request, $id) {
        // return $request;
        $UPDATE_LABOUR_DATA = labour_data::find($id);

        $UPDATE_LABOUR_DATA->party = $request->party;
        $UPDATE_LABOUR_DATA->truck_no = $request->truck_no;
        $UPDATE_LABOUR_DATA->card_type = $request->card_type;
        $UPDATE_LABOUR_DATA->catagoty_type = $request->catagoty_type;
        $UPDATE_LABOUR_DATA->recipent_date = $request->recipent_date;
        $UPDATE_LABOUR_DATA->valid_to_training_oisd = $request->valid_to_training_oisd;
        $UPDATE_LABOUR_DATA->valid_from_training_oisd = $request->valid_from_training_oisd;
        $UPDATE_LABOUR_DATA->oisd_training = $request->oisd_training;
        $UPDATE_LABOUR_DATA->type = $request->type;
        $UPDATE_LABOUR_DATA->adhar_no = $request->adhar_no;
        $UPDATE_LABOUR_DATA->full_name = $request->full_name;
        $UPDATE_LABOUR_DATA->hiv_test = $request->hiv_test;
        $UPDATE_LABOUR_DATA->fathers_name = $request->fathers_name;
        $UPDATE_LABOUR_DATA->gender = $request->gender;
        $UPDATE_LABOUR_DATA->yob = $request->yob;
        $UPDATE_LABOUR_DATA->mobile = $request->mobile;
        $UPDATE_LABOUR_DATA->house = $request->house;
        $UPDATE_LABOUR_DATA->dl_no = $request->dl_no;

        $UPDATE_LABOUR_DATA->helth_checkup = $request->helth_checkup;
        $UPDATE_LABOUR_DATA->insurance_validity = $request->insurance_validity;

        $UPDATE_LABOUR_DATA->issueing_rto = $request->issueing_rto;
        $UPDATE_LABOUR_DATA->eye_sight = $request->eye_sight;
        $UPDATE_LABOUR_DATA->from_j	 = $request->from_j;
        $UPDATE_LABOUR_DATA->from_h = $request->from_h;
        $UPDATE_LABOUR_DATA->police_verification = $request->police_verification;
        $UPDATE_LABOUR_DATA->ref = $request->ref;
        $UPDATE_LABOUR_DATA->police_station = $request->police_station;
        $UPDATE_LABOUR_DATA->valid_from = $request->valid_from;
        $UPDATE_LABOUR_DATA->valid_to = $request->valid_to;
        $UPDATE_LABOUR_DATA->valid_from_training = $request->valid_from_training;
        $UPDATE_LABOUR_DATA->valid_to_training = $request->valid_to_training;
        $UPDATE_LABOUR_DATA->issue_date = $request->issue_date;
        $UPDATE_LABOUR_DATA->hg_training = $request->hg_training;

        // $truck_data_old = labour_data::where('id',$id)->first();
        // if($request->card_type !== $truck_data_old->card_type) {
        //     $date = '';
        //     if($request->card_type == "Temporary") {
        //         $date = date('Y-m-d');
        //         $date = strtotime($date);
        //         $date = strtotime("+7 day", $date);
        //         $date = date('Y-m-d', $date);
        //     } else {
        //         $date = date('Y-m-d');
        //         $date = strtotime($date);
        //         $date = strtotime("+6 month", $date);
        //         $date = date('Y-m-d', $date);
        //     }

        //     $UPDATE_LABOUR_DATA->valid_up_to = $date;
        // }
        $UPDATE_LABOUR_DATA->valid_up_to = $request->card_valid_to;

        $UPDATE_LABOUR_DATA->blood_group = $request->blood_group;
        $UPDATE_LABOUR_DATA->insurance_twelve_rupee = $request->insurance_twelve_rupee;
        $UPDATE_LABOUR_DATA->insurance_three_thirty_rupee = $request->insurance_three_thirty_rupee;
        $UPDATE_LABOUR_DATA->nominee_name = $request->nominee_name;
        $UPDATE_LABOUR_DATA->bank_ac = $request->bank_ac;
        $UPDATE_LABOUR_DATA->identity_mark = $request->identity_mark;
        $UPDATE_LABOUR_DATA->card_valid_from = $request->card_valid_from;
        $UPDATE_LABOUR_DATA->card_valid_to = $request->card_valid_to;
        // $UPDATE_LABOUR_DATA->party = $request->party;
        // $UPDATE_LABOUR_DATA->type = $request->type;
        // $UPDATE_LABOUR_DATA->yob = $request->yob;
        // $UPDATE_LABOUR_DATA->adhar_no = $request->adhar_no;
        // $UPDATE_LABOUR_DATA->full_name = $request->full_name;
        // $UPDATE_LABOUR_DATA->fathers_name = $request->fathers_name;
        // $UPDATE_LABOUR_DATA->mobile = $request->mobile;
        // $UPDATE_LABOUR_DATA->valid_up_to = $request->valid_up_to;
        // $UPDATE_LABOUR_DATA->house = $request->house;
        // $UPDATE_LABOUR_DATA->blood_group = $request->blood_group;
        // $UPDATE_LABOUR_DATA->issue_date = $request->issue_date;
        
        // $UPDATE_LABOUR_DATA->bank_ac = $request->bank_ac;
        // $UPDATE_LABOUR_DATA->nominee_name = $request->nominee_name;
        // $UPDATE_LABOUR_DATA->insurance_three_thirty_rupee = $request->insurance_three_thirty_rupee;
        // $UPDATE_LABOUR_DATA->insurance_twelve_rupee = $request->insurance_twelve_rupee;

        // $UPDATE_LABOUR_DATA->from_j = $request->from_j;
        // $UPDATE_LABOUR_DATA->from_h = $request->from_h;
        // $UPDATE_LABOUR_DATA->police_verification = $request->police_verification;
        // $UPDATE_LABOUR_DATA->ref = $request->ref;
        // $UPDATE_LABOUR_DATA->police_station = $request->police_station;
        // $UPDATE_LABOUR_DATA->valid_from = $request->valid_from;
        // $UPDATE_LABOUR_DATA->valid_to = $request->valid_to;
        $UPDATE_LABOUR_DATA->save();

        // return $ADD_LABOUR_DATA;
        return redirect('labour/data/image/upload/'.$id);
    }

    public function LabourTypeCreateView(REQUEST $request) {
        return view('labour_type');
    }
    
    public function LabourTypeEditView(REQUEST $request, $id) {
        $labour_type = labour_type::where('id',$id)->first();
        return view('labour_type_edit',compact('labour_type'));
    }

    public function LabourTypeListView(REQUEST $request) {
        $labour_type = labour_type::paginate(10);
        return view('labour_type_list',compact('labour_type'));
    }
    
    public function LabourTypeCreate(REQUEST $request) {
        $NameValue = strtoupper($request->name);
        $labour_type_add = new labour_type();
        $labour_type_add->name = $NameValue;
        $labour_type_add->save();

        return redirect('/labour_type/create');
    }
    
    public function LabourTypeEditUpdate(REQUEST $request, $id) {
        $NameValue = strtoupper($request->name);
        $labour_type_update = labour_type::find($id);
        $labour_type_update->name = $NameValue;
        $labour_type_update->save();

        return redirect('/labour_type/edit/'.$id);
    }
    
    public function blackListList(REQUEST $request) {
        $truck_data_temp = truck_data::select('id','adhar_no','full_name')->distinct('adhar_no')->get();
        $labour_data_temp = labour_data::select('id','adhar_no','full_name')->distinct('adhar_no')->get();
        $truck_data = [];
        $labour_data = [];
        $keyItem = 0;
        foreach($truck_data_temp as $item) {
            $blacklist = [];
            $blacklist = blacklist::where('aadhar',$item->adhar_no)->first();
            if(empty($blacklist)) {
                array_push($truck_data, $item);
            }
        }
        foreach($labour_data_temp as $item) {
            $blacklist = [];
            $blacklist = blacklist::where('aadhar',$item->adhar_no)->first();
            if(empty($blacklist)) {
                array_push($labour_data, $item);
            }
        }

        $blacklistList = blacklist::select('blacklist.id','blacklist.aadhar','blacklist.type','blacklist.location','blacklist.created_at', 'truck_data.upload_photo_documents as truck_pic', 'labour_data.upload_photo_documents as labour_pic')
                                    ->leftJoin('truck_data', 'blacklist.aadhar', '=', 'truck_data.adhar_no')
                                    ->leftJoin('labour_data', 'blacklist.aadhar', '=', 'labour_data.adhar_no')
                                    ->paginate(10);
        $company_master = [];
        if($blacklistList) {
            $company_master = company_master::where('location_code', @$blacklistList[0]->location)->first();
        }
        $name = 'ADD TRUCK BLACKLIST';
        return view('blacklist',compact('company_master','truck_data','labour_data','blacklistList','name'));
    }
    
    public function blackListAdd(REQUEST $request) {
        $TempAadhar = explode(',',$request->aadhar_no);
        $blacklist_ADD = new blacklist();
        $blacklist_ADD->aadhar = @$TempAadhar[0];
        $blacklist_ADD->type = @$TempAadhar[2];
        $blacklist_ADD->location = $request->session()->get('location_code'); 
        $blacklist_ADD->save();

        return redirect('/blacklist');
    }
    
    public function blackListRemove(REQUEST $request, $id) {
        $blacklist = blacklist::where('id',$id)->delete();
        return redirect('/blacklist');
    }
    
    public function blackListSearch(REQUEST $request) {
        $truck_data_temp = truck_data::select('id','adhar_no','full_name')->distinct('adhar_no')->get();
        $truck_data = [];
        $keyItem = 0;
        foreach($truck_data_temp as $item) {
            $blacklist = [];
            $blacklist = blacklist::where('aadhar',$item->adhar_no)->first();
            if(empty($blacklist)) {
                array_push($truck_data, $item);
            }
        }


        $blacklistList = blacklist::where('aadhar','like','%'.$request->search.'%')->orderBy('id','DESC')->get();
        return view('blacklist',compact('truck_data','blacklistList'));
    }
    

    public function BlacklistAadharNo(REQUEST $request){
        $blacklist = blacklist::where('aadhar', $request->value)->first();
        if ($blacklist) {
            return Response('true');
        } else {
            return Response('false');
        }
    }

    public function catagoryMasterView(REQUEST $request){
        return view('catagory_master');
    }

    public function catagoryMasterAdd(REQUEST $request){
        $catagory_MASTER_ADD = new catagory_master();
        $catagory_MASTER_ADD->catagory_name = $request->name; 
        $catagory_MASTER_ADD->save(); 

        return redirect('/master/catagory/home');
    }

    public function catagoryMasterList(REQUEST $request){
        $catagory_master = catagory_master::paginate(10);
        return view('catagory_master_list',compact('catagory_master'));
    }

    public function catagoryMasterSearch(REQUEST $request){
        $catagory_master = catagory_master::where('catagory_name','like','%'.(string)$request->search.'%')
                    ->get();
                    
        return view('catagory_master_list',compact('catagory_master'));
    }

    public function catagoryMasterEdit(REQUEST $request, $id){
        $catagory_master = catagory_master::where('id',$id)->first();
        return view('catagory_master_edit',compact('catagory_master'));
    }

    public function catagoryMasterUpadte(REQUEST $request, $id){
        $catagory_MASTER_ADD = catagory_master::find($id);
        $catagory_MASTER_ADD->catagory_name = $request->name; 
        $catagory_MASTER_ADD->save(); 

        return redirect('/master/catagory/edit/'.$id);
    }
    
    public function driverReportView(REQUEST $request){
        return view('driverReport');
    }
    
    public function driverReportGenerate(REQUEST $request){
        $truck_data = truck_data::whereBetween('issue_date', [$request->from_date, $request->to_date])->get();
        $data = array('truck_data' => $truck_data);
        $customPaper = array(0,0,1000.00,283.80);
        $pdf = PDF::loadView('driverReportPDF', $data)->setPaper('A4','landscape');
        return $pdf->stream('Driver/Helper-Report.pdf');
    }
    
    public function labourReportView(REQUEST $request){
        return view('labourReport');
    }


    public function labourReportGenerate(REQUEST $request){
        $labour_data = labour_data::whereBetween('recipent_date', [$request->from_date, $request->to_date])->get();
        $data = array('labour_data' => $labour_data);
        $customPaper = array(0,0,1000.00,283.80);
        $pdf = PDF::loadView('labourReportPDF', $data)->setPaper('A4','landscape');
        return $pdf->stream('Labour-Report.pdf');
    }
    
    public function dashboardHome(REQUEST $request){
        #Driver helper
        $truck_data = truck_data::get()->count();
        $truck_data_Permanent = truck_data::where('card_type','Permanent')->get()->count();
        $truck_data_Temporary = truck_data::where('card_type','Temporary')->get()->count();
        
        #Labour
        $labour_data = labour_data::get()->count();
        $labour_data_Permanent = labour_data::where('card_type','Permanent')->get()->count();
        $labour_data_Temporary = labour_data::where('card_type','Temporary')->get()->count();

        #Blacklist
        $blacklist = blacklist::count();

        #Driver helper
        $RenewDriver = 0;
        $temp = truck_data::get();
        foreach ($temp as $key => $item) {
            $VALID_UP_TO = strtotime($item->valid_up_to);
            $VALID_UP_TO = strtotime("-7 day",$VALID_UP_TO);
            $VALID_UP_TO = date('Y-m-d', $VALID_UP_TO);
            if(new DateTime(@$item->valid_up_to) < new DateTime()) {
                $RenewDriver += 1;
            }
            else if(new DateTime(@$VALID_UP_TO) <= new DateTime()) {
                $RenewDriver += 1;
            }
        }
        
        #Labour helper
        $RenewLabour = 0;
        $temp = labour_data::get();
        foreach ($temp as $key => $item) {
            $VALID_UP_TO = strtotime($item->valid_up_to);
            $VALID_UP_TO = strtotime("-7 day",$VALID_UP_TO);
            $VALID_UP_TO = date('Y-m-d', $VALID_UP_TO);
            if(new DateTime(@$item->valid_up_to) < new DateTime()) {
                $RenewLabour += 1;
            }
            else if(new DateTime(@$VALID_UP_TO) <= new DateTime()) {
                $RenewLabour += 1;
            }
        }


        $VALID_UP_TO = strtotime(date('Y-m-d'));
        $VALID_UP_TO = strtotime("-7 day",$VALID_UP_TO);
        $VALID_UP_TO = date('Y-m-d', $VALID_UP_TO);

        $issuedInLastweekDriver = truck_data::whereBetween('created_at', [$VALID_UP_TO, date('Y-m-d')])->get();
        $issuedInLastweekHelper = labour_data::whereBetween('created_at', [$VALID_UP_TO, date('Y-m-d')])->get();
        
        return view('dashboard',compact('labour_data','labour_data_Temporary','labour_data_Permanent','truck_data','truck_data_Permanent','truck_data_Temporary','blacklist','RenewDriver','RenewLabour','issuedInLastweekDriver','issuedInLastweekHelper'));
    }


    public function driverReportList(REQUEST $request){
        $truck_data = truck_data::whereBetween('recipent_date', [$request->from_date, $request->to_date])->get();
        $from_date = $request->from_date;
        $to_date = $request->to_date;
        return view('driverReportList',compact('truck_data','from_date','to_date'));
    }

    public function labourReportList(REQUEST $request){
        $labour_data = labour_data::whereBetween('recipent_date', [$request->from_date, $request->to_date])->get();
        $from_date = $request->from_date;
        $to_date = $request->to_date;
        return view('labourReportList',compact('labour_data','from_date','to_date'));
    }

    

}
