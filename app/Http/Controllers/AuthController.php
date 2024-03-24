<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class AuthController extends Controller
{
    public function index(){
        return view('auth.login');

    }

    public function verify(Request $request){
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(FacadesAuth::guard('user')->attempt(['email' => $request->email, 'password'=>$request->password])){
            return redirect()->intended('/admin');
        }else{
            return redirect(route('auth.index'))->with('pesan','Kombinasi email dan password salah');
        }

    }

    public function logout(){
        if(FacadesAuth::guard('user')->check()){
            FacadesAuth::guard('user')->logout();
        }
        return redirect(route('auth.index'));

    }
}
