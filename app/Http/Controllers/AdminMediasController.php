<?php

namespace App\Http\Controllers;
//import photo class;
use App\Photo;
//import session class
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;


class AdminMediasController extends Controller
{
    //
    public function index(){
        
     $photos =Photo::all();
      
     //return redirect('admin.media.index',compact('photos'));
     return view('admin.media.index',compact('photos'));
    }

public function create(){


    return view('admin.media.create');
}

//method for uploading images
public function store(Request $request){
 
    // Request file by default it comes as file as below
    $file=$request->file('file');
   
    $name=time().$file->getClientOriginalName();
   
    $file->move('images',$name);

    Photo::create(['file'=>$name]);



}

// create destro method

public function destroy($id){

  $photo = Photo::findOrFail($id);
  //unlink the photo from the public path
    unlink(public_path().$photo->file);
      Session::flash('message','this media '.$photo->file.' file Has been deleted');
    $photo->delete();

    return redirect('/admin/media');
}

}
