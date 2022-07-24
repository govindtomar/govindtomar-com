<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\BlogRequest;
use GovindTomar\CrudGenerator\Helpers\CRUDHelper;
use App\Models\Blog;
use Auth;
use App\Models\User;

class BlogController extends Controller
{
    public function index()
    {
        try{
            $blogs  = Blog::with('user')->paginate(20);
            return view("admin/blog/index", compact("blogs"));
        }catch(\Exception $e){
            return back();
        }
    }

    public function create()
    {
        try{
            $users = User::all();
            return view("admin/blog/create", compact("users"));
        }catch(\Exception $e){
            return back();
        }
    }

    public function store(BlogRequest $request)
    {
        try{            
            $blog = new Blog;
            $blog->name  =  $request->name;
			$blog->user_id  =  $request->user_id;
			$blog->slug  =  $request->slug;
			$blog->path  =  $request->path;
			$blog->description  =  $request->description;
			if($request->image != ''){
				$blog->image  = CRUDHelper::file_upload($request->image, 'uploads/user-'.Auth::id());
			}
			$blog->meta_title  =  $request->meta_title;
			$blog->meta_description  =  $request->meta_description;
			$blog->meta_keyword  =  $request->meta_keyword;
            $blog->save();
            return redirect('admin/blog/'.$blog->id)->with('success', 'You have successfully inserted new blog');
        }catch(\Exception $e){
            return back()->with('error','Your record has been not submitted successfully ');
        }
    }

    public function show($id)
    {
        try{
            $blog = Blog::find($id);
            return view("admin/blog/show", compact("blog"));
        }catch(\Exception $e){
            return back();
        }
    }

    public function edit($id)
    {
        try{
            $users = User::all();
            $blog =  Blog::find($id);
            return view("admin/blog/edit", compact("blog", "users"));
        }catch(\Exception $e){
            return back();
        }

    }

    public function update(BlogRequest $request, $id)
    {
        try{
            $blog =  Blog::find($id);
            $blog->name  =  $request->name;
			$blog->user_id  =  $request->user_id;
			$blog->slug  =  $request->slug;
			$blog->path  =  $request->path;
			$blog->description  =  $request->description;
			if($request->image != ''){
				$blog->image  = CRUDHelper::file_upload($request->image, 'uploads/user-'.Auth::id());
			}
			$blog->meta_title  =  $request->meta_title;
			$blog->meta_description  =  $request->meta_description;
			$blog->meta_keyword  =  $request->meta_keyword;
            $blog->save();

            return back()->with('success','You have successfully updated blog');
        }catch(\Exception $e){
            return back()->with('error','Your record has been not updated successfully');
        }
    }

    public function destroy($id)
    {
        try{
            Blog::find($id)->delete();
            return redirect("admin/blog")->with('success','Successfully delete blog');
        }catch(\Exception $e){
            return back()->with('error','blog was delete');
        }
    }

    
	public function publish(Request $request){
		$blog = Blog::find($request->id);
		$blog->publish = $request->publish == 'true' ? true : false;
		$blog->save();
		return $blog;
	}


}
