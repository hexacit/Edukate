<?php

namespace App\Http\Controllers\admin;
use App\Models\Page;

use App\Models\Course;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use League\CommonMark\Extension\CommonMark\Node\Inline\Code;

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

  
}
