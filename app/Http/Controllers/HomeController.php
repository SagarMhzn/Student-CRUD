<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $data = Student::count();
        // dd($data);
        return view('home', compact('data'));
    }

    public function userProfile()
    {
        return view('profile');
    }


    public function userPassword()
    {
        return view('password');
    }
    public function profileUpdate(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email'
        ]);

        $user = User::find(auth()->user()->id);
        $user->name = $request->name;
        $user->email = $request->email;


        $user->save();




        return redirect()->back()->with('profile_change_success','Profile Updated Successfully!');
    }


    public function passwordUpdate(Request $request)
    {
        $request->validate([
            'old_password' => 'required|min:8',
            'password' => 'required|confirmed|min:8',
        ]);

        $user = User::find(auth()->user()->id);


        if (Hash::check($request->old_password, $user->password)) {
            $user->password = Hash::make($request->password);
            $user->save();
            return redirect()->back()->with('password_change_success','Password Changed Successfully!');

        }else{
            return redirect()->back()->withErrors('old password doesnt match');

        }


        
    }
}
