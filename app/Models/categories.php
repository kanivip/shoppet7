<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
    

    public function create($name,$parent){
        $this->name = $name;
        $this->parent_id = $parent;
        return $this->save();
    }

    public function getAll(){
        $categories = $this->parentCategory()->paginate(2);
        return  $categories;
    }

    public function parentCategory()
    {
        return $this->belongsTo(parentCategaries::class);
    }

}
