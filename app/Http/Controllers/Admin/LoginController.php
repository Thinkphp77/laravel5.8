<?php

namespace App\Http\Controllers\Admin;
 

use Illuminate\Encryption\Encrypter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;

use App\Http\Model\User;

class LoginController extends Controller
{
    //
    public function index(){
        echo 'admin/login';
    }
    public function login(){
//      echo 'admin/login'; die;
//        session(['admin'=>'wu']);
        $code = new \Code();
        $codes = $code->get();
        if($input = Input::all()){
            if (strtoupper($input['code'] )!== $codes){
                return back()->with('msg','verify codes is not matched');
            }
            $user = User::first();
            if ($user->user_name != $input['user_name'] ||  decrypt($user->user_pass)!= $input['user_pass']){
                return back()->with('msg','username or password is incorrect !');
            }
            session(['user'=>$user]);
//            dd(session('user'));
            return redirect('admin/index');
        }else{
            /*$user = User::all();
            dd($user);*/
            /*$pass = 'eyJpdiI6IlI0OG01XC9yc3FOclU5OWJtR2hsV1wvdz09IiwidmFsdWUiOiJsV1dkWmpBZnVIWDEyMUYxcERGeFBRPT0iLCJtYWMiOiJhZjRiNGNhZTFmMjVmY2RjZjNlMWI5MGZiNDI2MjliYjI0OTg4N2JmMWQ1YjZkNjYwZmNiZWI5Njg4MmRiMWIxIn0=';
            $decrypt = decrypt($pass);
            dd($decrypt);   die;*/

            return view('admin.login');
        }
//        echo phpinfo();
    }
    public function codes(){
        $codes = new \Code();
        $codes->make();
    }
}
