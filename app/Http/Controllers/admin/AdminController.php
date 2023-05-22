<?php

namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function adminHome(){
        $user = Auth::user();
    
        if($user){
            return view('admin/index' );
    }
        else{
            return view('admin/login' );
   
        }
    }
    public function login(){
            return view('admin/login' );
        }
    public function adminLoginPost(Request $request){
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            
            // Authentication successful
            return redirect()->intended('/admin/home');
        } else {
            // Authentication failed
            return redirect()->back()->withErrors(['message' => 'Invalid credentials']);
        }
        }
        public function adminProfile(){
            $user = Auth::user();
            return view('admin/profile'  ,['user'=>$user]);

        }
        public function adminProfileUpdate(Request $request){
            $formFields = $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.Auth::id()],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                ]);
                $user = Auth::user();
                $user->name = $request->name;
                $user->email = $request->email;
                $user->password = Hash::make($request->password);
                $user->save();
                return redirect()->intended("{{route('adminProfile')}}");
                }

        
  
}
