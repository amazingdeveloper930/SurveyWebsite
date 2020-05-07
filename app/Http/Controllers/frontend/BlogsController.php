<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Blog;
use File;
use Image;
class BlogsController extends Controller
{
    
    public function index()
    {
        $data = Blog::orderBy('id','desc')->get();
		return view('frontend/blogs')->withBlogs($data);
    }
	
	public function details($slug)
    {

		$data =Blog::where('slug',$slug)->first();
		

		
		return view('frontend/blogs_details')->withBlogs($data);
		
    }

  
}
