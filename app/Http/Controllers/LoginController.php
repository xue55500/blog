<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use App\Dlogin;

use App\Http\Requests\StoreBlogPost;

use Validator;
class LoginController extends Controller
{
     public function dologin(Request $request){
         $post = $request->except('_token');
//         dd($post);
        // $user = Dlogin::where($post)->first();
           $user = DB::table('dlogin')->where($post)->first();
         if($user){
              session(['admin'=>$user]);
             request()->session()->save();
             return redirect('/brand');
         }

     }
    public function loginDo(){
        if(session('admin')){
            session(['admin'=>null]);
            echo "<script>alert('退出成功');location.href='/login';</script>";
        }
    }
}