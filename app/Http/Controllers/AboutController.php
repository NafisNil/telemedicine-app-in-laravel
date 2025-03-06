<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use App\Http\Requests\AboutRequest;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $about = About::orderBy('id', 'desc')->first();
        $aboutCount = About::count();

        return view('backend.about.index',['about'=>$about, 'aboutCount' => $aboutCount]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
     
        return view('backend.about.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AboutRequest $request)
    {
        //
        $video_id = $this->getYouTubeVideoId($request->video_link);
        $about = About::create([
            'title' => $request->title,
            'description' => $request->description,
            'video_link' =>  $video_id,
      
        ]);
   
        return redirect()->route('about.index')->with('success','Data inserted successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(About $about)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(About $about)
    {
        //
        return view('backend.about.edit',[
            'edit' => $about
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AboutRequest $request, About $about)
    {
        //
        
        $video_id = $this->getYouTubeVideoId($request->video_link);
        $about->update([
            'title' => $request->title,
            'description' => $request->description,
            'video_link' =>  $video_id,
      
        ]);
 
        return redirect()->route('about.index')->with('success','Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(About $about)
    {
        //
        $about->delete();
  
        return redirect()->route('about.index')->with('status','Data deleted successfully!');
    }


    function getYouTubeVideoId($url) {
        if (strpos($url, 'v=') !== false) {
            parse_str(parse_url($url, PHP_URL_QUERY), $params);
            if (isset($params['v'])) {
                return $params['v'];
            }
        } elseif (strpos($url, 'youtu.be/') !== false) {
            $path = parse_url($url, PHP_URL_PATH);
            $parts = explode('/', $path);
            if (isset($parts[3])) {
                return $parts[3];
            }
        }
        return null; // Return null if ID cannot be extracted.
    }
}
