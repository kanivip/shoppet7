<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\parentCategaries;
use App\Models\categories;

class categoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
/*         $parentcategories = new parentCategaries;
        $parentcategories = $parentcategories->getAll();
        return view('admin.categories.index',compact('parentcategories')); */

        $parentCategories = new categories;
        $parentCategories = $parentCategories->getAll();
        return view('admin.categories.index',compact('parentCategories'));
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
        $parentcategories = new parentCategaries;
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
        $parentcategories = new parentCategaries;
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
        //
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
