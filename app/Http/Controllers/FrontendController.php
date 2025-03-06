<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\General;
class FrontendController extends Controller
{
    //
    public function index()
    {
        $data['general'] = General::first();
        return view('frontend.index', $data);
    }
}
