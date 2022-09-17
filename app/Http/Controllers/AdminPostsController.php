<?php

namespace App\Http\Controllers;
//import post
use App\Post;
//import Photo file
use App\Photo;
//import category class
use App\Category;
//imports request 
use App\Http\Requests\PostsCreateRequest;
use Illuminate\Http\Request;
//Import Auth class 
use Illuminate\Support\Facades\Auth;
class AdminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts=Post::all();

        return view('admin.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // fetch all cetegories and use them in form to select 
        $categories =Category::pluck('name','id')->all();
        return view('admin.posts.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostsCreateRequest $request)
    {
        // storing the information from the form 
        $inputs =$request->all();

        $user=Auth::user();
        //if the photo exists
        if($file=$request->file(photo_id)){
           // return 'Photo is available';
           $name=time().$file->getClientOriginalName();
           $file->move('images',$name);
           // create a photo to save it in the database
           $photo=Photo::create(['file'=>$name]);
        //   asign a photo id to the incoming request file.
        $inputs['photo_id']=$photo->id;

        }

        $user->posts()->create($inputs);

        return redirect('/admin/posts');

        //return $request->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
