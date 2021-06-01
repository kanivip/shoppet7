<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class parentCategories extends Model
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

    public function getParentCategory($id){
        return $this->find($id);
    }

    public function destroyParentCategory($id){
        $parentCategory = $this->find($id);
        return $parentCategory->delete();
    }

    public function getAllWithCategories(){
        $parentCategories = parentCategories::with('categories')->paginate(2);;
        return  $parentCategories;
    }

    public function getAll(){
        $categories = parentCategories::all();;
        return  $categories;
    }

    public function getAllNoPaginate(){
        $categories = parentCategories::all();;
        return  $categories;
    }

    
}