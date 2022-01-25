<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
   
    public function index(Request $request)
    {
        $uName= $request->has('uname')?$request->get('uname'):'';
        $pass= $request->has('pass')?$request->get('pass'):'';

        $userInfo= User::where('name','=', $uName)->where('password', '=', $pass)->first();

        if(isset($userInfo)&& $userInfo!=null){
            return redirect('/admin_products');
        } else{
            return redirect()->back();
        }
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        User::insert([
            'name'=>$request->has('uname')? $request->get('uname'):'',
            'email'=>$request->has('email')? $request->get('email'):'',
            'mobile'=>$request->has('mobile')? $request->get('mobile'):'',
            'password'=>$request->has('pass')? $request->get('pass'):'',
        ]);

        return redirect('/admin_products');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        //
    }

}
