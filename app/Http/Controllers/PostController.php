<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use Auth;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request){
    //     $this->validate($request,[
    //     'title' =>'required',
    //     'description' => 'required',
    //     'category_id' => 'required'
    //     ],
    // [
    //     'title.required' => 'Please provide the title',
    //     'description.required' => 'Please provide the description'
    // ]
    // );

        $post = new Post();
        $post->title = $request->title;
        $post->description = $request->description;
        $post->category_id = $request->category_id;
        $post->user_id = Auth::id();

        // return $post->category_id;
        $post->save();
        return redirect('home');

    }

    public function edit($id){
        $categories = Category::all();
        $post = Post::find($id);
        return view('edit',compact('categories','post'));
    }

    public function update(Request $request, $id){
        $post = Post::find($id);
        $post->title = $request->title;
        $post->description = $request->description;
        $post->category_id = $request->category_id;
        $post->user_id = Auth::id();

        // return $post->category_id;
        $post->save();
        return redirect()->route('home');

    }

    public function delete($id){
        $post = Post :: find($id);
        if(!is_null($post)){
            $post->delete();
        }
        return back();
    }


}
