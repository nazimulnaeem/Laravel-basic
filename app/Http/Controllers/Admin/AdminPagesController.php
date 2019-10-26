<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Post;
use App\User;


use Image;
use File;
use Carbon\Carbon;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class AdminPagesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function admin(){
        return view('admin.index');
    }


    public function index()
    {
        $posts = Post::orderBy('id','desc')->paginate(2);
        $categories = Category::all();
        return view('admin.post.index',compact('categories','posts'));
    }

    public function view(){
        $categories = Category::all();
        $posts = Post::all();
        return view('admin.post.view',compact('categories','posts'));
    }

    public function post_show($id){
        $categories = Category::all();
        $post = Post::find($id);
        return view('admin.post.show',compact('categories','post'));
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
            return redirect()->route('admin.view');
    
        }
    
        public function post_edit($id){
            $categories = Category::all();
            $post = Post::find($id);
            return view('admin.post.edit',compact('categories','post'));
        }
    
        public function post_update(Request $request, $id){
            $post = Post::find($id);
            $post->title = $request->title;
            $post->description = $request->description;
            $post->category_id = $request->category_id;
            $post->user_id = Auth::id();
    
            // return $post->category_id;
            $post->save();
            return redirect()->route('admin.view');
    
        }
    
        public function search(Request $request){

            $search = $request->search;
            $posts = Post::orWhere('title','like','%'.$search.'%')
            ->orWhere('title','like','%'.$search.'%')
            ->orWhere('description','like','%'.$search.'%')
            ->paginate(2);
            return view('admin.partial.search',compact('posts','search'));
        }
    

    public function profile($id){
        $user = User::find($id);
        return view('admin.profile',compact('user'));
    }


    public function profile_update(Request $request,$id){
        
        $this->validate($request, [
           
            'name'=>'required',
            'email'=>'required|email',
            'image'=>'nullable|image',
        ],[
            'name.required' => 'Please provide user name',
            'email.required' => 'Please insert valid email',
            'image.image' => 'Please provide a valid image with jpg jpge png etc',
        ]
    );

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->description = $request->description;

        if($request->image > 0 ){
            //  Delete old image from folder
    
            if(File::exists('images/profile/'.$user->image)){
                File::delete('images/profile/'.$user->image);
            }
    
               $currentDate = Carbon::now()->toDateString();
                $image = $request->file('image');
                $img = $currentDate. '.'. uniqid() . '.'. $image->getClientOriginalExtension();
                $location = public_path('images/profile/'.$img);
                Image:: make($image)->save($location);
                $user->image = $img;
    
            }
            $user->save();
            return redirect()->route('admin.index');
    }



    
    public function post_delete($id){
        $post = Post :: find($id);
        if(!is_null($post)){
            $post->delete();
        }
        return back();
    }




}
