<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Category;
use App\Models\Genre;
use App\Models\Country;
use Carbon\Carbon;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Movie::with('category', 'genre', 'country')->orderBy('id', 'DESC')->get();
        return view('admincp.movie.index', compact('list'));
    }

    public function update_year(Request $request)
    {
        $data = $request->all();
        $movie = Movie::find($data['id_phim']);
        $movie->year = $data['year'];
        $movie->save();
    }

    public function update_season(Request $request)
    {
        $data = $request->all();
        $movie = Movie::find($data['id_phim']);
        $movie->season = $data['season'];
        $movie->save();
    }

    public function update_topview(Request $request)
    {
        $data = $request->all();
        $movie = Movie::find($data['id_phim']);
        $movie->topview = $data['topview'];
        $movie->save();
    }

    public function filter_topview(Request $request){
        $data = $request->all();
        $movie = Movie::where('topview',$data['value'])->orderBy('ngaycapnhat','DESC')->take(20)->get();
        $output = '';
        foreach ($movie as $key => $mov){
            if($mov->resolution==0)
            {
                $text = 'HD';
            }elseif ($mov->resolution==1){
                $text = 'SD';
            }elseif ($mov->resolution==2){
                $text = 'HDCam';
            }else{
                $text = 'Cam';
            }

            $output.='<div class="item">
                        <a href="'.url('phim/'.$mov->slug).'" title="'.$mov->title.'">
                            <div class="item-link">
                                <img src="'.url('uploads/movie/'.$mov->image).'" class="lazy post-thumb" alt="'.$mov->title.'" title="'.$mov->title.'"/>
                                <span class="is_trailer">
                                    '.$text.'
                                </span>
                            </div>
                            <p class="title">'.$mov->image.'</p>
                        </a>
                        <div class="viewsCount" style="color: #9d9d9d;">3.2k lượt xem</div>
                        <div style="float: left;">
                            <span class="user-rate-image post-large-rate stars-large-vang" style="display: block;">
                                <span style="width: 0%"></span>
                            </span>
                        </div>
                        </div>';
        }
        echo $output;
    }

    public function filter_default(Request $request){
        $data = $request->all();
        $movie = Movie::where('topview',0)->orderBy('ngaycapnhat','DESC')->take(20)->get();
        $output = '';
        foreach ($movie as $key => $mov){
            if($mov->resolution==0)
            {
                $text = 'HD';
            }elseif ($mov->resolution==1){
                $text = 'SD';
            }elseif ($mov->resolution==2){
                $text = 'HDCam';
            }else{
                $text = 'Cam';
            }

            $output.='<div class="item">
                        <a href="'.url('phim/'.$mov->slug).'" title="'.$mov->title.'">
                            <div class="item-link">
                                <img src="'.url('uploads/movie/'.$mov->image).'" class="lazy post-thumb" alt="'.$mov->title.'" title="'.$mov->title.'"/>
                                <span class="is_trailer">
                                    '.$text.'
                                </span>
                            </div>
                            <p class="title">'.$mov->image.'</p>
                        </a>
                        <div class="viewsCount" style="color: #9d9d9d;">3.2k lượt xem</div>
                        <div style="float: left;">
                            <span class="user-rate-image post-large-rate stars-large-vang" style="display: block;">
                                <span style="width: 0%"></span>
                            </span>
                        </div>
                        </div>';
        }
        echo $output;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::pluck('title', 'id');
        $genre = Genre::pluck('title', 'id');
        $country = Country::pluck('title', 'id');
        return view('admincp.movie.form', compact('genre', 'country', 'category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $movie = new Movie();
        $movie->title = $data['title'];
        $movie->ThoiLuong = $data['ThoiLuong'];
        $movie->name_original = $data['name_original'];
        $movie->slug = $data['slug'];
        $movie->tags = $data['tags'];
        $movie->description = $data['description'];
        $movie->category_id = $data['category_id'];
        $movie->genre_id = $data['genre_id'];
        $movie->country_id = $data['country_id'];
        $movie->status = $data['status'];
        $movie->movie_hot = $data['movie_hot'];
        $movie->resolution = $data['resolution'];
        $movie->phude = $data['phude'];
        $movie->NgayTao = Carbon::now('Asia/Ho_Chi_Minh');
        $movie->NgayCapNhat = Carbon::now('Asia/Ho_Chi_Minh');

        //Thêm hình ảnh
        $get_image = $request->file('image');
        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image.rand(0,9999).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('uploads/movie/', $new_image);
            $movie->image = $new_image;
        }
        $movie->save();
        return redirect()->back();
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
        $category = Category::pluck('title', 'id');
        $genre = Genre::pluck('title', 'id');
        $country = Country::pluck('title', 'id');
        $movie = Movie::find($id);
        return view('admincp.movie.form', compact('genre', 'country', 'category', 'movie'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();

        $movie = Movie::find($id);
        $movie->title = $data['title'];
        $movie->ThoiLuong = $data['ThoiLuong'];
        $movie->name_original = $data['name_original'];
        $movie->slug = $data['slug'];
        $movie->tags = $data['tags'];
        $movie->description = $data['description'];
        $movie->category_id = $data['category_id'];
        $movie->genre_id = $data['genre_id'];
        $movie->country_id = $data['country_id'];
        $movie->status = $data['status'];
        $movie->movie_hot = $data['movie_hot'];
        $movie->resolution = $data['resolution'];
        $movie->phude = $data['phude'];
        $movie->NgayCapNhat = Carbon::now('Asia/Ho_Chi_Minh');

        //Thêm hình ảnh
        $get_image = $request->file('image');
        if ($get_image) {
            if (file_exists('uploads/movie/'.$movie->image)) {
                unlink('uploads/movie/'.$movie->image);
            } else {
                $get_name_image = $get_image->getClientOriginalName();
                $name_image = current(explode('.', $get_name_image));
                $new_image = $name_image.rand(0,9999).'.'.$get_image->getClientOriginalExtension();
                $get_image->move('uploads/movie/', $new_image);
                $movie->image = $new_image;
            }
        }
        $movie->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $movie = Movie::find($id);
        if (file_exists('uploads/movie/'.$movie->image)) {
            unlink('uploads/movie/'.$movie->image);
        }
        $movie->delete();
        return redirect()->back();
    }
}