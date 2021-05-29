<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class parentCategaries extends Model
{
    protected $table = 'parent_categories';

    public function create($name){
        $this->name = $name;
        return $this->save();
    }

    public function getAll(){
        $categories = parentCategaries::paginate(2);;
        return  $categories;
    }

    public function getAllNoPaginate(){
        $categories = parentCategaries::all();;
        return  $categories;
    }

    
}
