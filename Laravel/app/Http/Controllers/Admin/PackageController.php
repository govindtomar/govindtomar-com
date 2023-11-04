<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PackageRequest;
use GovindTomar\CrudGenerator\Helpers\CRUDHelper;
use App\Models\Package;
use Auth;
use App\Models\User;

class PackageController extends Controller
{
    public function index()
    {
        try{
            $packages  = Package::with('user')->paginate(20);
            return view("admin/package/index", compact("packages"));
        }catch(\Exception $e){
            return back();
        }
    }

    public function create()
    {
        try{
            $users = User::all();
            return view("admin/package/create", compact("users"));
        }catch(\Exception $e){
            return back();
        }
    }

    public function store(PackageRequest $request)
    {
        try{            
            $package = new Package;
            $package->name  =  $request->name;
			$package->user_id  =  $request->user_id;
			$package->slug  =  $request->slug;
			$package->path  =  $request->path;
			$package->description  =  $request->description;
			if($request->image != ''){
				$package->image  = CRUDHelper::file_upload($request->image, 'uploads/user-'.Auth::id());
			}
			$package->meta_title  =  $request->meta_title;
			$package->meta_description  =  $request->meta_description;
			$package->meta_keyword  =  $request->meta_keyword;
            $package->save();
            return redirect('admin/package/'.$package->id)->with('success', 'You have successfully inserted new package');
        }catch(\Exception $e){
            return back()->with('error','Your record has been not submitted successfully ');
        }
    }

    public function show($id)
    {
        try{
            $package = Package::find($id);
            return view("admin/package/show", compact("package"));
        }catch(\Exception $e){
            return back();
        }
    }

    public function edit($id)
    {
        try{
            $users = User::all();
            $package =  Package::find($id);
            return view("admin/package/edit", compact("package", "users"));
        }catch(\Exception $e){
            return back();
        }

    }

    public function update(PackageRequest $request, $id)
    {
        try{
            $package =  Package::find($id);
            $package->name  =  $request->name;
			$package->user_id  =  $request->user_id;
			$package->slug  =  $request->slug;
			$package->path  =  $request->path;
			$package->description  =  $request->description;
			if($request->image != ''){
				$package->image  = CRUDHelper::file_upload($request->image, 'uploads/user-'.Auth::id());
			}
			$package->meta_title  =  $request->meta_title;
			$package->meta_description  =  $request->meta_description;
			$package->meta_keyword  =  $request->meta_keyword;
            $package->save();

            return back()->with('success','You have successfully updated package');
        }catch(\Exception $e){
            return back()->with('error','Your record has been not updated successfully');
        }
    }

    public function destroy($id)
    {
        try{
            Package::find($id)->delete();
            return redirect("admin/package")->with('success','Successfully delete package');
        }catch(\Exception $e){
            return back()->with('error','package was delete');
        }
    }

    
	public function publish(Request $request){
		$package = Package::find($request->id);
		$package->publish = $request->publish == 'true' ? true : false;
		$package->save();
		return $package;
	}


}
