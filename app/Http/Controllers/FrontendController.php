<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\General;
use App\Models\Social;
use App\Models\Slider;
use App\Models\About;
use App\Models\Specialization;
use App\Models\User;
use App\Models\Tip;
use Carbon\Carbon;
use Illuminate\Support\Str; 
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
        $data['specialization'] = Specialization::orderBy('id', 'desc')->take(3)->get();
        return view('frontend.index', $data);
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
}
