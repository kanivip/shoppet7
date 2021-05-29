<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
    

    public function create($name,$parent){
        $this->name = $name;
        $this->parent_id = $parent;
        return $this->save();
    }

    public function getAll(){
        $categories = /* DB::table('categories')
        ->leftJoin('parent_categories', 'parent_categories.id', '=', 'categories.parent_id')
        ->get('parent_categories.name'); */
        categories::all();

        return  $categories;
    }

    public function parentCategory()
    {
        return $this->belongsTo(parentCategaries::class,'parent_id','id');
    }

}
