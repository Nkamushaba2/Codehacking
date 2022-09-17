<?php

namespace App\Http\Controllers;
//import class
use App\User;
use App\Role;
use App\Photo;
//import session class
use Illuminate\Support\Facades\Session;
//import suers request also 
use App\Http\Requests\UsersRequest;
use App\Http\Requests\UserEditRequest;
use Illuminate\Http\Request;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //all uaers 
        $users=User::all();
      //  return view('admin.users.index',compact('users'));
      return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // Returning a list of relationship table and use it in a form like below
        $roles = Role::pluck('name','id')->all();

        return view('admin.users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersRequest $request)
    {
        // checking if containf information 
        if(trim($request->password) ==''){
             $input=$request -> except('password');
        }
        else{
              $input =$request->all();
              $input['password'] = bcrypt($request->password);

        }
        //
      //  $input = $request->all();
        if($file=$request->file('photo_id')){
         
            $name=time().$file->getClientOriginalName();

          $file->move('images',$name);

          $photo = Photo::create(['file'=>$name]);

          $input['photo_id']= $photo->id;
        }
    
   

        User::create($input);

        return redirect('/admin/users');
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
        $user =User::findOrFail($id);

        $roles= Role::pluck('name','id')->all();

        return view('admin.users.edit',compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserEditRequest $request, $id)
    {
        //
        $user = User::findOrFail($id);

        // checking if containf information 
        if(trim($request->password) ==''){
            $input=$request -> except('password');
       }
       else{
             $input =$request->all();
             $input['password'] = bcrypt($request->password);

       }
      //  $input=$request->all();
        if($file=$request->file('photo_id')){
         $name=time().$file->getClientOriginalName();
         $file->move('images',$name);
       $photo =Photo::create(['file'=>$name]);

       $input['photo_id']= $photo->id;

        }

      $user->update($input);

        return redirect('/admin/users');
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
        // User::findOrFail($id)->delete();
        $user =User::findOrFail($id);
     // deleting also the image
        unlink(public_path().$user->photo->file);

        $user->delete();
         // session for flash messages
          Session::flash('user-delete','The user has been deleted');
         return redirect('/admin/users');
    }
}
