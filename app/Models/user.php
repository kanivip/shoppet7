<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

class user extends Model
{
    protected $table = 'users';
    public $timestamps = false;
    public function createUser($gmail,$first,$last,$phone,$password){
        DB::table('user')->insert([
            'gmail' => $gmail,
            'first_name' => $first,
            'last_name' => $last,
            'phone_number' => $phone,
            'password' => $password
        ]);
    }
    public function getUserByGmail($gmail){
        $user = DB::table('user')->where('gmail', $gmail)->get();
        return $user[0];
    }
    public function getAllUsers(){
        $users = DB::table('user')->paginate(2);;
        return $users;
    }
    public function findUser($id){
        $user = user::find($id);
        return $user;
    }
    public function updateUser($gmail,$first,$last,$phone,$id){
        DB::table('user')->where('id',$id)->update([
            'gmail' => $gmail,
            'first_name' => $first,
            'last_name' => $last,
            'phone_number' => $phone,
        ]);
    }
}