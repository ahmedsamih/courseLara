<?php
namespace App\Http\Controllers;
use App\Http\Requests\DeleteStudentRequest;
use App\Http\Requests\SaveStudentRequest;
use App\Student;
//use App\Teacher;
use App\User;
use function foo\func;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Stmt\DeclareDeclare;
class StudentsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except("api_index");
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = Student::paginate(5);
        return view('admin.students.index', [
            "data" => $data
        ]);
    }
    public function create()
    {
        return view('admin.students.form', [
            "student" => new Student()
        ]);
    }
    public function edit(Student $student)
    {
        return view('admin.students.form', [
            "student" => $student
        ]);
    }
    public function save(SaveStudentRequest $request)
    {
        if ($request->hasFile("image")) {
            $extension = $request->image->getClientOriginalExtension();
            $photoName = time() . rand(1000, 9999) . '.' . $extension;
            // save image.
            $request->image->move(public_path('uploads'), $photoName);
            $request->request->set("image_path", "/uploads/" . $photoName);
        }
        return DB::transaction(function () use ($request) {
            if ($request->filled("id")) {
                // update current.
                if ($request->id > 0) {
                    $student = Student::find($request->id);
                    if ($student && $student->user) {
                        // save student.
                        $student->fill($request->all());
                        if (!$student->save()) {
                            throw new \Exception("Unexpected error occurred #201");
                        }
                        $userData=[
                            "name" => $student->name,
                            "email" => $request->email,

                        ];
                        if($request->filled("password")){
                            $userData["password"]= Hash::make($request->password);
                        }
                        $student->user->fill($userData);
                        if (!$student->user->save()) {
                            throw new \Exception("Unexpected error occurred #201");
                        }
                        $request->session()->flash("success", "Student has been saved successfully!");
                        return redirect()->route("admin.students.index");
                    }
                }
            } else {
                // create new one.
                $user = User::create([
                    "name" => $request->name,
                    "email" => $request->email,
                    "password" => Hash::make($request->password),
                    "type" => "student"
                ]);
                if ($user) {
                    // 2 - create student.
                    // set user_id -> to user->id
//                    $student = Student::create(array_merge([
//                        "user_id" => $user->id
//                    ], $request->all()));
                    $request->request->set("user_id", $user->id);
                    $student = Student::create($request->all());
                    if ($student) {
                        $request->session()->flash("success", "Student has been saved successfully!");
                        return redirect()->route("admin.students.index");
                    } else {
                        throw new \Exception("Unexpected error occurred #102");
                    }
                } else {
                    throw new \Exception("Unexpected error occurred #101");
                }
            }
        });
        return redirect()->back();
    }
    public function delete(DeleteStudentRequest $request)
    {
        $student = Student::find($request->id);
//        $status = $model->delete();

        if ($student) {
            if($student->user->delete()){
                if($student->delete()){
                    $request->session()->flash("success", "Student has been deleted successfully!");

                }
            }
        } else {
            $request->session()->flash("error", "Unexpected error occurred, could not delete student!");
        }
        return redirect()->route('admin.students.index');
    }
    public function StudentView(Student $student)
    {
//
        return view('admin.students.view', [
            "student" => $student
        ]);
    }
}