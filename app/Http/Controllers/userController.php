<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\user;
use App\Rules\PhoneNumber;

class userController extends Controller
{
    public function showLogin(){
        return view('pages.login');
    }

    public function showRegister(){
        return view('pages.register');
    }

    public function doRegister(Request $request){
        $messages = [
            'email.required' => 'gmail khong duoc de trong',
        ];
        $validated = $request->validate([
            'firstName' => 'required|string|max:30',
            'lastName' => 'required|string|max:20',
            'email' => 'required|email:rfc,dns|max:255|unique:users,gmail',
            'phoneNumber' => ['required','numeric','digits:10',new PhoneNumber],
            'password' => 'required|string|max:100|min:8',
            'rePassword' => 'required|same:password|string|min:8|max:100',
        ],$messages);

        $user = new user;
        $user->createUser($request->email,$request->firstName,$request->lastName,$request->phoneNumber,hash::make($request->password));
/*         $user = new user;
        $user->gmail = $request->email;
        $user->first_name = $request->firstName;
        $user->last_name = $request->lastName;
        $user->phone_number = $request->phoneNumber;
        $user->password = hash::make($request->password);
        $user->save(); */
        
        return view("pages.login");
        
    }
    public function doLogin(Request $request){
        $validated = $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|string|max:100|min:8',
        ]);
        $user = new user;
        /* $user = user::where('gmail', '=', $request->email)->first(); */
        $user = $user->getUserByGmail($request->email);
        if($user != null)
        {
            $username = $user->first_name.$user->last_name;
            if(Hash::check($request->password, $user->password)){
                    session(['id_user' => $user->id]);
                    session(['username' =>  $username]);
                    return redirect('/');
                }
                else 
                    return redirect('/login')->with('warm', 'M???t kh???u kh??ng ????ng');
        }else{
            return redirect('/login')->with('warm', 'T??i kho???n ch??a ????ng k??');
        }
    }

    public function doLogout(Request $request){
        $request->session()->forget('username');
        $request->session()->forget('gmail');
        return view("pages.login");
    }
}