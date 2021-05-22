<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\user;
use Illuminate\Support\Facades\DB;

class usersManagementController extends Controller
{
    public function showIndex(){
        /* $users = DB::table('user')->paginate(2); */
        $users = new user;
        $users = $users->getAllUsers();
        return view('admin.users.index',compact('users'));
    }
    public function showEdit($id)
    {
        /* $user = user::find($id); */
        $user = new user;
        $user = $user->findUser($id);
        return view('admin.users.edit',compact('user'));
    }
    public function doUpdate($id,Request $request)
    {
        
/*         $user = user::find($id); */
        Validator::make($request->all(), [
            'email' => [
                'required',
                Rule::unique('user','gmail')->ignore($id),
                
            ],
            'firstName' => 'required|string|max:30',
            'lastName' => 'required|string|max:20',
            'phoneNumber' => 'required|string|max:20|min:10',
        ]);
        $user = new user;
        $user->updateUser($request->email,$request->firstName,$request->lastName,$request->phoneNumber,$id);
/*         $user->gmail = $request->email;
        $user->first_name = $request->firstName;
        $user->last_name = $request->lastName;
        $user->phone_number = $request->phoneNumber;
        $user->save(); */
        return redirect()->route('admin.users');
    }
}