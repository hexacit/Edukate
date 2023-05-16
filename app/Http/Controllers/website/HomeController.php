<?php

namespace App\Http\Controllers\website;
use App\Models\Page;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Course;
use League\CommonMark\Extension\CommonMark\Node\Inline\Code;

class HomeController extends Controller
{
    public function home(){
        $page = Page::get()->where('slug','about')->first();
        $courses = Course::take(10)->latest()->get();
        return view('website/index',[ 'page'=> $page , 'courses'=>$courses] );
    }

    public function pages($slug){
        
        $page = Page::get()->where('slug',$slug)->first();
        return view('website/page',[ 'page'=> $page] );
    }
    public function course($id){
        
        $course = Course::get()->where('id',$id)->first();
        return view('website/detail',[ 'course'=> $course] );
    }
}
