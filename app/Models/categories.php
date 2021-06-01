<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
    public function parentCategory()
    {
        return $this->belongsTo(parentCategories::class,'parent_id','id');
    }

    public function create($name,$parent){
        $this->name = $name;
        $this->parent_id = $parent;
        return $this->save();
    }

    public function destroyCategory($id){
        $category = $this->find($id);
        return $category->delete();
    }

    public function destroyCategoryWithParent($id){
        $categories = $this->where('parent_id',$id);
        return $categories->delete();
    }

    public function getCategory($id){
        $Category = $this->find($id);
        return $Category;
    }

    public function updateCategory($id,$name,$parent){
        $category = $this->find($id);
        $category->name = $name;
        $category->parent_id = $parent;
        return $category->save();
    }

    public function getAll(){
        $categories = /* DB::table('categories')
        ->leftJoin('parent_categories', 'parent_categories.id', '=', 'categories.parent_id')
        ->get('parent_categories.name'); */
        categories::paginate(2);

        return  $categories;
    }



}