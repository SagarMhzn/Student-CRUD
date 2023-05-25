<?php

namespace App\Http\Controllers;

use App\Models\Education;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class StudentController extends Controller
{
    public function index()
    {
        return view('create-student');
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|max:8',
            'phone_no' => 'required|min:10|max:10',
            'address' => 'required',
            'email' => 'required|email',
            'image' => 'required|mimes:pdf,xlxs,xlx,docx,doc,csv,txt,png,gif,jpg,jpeg|max:2048',
            'gender' => ['required', Rule::in(['Male', 'Female', 'Other'])],
            'dob' => 'required|date'
        ]);
        //
        $record = new Student();


        $record->name = $request->name;
        $record->phone_no = $request->phone_no;
        $record->address = $request->address;
        $record->email = $request->email;
        // $file = $request->file('image');
        // $file_name = $file->getClientOriginalName();
        // $destinationPath = public_path('images/');
        // $file->move($destinationPath, $file_name);

        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('public/Image'), $filename);
            $record->image = $filename;
        }
        // $record->image = $destinationPath . $file_name;
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
        return redirect(route('home'));



        // return redirect(route('add-info'))->with('success',"Student info added sucessfully");
    }

    public function student_display()
    {
        $data = Student::all();

        return view('view-students', compact('data'));
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

        return redirect()->back();
    }

    public function edit(Student $student)

    {
        $education_data = Education::where('student_id', $student->id)->get();
        return view('edit-students', compact('student', 'education_data'));
    }
    public function update(Request $request,Student $student)
    {

        $this->validate($request, [
            'name' => 'required|max:20',
            'phone_no' => 'required|min:10|max:10',
            'address' => 'required',
            'email' => 'required|email',
            'image' => 'mimes:pdf,xlxs,xlx,docx,doc,csv,txt,png,gif,jpg,jpeg|max:2048',
            'gender' => ['required', Rule::in(['Male', 'Female'])],
            'dob' => 'required|date'
        ]);
        //
      


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
        return redirect('/student-profile/'.$student_id);

    }

    
}
