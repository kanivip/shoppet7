<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

class user extends Model
{
    protected $table = 'users';
    
    public function createUser($gmail,$first,$last,$phone,$password){
/*         DB::table('users')->insert([
            'gmail' => $gmail,
            'first_name' => $first,
            'last_name' => $last,
            'phone_number' => $phone,
            'password' => $password
        ]); */
        $this->gmail = $gmail;
        $this->first_name = $first;
        $this->last_name = $last;
        $this->phone_number = $phone;
        $this->password = $password;
        return $this->save();


    }

    public function deleteUser($id){
        $user = $this::findOrFail($id);
        return $user->delete();
    }

    public function getUserByGmail($gmail){
        /* $user = DB::table('users')->where('gmail', $gmail)->get(); */
        return user::where('gmail',$gmail)->first();
    }

    public function getAllUsers(){
        $users = DB::table('users')->orderBy('created_at','desc')->paginate(2);;
        return $users;
    }

    public function findUser($id){
        $user = user::find($id);
        return $user;
    }
    
    public function updateUser($gmail,$first,$last,$phone,$id){
        return DB::table('users')->where('id',$id)->update([
            'gmail' => $gmail,
            'first_name' => $first,
            'last_name' => $last,
            'phone_number' => $phone,
        ]);
    }
}