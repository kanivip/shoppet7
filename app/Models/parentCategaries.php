<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class parentCategaries extends Model
{
    protected $table = 'parent_categories';

    public function categories()
    {
        return $this->hasMany(categories::class,'parent_id','id');
    }

    public function create($name){
        $this->name = $name;
        return $this->save();
    }

    public function getAllWithCategories(){
        $parentCategaries = parentCategaries::with('categories')->paginate(2);;
        return  $parentCategaries;
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
