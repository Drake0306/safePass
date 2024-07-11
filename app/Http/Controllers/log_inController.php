<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use DB;
use Mail;
use Session;
use Hash;
// use Stevebauman\Wmi\Wmi;
use App\user_table;
use App\log_in_log;
use App\company_master;
use App\permission;
use App\user_role;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class log_inController extends Controller
{
    public function log_in(){
        return view('welcome');
    }
    
    public function log_in_config(REQUEST $request){
        $password = $request->password;
        $user_id  = $request->user_id; 
        $data = user_table::where('user_id',$user_id)->where('password',$password)->first();
        $company_master = company_master::first();
        if($data){
            // if (Hash::check($data->password , $password)) {
            //     // The passwords match...
            //     $request->session()->put('user_id', $data->user_id);
            //     $request->session()->put('type', $data->type);
            //     $request->session()->put('name', $data->name);

            //     return \redirect('/view_home');
            // }
            // else{
            //     $error = 1;
            //     return view('welcome',\compact('error'));
            // }

            // return shell_exec('C:\Windows\System32\wbem\WMIC.exe csproduct get UUID');

            // $wmi = new Wmi($host = 'DESKTOP-O4UE2QL', $username = 'Morning-Star', $password = '7903826151');
            // $wmi = new Wmi();
            // $connection = $wmi->connect('root\\cimv2');
                
            // $query = $connection->newQuery();
            // $results = $query->from('Win32_DiskDrive')->get();
           
            // print_r(variant_get_type($v));
            //  __toString($results);
              
            // print_r($results);

            // exit;

            $user_role = user_role:: where('id',$data->type)->first();
            // $permission = permission::where('user_id',$data->id)->first();
            //ADDING DATA TO SESSION
            $request->session()->put('user_id', $data->user_id);
            $request->session()->put('id', $data->id);
            $roleName = $user_role->name;
            if ($roleName == "Admin") {
                $request->session()->put('type', 0);
            }else {
                $request->session()->put('type', 1);
            }
            $request->session()->put('name', $data->name);
            //IN  OUT
            $request->session()->put('read_in_out',$user_role->read_in_out);
            $request->session()->put('edit_in_out',$user_role->edit_in_out );
            $request->session()->put('delete_in_out',$user_role->delete_in_out);
            //VISITOR
            $request->session()->put('read_visitor',$user_role->read_visitor );
            $request->session()->put('edit_visitor',$user_role->edit_visitor);
            $request->session()->put('delete_visitor',$user_role->delete_visitor);
            //ENTRY
            $request->session()->put('in_entry',$user_role->in_entry);
            $request->session()->put('out_entry',$user_role->out_entry);
            
            $request->session()->put('location',$company_master->location_code);
            $request->session()->put('location_name',$company_master->location_name);
            $request->session()->put('location_code',$data->location_code);

            // $request->session()->put('ip', $request->ip());

            $add = new log_in_log();
            $add->table_id = $data->id ;
            $add->user_id = $data->user_id;
            // $add->ip = $request->ip();
            $add->save();

            // return \redirect('/view_home');
            return \redirect('/dashboard');
        }
        else{
            $error = 1;
            return view('welcome',\compact('error'));
        }
        // return $data;
    }
    
    
}
