<?php

namespace App\Http\Controllers\Admin;

use App\Models\Course;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::orderby('id','desc')->paginate(10);
        return view('admin.courses.index', compact('courses'));
    }

    public function create()
    {
        $categores = Category::all();
        return view('admin.courses.create', compact('categores'));
    }

    public function store(Request $request)
    {
        // Validation and saving the course to the database
        $formFields = $request->validate([
            'image' => 'required',
            'title' => 'required',
            'category_id' => 'required',
            'price' => 'required',
            'details' => 'required',
            'instructor_id' => 'required',
            'language' => 'required',
            'skill_level' => 'required',
        ]);
       // $formFields['image'] = $request->file('image')->store('public/courses');

       if ($request->hasFile('image')) {
        $image = $request->file('image');
        $extention = $image->getClientOriginalExtension();
        $file_name = rand(1000000, 9999999) . "" . time() . "_" . rand(1000000, 9999999) . "." . $extention;
        $image->move(public_path('uploads/images/course'),$file_name);
        $formFields['image'] = $file_name;
    }  
   
           
        Course::create($formFields); ///use all field in fillable
        return redirect()->route('courses.index')->with('success', 'Course created successfully!');
    }

    public function show($id)
    {
        $course = Course::findOrFail($id);
        return view('admin.courses.show', compact('course'));
    }

    public function edit($id)
    {
        $course = Course::findOrFail($id);
        return view('admin.courses.edit', compact('course'));
    }

    public function update(Request $request, $id)
    {
        $formFields = $request->validate([
            'title' => 'required',
        ]); 

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $extention = $image->getClientOriginalExtension();
            $file_name = rand(1000000, 9999999) . "" . time() . "_" . rand(1000000, 9999999) . "." . $extention;
            $image->move(public_path('uploads/images/course'),$file_name);
            $formFields['image'] = $file_name;
        }  

        $course = Course::findOrFail($id);
        $course->update($formFields);

        return redirect()->route('courses.index')->with('success', 'Course updated successfully!');
    }

    public function destroy($id)
    {
        $course = Course::findOrFail($id);
        $course->delete();
 
        return redirect()->route('courses.index')->with('success', 'Course deleted successfully!');
    }
}
