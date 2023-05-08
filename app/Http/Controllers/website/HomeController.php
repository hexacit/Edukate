<?php

namespace App\Http\Controllers\website;
use App\Models\Page;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function home(){
        $page = Page::get()->where('slug','about')->first();

        return view('website/index',[ 'page'=> $page] );
    }

    public function pages($slug){
        
        $page = Page::get()->where('slug',$slug)->first();
        return view('website/page',[ 'page'=> $page] );
    }
}

