<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Education;
use Illuminate\Http\Request;
use App\Http\Requests\StudentRequest;

class StudentController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function create()
    {
        return view('create-student');
    }


    public function store(StudentRequest $request)
    {
        // dd($request);
        $record = new Student();
        $record->name = $request->name;
        $record->phone_no = $request->phone_no;
        $record->address = $request->address;
        $record->email = $request->email;

        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('public/Image'), $filename);
            $record->image = $filename;
        }
        $record->gender = $request->gender;
        $record->dob = $request->dob;
        $record->save();

        $student_id = $record->id;


        foreach ($request->level as $index => $record) {
            $education = new Education();
            $education->level = $request->level[$index];
            $education->college = $request->college[$index];
            $education->university = $request->uni[$index];
            $education->student_id = $student_id;
            $education->startdate = $request->startdate[$index];
            $education->enddate = $request->enddate[$index];
            $education->save();
        }
        return redirect()->route('home')->with('create_success','Student added Successfully!');


    }

    public function student_display()
    {
        $data = Student::all();

        return view('view-students')->with('data', $data);
    }

    public function view_student_profile($id)
    {
        $data = Student::find($id);
        $education_data = Education::where('student_id', $id)->get();
        return view('view-profile', compact('education_data', 'data'));
    }

    public function destroy(Student $student)
    {

        $student->delete();

        return redirect()->route('view-students')->with('delete_success', 'User deleted Successfully!');
    }

    public function edit(Student $student)

    {
        $education_data = Education::where('student_id', $student->id)->get();
        return view('edit-students', compact('student', 'education_data'));
    }


    public function update(StudentRequest $request,Student $student)
    {

        $student->name = $request->name;
        $student->phone_no = $request->phone_no;
        $student->address = $request->address;
        $student->email = $request->email;
        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('public/Image'), $filename);
            $student->image = $filename;
        }
        $student->gender = $request->gender;
        $student->dob = $request->dob;
        $student->save();


        $student_id = $student->id;

        $education_old = Education::where('student_id',$student_id)->get();

        foreach($education_old as $item){
            $item->delete();
        }

        foreach ($request->level as $index => $record) {
            $education = new Education();
            $education->level = $request->level[$index];
            $education->college = $request->college[$index];
            $education->university = $request->uni[$index];
            $education->student_id = $student_id;
            $education->startdate = $request->startdate[$index];
            $education->enddate = $request->enddate[$index];
            $education->save();
        }
        return redirect('/student-profile/'.$student_id)->with('student_profile_update_success', 'Student Profile updated Successfully!');

    }

}


