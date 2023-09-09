<?php

namespace App\Http\Controllers;

use App\Models\upload_video;
use Illuminate\Http\Request;

class VeedController extends Controller
{
    public function index()
    {
        $video_pembelajaran = upload_video::paginate(1);
        return view("template.veed", compact("video_pembelajaran"));
    }
}
