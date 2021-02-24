<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use App\Models\Course;

class CoursesController extends Controller
{
    public function allCourses(){
        return auth()->user()->courses();    
    }

    public function index(){
        $courses = auth()->user()->courses();
        return view('dashboard', compact('courses'));
    }

    public function add(){
        return view('add');
    }

    public function viewcourses(){
        return view('view-courses');
    }

    public function create(Request $request){
        $course = new Course();
        $course->title = $request->title;
        $course->description = $request->description;
        $course->semester = $request->semester;
        $course->espb = $request->espb;
        $course->save();
        return redirect('/courses');
    }

    
    public function edit(Course $course){
        return view('edit',compact('course'));
    }

    public function editCourse(Request $request){
        $course = new Course();
        $course->id = $request->id;
        $course->title = $request->title;
        $course->description = $request->description;
        $course->semester = $request->semester;
        $course->espb = $request->espb;
        DB::table('courses')
            ->where('id', $course->id)
            ->update(['title' => $course->title, 'description'=>$course->description, 'description'=>$course->description,'semester'=>$course->semester ,'espb'=>$course->espb]); 
        return redirect('/view-courses');
    }

    public static function courseEnrolled(Course $course)
    {
        return DB::table('course_user')
                    ->where('course_id', '=', $course->id)
                    ->where('user_id', '=', auth()->user()->id)
                    ->get();
    }

    public static function enroll(Request $request, $course)
    {
        DB::table('course_user')
            ->insert(['course_id'=>$course, 'user_id'=>auth()->user()->id]);
        return redirect('view-courses');
    }

    public function deleteEnroll(Request $request, $course)
    {
        DB::table('course_user')->where('course_id','=', $course)->where('user_id','=',auth()->user()->id)->delete(); 
        return redirect('dashboard');
    }

    public static function delete(Request $request, $course)
    {
        DB::table('course_user')->where('course_id','=', $course)->delete();
        DB::table('courses')->where('id','=', $course)->delete();
        return redirect('view-courses');
    }
}
