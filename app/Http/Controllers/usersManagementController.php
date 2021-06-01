<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\user;
use Illuminate\Support\Facades\DB;
use App\Rules\PhoneNumber;
use Illuminate\Support\Facades\Hash;

class usersManagementController extends Controller
{
    protected $users=null;
    public function __construct()
    {
      $this->users = new user;
    }
    public function showIndex(){
        /* $users = DB::table('user')->paginate(2); */
        /* $users = new user; */
        $users = $this->users->getAllUsers();
        return view('admin.users.index',compact('users'));
    }
    public function showEdit($id)
    {
        /* $user = user::find($id); */
        /* $user = new user; */
        $user = $this->users->findUser($id);
        return view('admin.users.edit',compact('user'));
    }
    public function doDelete($id)
    {
        $status = $this->users->deleteUser($id);
        if($status)
        {
            request()->session()->flash('success',"Bạn đã xoá thành công");
        }else{
            request()->session()->flash('error',"Đã có lỗi xảy ra hãy thử lại sau");
        }
        return redirect()->route('admin.users');
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
        /* $user = new user; */
        $status = $this->users->updateUser($request->email,$request->firstName,$request->lastName,$request->phoneNumber,$id);
/*         $user->gmail = $request->email;
        $user->first_name = $request->firstName;
        $user->last_name = $request->lastName;
        $user->phone_number = $request->phoneNumber;
        $user->save(); */
        if($status)
        {
            request()->session()->flash('success',"Bạn đã cập nhật thành công");
        }else{
            request()->session()->flash('error',"Đã có lỗi xảy ra hãy thử lại sau");
        }
        return redirect()->route('admin.users');
    }

    public function showAdd()
    {
        /* $user = user::find($id); */
        /* $user = new user; */
        return view('admin.users.add');
    }

    public function doAdd(Request $request)
    {
        $messages = [
            'email.required' => 'gmail khong duoc de trong',
        ];
        $validated = $request->validate([
            'firstName' => 'required|string|max:30',
            'lastName' => 'required|string|max:20',
            'email' => 'required|email:rfc,dns|max:255|unique:users,gmail',
            'phoneNumber' => ['required','numeric','digits:10',new PhoneNumber],
            'password' => 'required|string|max:100|min:8',
            'repassword' => 'required|same:password|string|min:8|max:100',
        ],$messages);
        $status = $this->users->createUser($request->email,$request->firstName,$request->lastName,$request->phoneNumber,hash::make($request->password));
        if($status)
        {
            request()->session()->flash('success',"Bạn đã thêm thành công");
        }else{
            request()->session()->flash('error',"Đã có lỗi xảy ra hãy thử lại sau");
        }
        return redirect()->route('admin.users');
    }
}