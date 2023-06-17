<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Country::orderBy('position','ASC')->get();
//        var_dump($list);
        return view('admincp.country.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admincp.country.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $country = new Country();
        $country->title = $data['title'];
        $country->slug = $data['slug'];
        $country->description = $data['description'];
        $country->status = $data['status'];
        $country->position = Country::max('position') + 1;
        $country->save();
        toastr()->success('Thêm Mới Quốc Gia Thành Công!', 'Thông Báo', ['timeOut' => 5000]);
        return redirect()->route('country.index');
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
        $country = Country::find($id);
        return view('admincp.country.form', compact( 'country'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();
        $country = Country::find($id);
        $country->title = $data['title'];
        $country->slug = $data['slug'];
        $country->description = $data['description'];
        $country->status = $data['status'];
        $country->position = $country->position;
        $country->save();
        toastr()->success('Cập Nhật Quốc Gia Thành Công!', 'Thông Báo', ['timeOut' => 5000]);
        return redirect()->route('country.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Country::find($id)->delete();
        toastr()->success('Xoá Quốc Gia Thành Công!', 'Thông Báo', ['timeOut' => 5000]);
        return redirect()->back();
    }

    public function resorting(Request  $request){
        $data = $request->all();

        if (isset($data['array_id'])) {
            foreach ($data['array_id'] as $key => $value) {
                $country = Country::find($value);
                $country->position = $key;
                $country->save();
            }
        }
    }
}
