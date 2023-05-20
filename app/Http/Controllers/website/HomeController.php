<?php

namespace App\Http\Controllers\website;
use App\Models\Page;

use App\Models\Course;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
        
        $course = Course::where('id',$id)->first();
        $relatedCourses = Course::where('id', '!=', $course->id) // Exclude the current course
                                ->where('category_id',$course->category_id)
                                ->take(5)
                                ->latest()
                                ->get();
        $recentCourses = Course::where('id', '!=', $course->id) // Exclude the current course
                                ->latest()
                                ->take(5)
                                ->get();

        // Retrieve all categories
         $categories = Category::get();

        // Sort the categories in descending order based on the 'courses_count' appended value
        $categories = $categories->sortByDesc(function ($category) {
            return $category->courses_count;
        });

        // Take only the top 5 categories after sorting
        $categories = $categories->take(5);
                                
  return view('website/detail',[ 'course'=> $course , 'relatedCourses'=>$relatedCourses,'categories'=>$categories , 'recentCourses'=>$recentCourses] );
    }
}
