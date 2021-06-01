<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\parentCategories;
use App\Models\categories;
use DB;

class categoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
/*         $parentcategories = new parentCategories;
        $parentcategories = $parentcategories->getAll();
        return view('admin.categories.index',compact('parentcategories')); */

        $Categories = new categories;
        $Categories = $Categories->getAll();
        $parentCategories = new parentCategories;
        $parentCategories = $parentCategories->getAll();
        return view('admin.categories.index',compact('Categories','parentCategories'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.addParent');
    }

    public function createchild()
    {
        $parentcategories = new parentCategories;
        $parentcategories = $parentcategories->getAllNoPaginate();
        return view('admin.categories.addChild',compact('parentcategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:30|unique:parent_categories,name',
        ]);
        $parentcategories = new parentCategories;
        $status = $parentcategories->create($request->name);
        if($status)
        {
            request()->session()->flash('success',"Bạn đã thêm thành công");
        }else{
            request()->session()->flash('error',"Đã có lỗi xảy ra hãy thử lại sau");
        }
        return redirect()->route('admin.categories.index');
    }

    public function storeChild(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:30|unique:categories,name',
            'parent' => 'required|max:30|'
        ]);
        $categories = new categories;
        $status = $categories->create($request->name,$request->parent);
        if($status)
        {
            request()->session()->flash('success',"Bạn đã thêm thành công");
        }else{
            request()->session()->flash('error',"Đã có lỗi xảy ra hãy thử lại sau");
        }
        return redirect()->route('admin.categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $parentCategory = new parentCategories;
        $parentCategory = $parentCategory->getParentCategory($id);
        return view('admin.categories.editParent',compact('parentCategory'));
    }

    public function editChild($id)
    {
        $parentcategories = new parentCategories;
        $parentcategories = $parentcategories->getAllNoPaginate();
        $category = new categories;
        $category = $category->getCategory($id);
        return view('admin.categories.editChild',compact('parentcategories'),compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function updateChild(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|max:30|unique:categories,name,'.$id,
            'parent' => 'required|max:30|'
        ]);
        $category = new categories;
        $status = $category->updateCategory($id,$request->name,$request->parent);
        if($status)
        {
            request()->session()->flash('success',"Bạn đã thêm thành công");
        }else{
            request()->session()->flash('error',"Đã có lỗi xảy ra hãy thử lại sau");
        }
        return redirect()->route('admin.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $parentCategory = new parentCategories;
        $categories = new categories;
        $status = DB::transaction(function () use ($parentCategory,$categories,$id) {
            $categories->destroyCategoryWithParent($id);
            $parentCategory->destroyParentCategory($id);
        });
        
        if($status==null)
        {
            request()->session()->flash('success',"Bạn đã xoá thành công");
        }else{
            request()->session()->flash('error',"Đã có lỗi xảy ra hãy thử lại sau");
        }
        return redirect()->route('admin.categories.index');
    }

    public function destroyChild($id)
    {
        $category = new categories;
        $status = $category->destroyCategory($id);
        if($status)
        {
            request()->session()->flash('success',"Bạn đã xoá thành công");
        }else{
            request()->session()->flash('error',"Đã có lỗi xảy ra hãy thử lại sau");
        }
        return redirect()->route('admin.categories.index');
    }
}