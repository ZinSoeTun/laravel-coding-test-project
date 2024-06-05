<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{     //for create page
    public function createPage()
    {
        return view('CreatePage');
    }

     // for user create
     public function create(Request $request)
     {
        // for validation
        Validator::make($request->all(), [
            'name'=> ['required', 'string'],
            'email' => ['required', 'email'],
            'role' => ['required'],
            'password' => ['required', 'min:6']
         ])->validate();
         //insert to database
         User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' =>   $request->role,
            'password' =>   $request->password
        ]);
         return back()->with(['success'=> 'Member Has Been Created']);
     }


   //for edit page
     public function editPage($id)
     {
       $user = User::where('id', $id)->first();
         return view('EditPage',compact('user'));
     }

     //for specific user edit
     public function edit($id ,Request $request)
     {
         // for validation
         Validator::make($request->all(), [
            'name'=> ['required', 'string'],
            'email' => ['required', 'email'],
            'role' => ['required'],
         ])->validate();
         //update to database
         User::where('id', $id)->update([
             'name' => $request->name,
             'email' => $request->email,
             'role' =>   $request->role
         ]);
         return back()->with(['success'=> 'Member Has Been Updated']);
     }
    //show members
     public function show()
     {
         $users =  User::paginate(5);
         return view('dashboard', compact('users'));
     }

     //for specific user delete
     public function delete($id)
     {
         //delete specific user
         User::where('id', $id)->delete();
         return back()->with(['success'=>'Member has been deleted']);
     }

}
