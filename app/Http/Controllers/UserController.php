<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    //
    public function login(Request $request){
        $user = User::where('email', 'like', $request->email)->get()->first();
        $validation = [
            'email' => 'required | email',
            'password' => 'required'
        ];

        $validator = Validator::make($request->all(), $validation);
        //field not filled
        if($validator->fails()){
            return redirect()->back()->withErrors($validator);
        }

        //email not found
        if($user == null){
            $errMsg = "Email not found!";
            return back()->withErrors(['errMsg' => $errMsg]);
        }

        $creds = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        $remember = $request->remember;

        if(Auth::attempt($creds, $remember)){
            // User authenticated
            return redirect('/');
        }else{
            // Wrong Password
            $errMsg = "Password is incorrect!";
            return back()->withErrors(['errMsg' => $errMsg]);
        }
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }

    public function createUser(Request $request){
        $newUser = new User();
        $name = $request->name;
        $password = bcrypt($request->password);
        $email = $request->email;

        $validation = [
            // Rules
            'username' => 'required | min:5 | unique:users,name',
            'email' => 'required | email | unique:users,email',
            'password' => 'required | alpha_num | confirmed'
        ];
        $validator = Validator::make($request->all(), $validation);

        if($validator->fails()){
            return back()->withErrors($validator);
        }

        $newUser->name = $name;
        $newUser->password = $password;
        $newUser->email = $email;

        $newUser->save();
        return redirect('/');
    }

    public function editUser(Request $request){
        $user = Auth::user();
        $name = $request->name;
        $password = bcrypt($request->password);
        $email = $request->email;

        $validation = [
            // Rules
            'username' => 'required | min:5 | unique:users,name',
            'email' => 'required | email | unique:users,email',
            'password' => 'required | alpha_num | confirmed'
        ];
        $validator = Validator::make($request->all(), $validation);

        if($validator->fails()){
            return back()->withErrors($validator);
        }

        $user->name = $name;
        $user->password = $password;
        $user->email = $email;

        $user->save();
        return redirect('/');
    }
}
