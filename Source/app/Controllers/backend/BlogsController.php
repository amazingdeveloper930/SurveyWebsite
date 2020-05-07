<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Blog;
use File;
use Image;
class BlogsController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        return view('backend.blogs.index', [
            'blogs' => Blog::paginate()
        ]);
    }

    public function create()
    {
        return view('backend.blogs.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title'      => 'required',
            'body'  => 'required',
			'image' 	=> 'mimes:jpeg,gif,bmp,png'
        ]);
		
		$data = new Blog;
		
		$data->title = $request->title;
		$data->body = $request->body;
		$data->slug =  str_slug($request->title,'-');
		
 
		if ($request->hasFile('image')) {
            $file = $request->file('image');

            if ($file->isValid()) {
                $name	= $this->makeImageName().$file->getClientOriginalName();

				$location = public_path('uploads/blogs/photos/' . $name);
				$locationThumb = public_path('uploads/blogs/photos/thumb/' . $name);
				Image::make($file)->save($location);
				Image::make($file)->resize(550, 550)->save($locationThumb);
                $data->image = $name;
            }
        }
		
		$data->save();
       

        return redirect()
            ->route('blogs.index')
            ->withStatus(trans('Blog Added Successfully!'));
    }


    public function edit($id)
    {
        $Blogs = Blog::find($id);

        if ($Blogs) {
            return view('backend.blogs.edit', [
                'blogs' => $Blogs
            ]);
        }

        return redirect()->route('blogs.index');
    }

    public function update($id, Request $request)
    {
		//echo $_FILE['image']['name'];
		
	//	dd($request->file('image'));
		
        $data = Blog::find($id);

        if ($data) {
			
            $this->validate($request, [
            'title'      => 'required',
            'body'  => 'required',
			'image' 	=> 'mimes:jpeg,gif,bmp,png,jpg'
			]);

           $data->title = $request->title;
		$data->body = $request->body;
		$data->slug =  str_slug($request->title,'-');
 
		if ($request->hasFile('image')) {
            $file = $request->file('image');

            if ($file->isValid()) {
                $name	= $this->makeImageName().$file->getClientOriginalName();

				$location = public_path('uploads/blogs/photos/' . $name);
				$locationThumb = public_path('uploads/blogs/photos/thumb/' . $name);
				Image::make($file)->save($location);
				Image::make($file)->resize(550, 550)->save($locationThumb);

                // Assign images
                $data->image = $name;
            }
        }

			$data->save();
			
            return redirect()
                ->route('blogs.index')
                ->withStatus(trans('Blog Updated Successfully!'));
        }
    }

    public function destroy($id)
    {
        $Blogs = Blog::find($id);

        if ($Blogs) {
            $Blogs->delete();

            return redirect()
                ->route('blogs.index')
                ->withStatus(trans('Blog deleted successfully!'));
        }

        return redirect()->route('blogs.index');
    }
	
	 private function makeImageName()
    {
        return time() + rand(1, 100);
    }
	
}
