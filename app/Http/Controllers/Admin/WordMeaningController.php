<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\WordMeaningRequest;
use GovindTomar\CrudGenerator\Helpers\CRUDHelper;
use App\Models\WordMeaning;
use DB;
use Auth;

class WordMeaningController extends Controller
{
    public function __construct(){
        $this->middleware(['permission', 'auth']);
    }

    public function index()
    {
        try{
            $word_meanings = WordMeaning::paginate(20);
            return view("admin/word-meaning/index", compact("word_meanings"));
        }catch(\Exception $e){
            return back();
        }
    }

    public function create()
    {
        try{
            return view("admin/word-meaning/create");
        }catch(\Exception $e){
            return back();
        }
    }

    public function store(WordMeaningRequest $request)
    {
        try{
            $word_meaning = new WordMeaning;
            $word_meaning->word  =  $request->word;
			$word_meaning->meaning  =  $request->meaning;
			$word_meaning->detail  =  $request->detail;
			$word_meaning->sentence  =  $request->sentence;
            $word_meaning->save();
            return redirect('admin/word-meaning/'.$word_meaning->id)->with('success', 'You have successfully inserted new word meaning');
        }catch(\Exception $e){
            return back()->with('error','Your record has been not submitted successfully ');
        }
    }

    public function show($id)
    {
        try{
            $word_meaning = WordMeaning::find($id);            
            return view("admin/word-meaning/show", compact("word_meaning"));
        }catch(\Exception $e){
            return back();
        }
    }

    public function edit($id)
    {
        try{
            $word_meaning =  WordMeaning::find($id);
            return view("admin/word-meaning/edit", compact("word_meaning"));
        }catch(\Exception $e){
            return back();
        }

    }

    public function update(WordMeaningRequest $request, $id)
    {
        try{
            $word_meaning =  WordMeaning::find($id);
            $word_meaning->word  =  $request->word;
			$word_meaning->meaning  =  $request->meaning;
			$word_meaning->detail  =  $request->detail;
			$word_meaning->sentence  =  $request->sentence;
            $word_meaning->save();
            
            return back()->with('success','You have successfully updated word meaning');
        }catch(\Exception $e){
            return back()->with('error','Your record has been not updated successfully');
        }
    }

    public function destroy($id)
    {
        try{
            WordMeaning::find($id)->delete();
            return redirect("admin/word-meaning")->with('success','Successfully delete word meaning');

        }catch(\Exception $e){
            return back()->with('error','word meaning was delete');
        }
    }
    
	public function status(Request $request){
		$word_meaning = WordMeaning::find($request->id);
		$word_meaning->status = $request->status == 'true' ? true : false;
		$word_meaning->save();
		return $word_meaning;
	}



}
