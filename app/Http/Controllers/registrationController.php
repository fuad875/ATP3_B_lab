<?php

namespace App\Http\Controllers;
use Validator;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;

class registrationController extends Controller
{
    public function index(){
        return view('admin.register');
    }



    public function insert(Request $req){
        $user = new User;
        $user->username  = $req->username; 
        $user->email     = $req->email; 
        $user->password  = $req->password; 
        $user->type    =  $req->type;
        
        $user->save();

        return redirect('/admin/login');
    }


    public function validation(Request $req){
        $validation = Validator :: make ($req->all(),[
            'name' => 'min:3|max:30',
            'email' => 'required|email|min:10|max:49',
            'pass'  => 'required|alpha_num|min:8|max:20|confirmed'
            
        ]);

        if($validation->fails()){
            return back()->with('errors',$validation->errors());
        }
        else{
            $result = DB::table('admin')
                        ->where('email', $req->email)
                        ->where('password', $req->pass)
                        ->get();

        if(count($result) > 0){
           
            $req->session()->put('uname', $req->username);
            $req->session()->put('type', $req->type);
            
            return view('/admin.dashboard');
        }else{
            
            echo "No DATA";
        }
        }
       
       
    }

    
  

}
