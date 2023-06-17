<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Category::orderBy('position','ASC')->get();
        return view('admincp.category.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admincp.category.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $category = new Category();
        $category->title = $data['title'];
        $category->slug = $data['slug'];
        $category->description = $data['description'];
        $category->status = $data['status'];
        $category->position = Category::max('position') + 1;
        $category->save();
        toastr()->success('Thêm Danh Mục Thành Công!', 'Thông Báo', ['timeOut' => 5000]);
        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::find($id);
        return view('admincp.category.form', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();
        $category = Category::find($id);
        $category->title = $data['title'];
        $category->slug = $data['slug'];
        $category->description = $data['description'];
        $category->status = $data['status'];
        $category->position = $category->position;
        $category->save();
        toastr()->success('Cập Nhật Danh Mục Thành Công!', 'Thông Báo', ['timeOut' => 5000]);
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Category::find($id)->delete();
        toastr()->warning('Xoá Danh Mục Thành Công!', 'Thông Báo', ['timeOut' => 5000]);
        return redirect()->back();
    }

    public function resorting(Request  $request){
        $data = $request->all();

        if (isset($data['array_id'])) {
            foreach ($data['array_id'] as $key => $value) {
                $category = Category::find($value);
                $category->position = $key;
                $category->save();
            }
        }
    }
}
