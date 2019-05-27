<?php

namespace App\Http\Controllers;
use App\Teacher;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\DeleteCourseRequest;
use App\Http\Requests\SaveCourseRequest;
use App\Course;
//use App\Teacher;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    public function index()
    {
        $data = Course::paginate(5);
        return view('admin.courses.index',["data"=>$data]);
    }

    public function create()
    {
        $teachers= Teacher::get();
//dd($teachers);
        return view('admin.courses.form',["course" => new Course(),"teachers"=>$teachers]);


    }


    public function save(SaveCourseRequest $request)
    {
        if ($request->hasFile("image")) {
            $extension = $request->image->getClientOriginalExtension();
            $photoName = time() . rand(1000, 9999) . '.' . $extension;
            // save image.
            $request->image->move(public_path('uploads'), $photoName);
            $request->request->set("image_path", "/uploads/" . $photoName);
            dd($request->all());
        }


//    dd($teacher_id);
//    dd($request->all());
//        $status = course::updateOrCreate([
//            "id" => $request->id
//
//        ], $request->all());
//        if ($status) {
////            $request->session()->flash("success", "Course has been saved successfully!");
////        } else {
////            $request->session()->flash("error", "Unexpected error occurred, could not save Course!");
//        }

        $course = Course::create([
            "name" => $request->name,
            "description" => $request->description,
            "hours_no" => $request->hours_no,
            "skills" => $request->skills,
            "language" => $request->language,
            "image_path" => $request->image_path,
            "teacher_id" => $request->teacher_id
        ]);
                if ($course) {
                    $request->session()->flash("success", "Course has been saved successfully!");
                    } else {
                    $request->session()->flash("error", "Unexpected error occurred, could not save Course!");
                }
        return redirect()->route("admin.courses.index");
    }

    public function edit(Course $course)
    {
        return view('admin.courses.form', [
            "course" => $course
        ]);
    }

    public function delete(DeleteCourseRequest $request)
    {
        $model = Course::find($request->id);
        $status = $model->delete();
        if ($status) {
            $request->session()->flash("success", "Course has been deleted successfully!");
        } else {
            $request->session()->flash("error", "Unexpected error occurred, could not delete Course!");
        }
        return redirect()->route("admin.courses.index");
    }

    public function CourseView(SaveCourseRequest $request,Course $course)
    {

        return view('admin.courses.view', [
            "course" => $course,
        ]);
    }
}
