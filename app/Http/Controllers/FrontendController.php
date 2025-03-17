<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\General;
use App\Models\Social;
use App\Models\Slider;
use App\Models\Doctor;
use App\Models\About;
use App\Models\Specialization;
use App\Models\User;
use App\Models\Tip;
use App\Models\Schedule;
use Carbon\Carbon;
use Illuminate\Support\Str; 
use App\Http\Requests\PatientRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class FrontendController extends Controller
{
    //
    public function index()
    {
        $data['general'] = General::first();
        $data['social'] = Social::first();
        $data['slider'] = Slider::first();
        $data['about'] = About::first();
        $data['doctor'] = User::where('role', 'doctor')->get();
        $data['tips'] = Tip::orderby('id','desc')->get();
        $data['specialization'] = Specialization::orderBy('id', 'desc')->take(6)->get();
        return view('frontend.index', $data);
    }


    public function all_doctor(){
        $data['general'] = General::first();
        $data['social'] = Social::first();
        $data['slider'] = Slider::first();
        $data['doctor'] = User::where('role', 'doctor')->orderby('id','desc')->paginate(18);
        return view('frontend.all_doctor', $data);
    }

    public function all_tips(){
        $data['general'] = General::first();
        $data['social'] = Social::first();
        $data['tips'] = Tip::orderby('id','desc')->paginate(18);
        return view('frontend.tips_all', $data);
    }

    public function tips_details($slug){
        $data['general'] = General::first();
        $data['social'] = Social::first();
        $data['slider'] = Slider::first();
        $data['tips_single'] = Tip::where('slug',$slug)->first();
        return view('frontend.tips_single', $data);
    }

    public function all_service(){
        $data['general'] = General::first();
        $data['social'] = Social::first();
        $data['slider'] = Slider::first();
        $data['specialization'] = Specialization::orderBy('id','desc')->paginate(15);
        return view('frontend.service_all', $data);
    }

    public function service_details($id, $slug){
        $data['general'] = General::first();
        $data['social'] = Social::first();
        $data['slider'] = Slider::first();
        $data['specialization'] = Specialization::where('id', $id)->first();
        $data['doctor'] = Doctor::where('role', 'doctor')->where('specialization_id', $id)->where('status', 'active')->get();
        return view('frontend.service_single', $data);
    }

    public function details_doctor($slug){
        $data['general'] = General::first();
        $data['social'] = Social::first();
        $data['slider'] = Slider::first();
        $data['doctor'] = Doctor::where('slug', $slug)->first();
   
        $data['schedule'] = Schedule::where('doctor_id',$data['doctor']->id)->where('status', 'available')->get();
        return view('frontend.details_doctor', $data);
    }


    public function patient_reg(Request $request){
        $patientId = DB::table('users')->insertGetId([
            'full_name' => $request->name,
            'name' => $request->password,
            'phone' => $request->phone,
            'role' => 'patient',
            'password' => Hash::make($request->password),
            'slug' => Str::slug($request->name),
            'address' => $request->address,
            'dob' => $request->dob,
            'email' => $request->email,
            'sex' => $request->sex,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $patient = User::find($patientId);
        Auth::login($patient);

        return redirect()->intended(session()->get('url.intended'))->with('success', 'Registration successful!');
    }

    public function patient_login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(session()->get('url.intended'))->with('success', 'Login successful!');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    } 

}
