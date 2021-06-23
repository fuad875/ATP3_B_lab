<?php

namespace App\Http\Controllers;
use Validator;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
class loginController extends Controller
{
    public function index(){
        return view('admin.login');
    }

    public function validation(Request $req){
        $validation = Validator :: make ($req->all(),[
            'email' => 'required|email|max:49',
            'pass'  => 'required|alpha_num|min:8|max:20'
            
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
            
            echo "User Not found";
        }
        }
       
       
    }
}
