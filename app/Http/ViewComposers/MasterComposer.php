<?php

namespace App\Http\ViewComposers;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\View\View;
use Auth;
use App\Blog;

class MasterComposer
{
    protected $menu;

    public function compose(View $view)
    {
		
/* 		Schema::table('blogs', function($table) {
		$table->text('slug');
		});
	 */
		$blogs = Blog::orderBy('id','desc')->take(6)->get();
		//dd($blogs);
        $view->withBlogs($blogs);
    }
}