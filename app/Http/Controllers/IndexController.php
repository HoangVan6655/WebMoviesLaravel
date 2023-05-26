<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Genre;
use App\Models\Country;
use App\Models\Movie;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function home() {
        $movieHot = Movie::where('movie_hot',1)->where('status',1)->orderBy('NgayCapNhat', 'DESC')->get();
        $movieHot_sidebar = Movie::where('movie_hot',1)->where('status',1)->orderBy('NgayCapNhat', 'DESC')->take('20')->get();
        $category = Category::orderBy('position', 'ASC')->where('status',1)->get();
        $TheLoai = Genre::orderBy('position', 'ASC')->get();
        $QuocGia = Country::orderBy('position', 'ASC')->get();
        $category_home = Category::with('movie')->orderBy('id', 'ASC')->where('status',1)->get();
        return view('pages.home', compact('category', 'TheLoai', 'QuocGia', 'category_home', 'movieHot', 'movieHot_sidebar'));
    }

    public function category($slug) {
        $category = Category::orderBy('position', 'ASC')->where('status',1)->get();
        $TheLoai = Genre::orderBy('position', 'ASC')->get();
        $QuocGia = Country::orderBy('position', 'ASC')->get();

        $cate_slug = Category::where('slug', $slug)->first();
        $movie = Movie::where('category_id',$cate_slug->id)->orderBy('NgayCapNhat', 'DESC')->paginate(40);
        $movieHot_sidebar = Movie::where('movie_hot',1)->where('status',1)->orderBy('NgayCapNhat', 'DESC')->take('20')->get();

        return view('pages.category', compact('category', 'TheLoai', 'QuocGia', 'cate_slug', 'movie', 'movieHot_sidebar'));
    }

    public function year($year) {
        $category = Category::orderBy('position', 'ASC')->where('status',1)->get();
        $TheLoai = Genre::orderBy('position', 'ASC')->get();
        $QuocGia = Country::orderBy('position', 'ASC')->get();

        $year = $year;
        $movie = Movie::where('year',$year)->orderBy('NgayCapNhat', 'DESC')->paginate(40);
        $movieHot_sidebar = Movie::where('movie_hot',1)->where('status',1)->orderBy('NgayCapNhat', 'DESC')->take('20')->get();

        return view('pages.year', compact('category', 'TheLoai', 'QuocGia', 'year', 'movie', 'movieHot_sidebar'));
    }

    public function tag($tag) {
        $category = Category::orderBy('position', 'ASC')->where('status',1)->get();
        $TheLoai = Genre::orderBy('position', 'ASC')->get();
        $QuocGia = Country::orderBy('position', 'ASC')->get();

        $tag = $tag;
        $movie = Movie::where('tags','LIKE','%'.$tag.'%')->orderBy('NgayCapNhat', 'DESC')->paginate(40);
        $movieHot_sidebar = Movie::where('movie_hot',1)->where('status',1)->orderBy('NgayCapNhat', 'DESC')->take('20')->get();

        return view('pages.tag', compact('category', 'TheLoai', 'QuocGia', 'tag', 'movie', 'movieHot_sidebar'));
    }

    public function country($slug) {
        $category = Category::orderBy('position', 'ASC')->where('status',1)->get();
        $TheLoai = Genre::orderBy('position', 'ASC')->get();
        $QuocGia = Country::orderBy('position', 'ASC')->get();

        $country_slug = Country::where('slug', $slug)->first();
        $movie = Movie::where('country_id',$country_slug->id)->orderBy('NgayCapNhat', 'DESC')->paginate(40);
        $movieHot_sidebar = Movie::where('movie_hot',1)->where('status',1)->orderBy('NgayCapNhat', 'DESC')->take('20')->get();

        return view('pages.country', compact('category','TheLoai','QuocGia','country_slug','movie', 'movieHot_sidebar'));
    }

    public function genre($slug) {
        $category = Category::orderBy('position', 'ASC')->where('status',1)->get();
        $TheLoai = Genre::orderBy('position', 'ASC')->where('status',1)->get();
        $QuocGia = Country::orderBy('position', 'ASC')->where('status',1)->get();

        $genre_slug = Genre::where('slug', $slug)->first();
        $movie = Movie::where('genre_id',$genre_slug->id)->orderBy('NgayCapNhat', 'DESC')->paginate(40);
        $movieHot_sidebar = Movie::where('movie_hot',1)->where('status',1)->orderBy('NgayCapNhat', 'DESC')->take('20')->get();

        return view('pages.genre', compact('category', 'TheLoai', 'QuocGia', 'genre_slug', 'movie',  'movieHot_sidebar'));
    }

    public function movie($slug) {
        $category = Category::orderBy('position', 'ASC')->where('status',1)->get();
        $TheLoai = Genre::orderBy('position', 'ASC')->where('status',1)->get();
        $QuocGia = Country::orderBy('position', 'ASC')->where('status',1)->get();
        $movie = Movie::with('category','genre','country')->where('slug',$slug)->where('status',1)->first();
        $related = Movie::with('category','genre','country')->where('category_id',$movie->category->id)->orderBy(DB::raw('RAND()'))->whereNotIn('slug',[$slug])->get();
        $movieHot_sidebar = Movie::where('movie_hot',1)->where('status',1)->orderBy('NgayCapNhat', 'DESC')->take('20')->get();

        return view('pages.movie', compact('category', 'TheLoai', 'QuocGia', 'movie', 'related', 'movieHot_sidebar'));
    }

    public function watch() {
        return view('pages.watch');
    }

    public function episode() {
        return view('pages.episode');
    }
}
