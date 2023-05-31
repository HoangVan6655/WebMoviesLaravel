<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Genre;
use App\Models\Country;
use App\Models\Movie;
use App\Models\Episode;
use App\Models\Movie_Genre;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function home()
    {
        $movieHot = Movie::where('movie_hot', 1)->where('status', 1)->orderBy('NgayCapNhat', 'DESC')->get();
        $movieHot_sidebar = Movie::where('movie_hot', 1)->where('status', 1)->orderBy('NgayCapNhat', 'DESC')->take('10')->get();
        $trailer = Movie::where('resolution', 5)->where('status', 1)->orderBy('NgayCapNhat', 'DESC')->take('10')->get();
        $category = Category::orderBy('position', 'ASC')->where('status', 1)->get();
        $TheLoai = Genre::orderBy('position', 'ASC')->get();
        $QuocGia = Country::orderBy('position', 'ASC')->get();
        $category_home = Category::with('movie')->orderBy('id', 'ASC')->where('status', 1)->get();
        return view('pages.home', compact('category', 'TheLoai', 'QuocGia', 'category_home', 'movieHot', 'movieHot_sidebar', 'trailer'));
    }

    public function category($slug)
    {
        $category = Category::orderBy('position', 'ASC')->where('status', 1)->get();
        $TheLoai = Genre::orderBy('position', 'ASC')->get();
        $QuocGia = Country::orderBy('position', 'ASC')->get();

        $cate_slug = Category::where('slug', $slug)->first();
        $movie = Movie::where('category_id', $cate_slug->id)->orderBy('NgayCapNhat', 'DESC')->paginate(40);
        $movieHot_sidebar = Movie::where('movie_hot', 1)->where('status', 1)->orderBy('NgayCapNhat', 'DESC')->take('10')->get();
        $trailer = Movie::where('resolution', 5)->where('status', 1)->orderBy('NgayCapNhat', 'DESC')->take('10')->get();

        return view('pages.category', compact('category', 'TheLoai', 'QuocGia', 'cate_slug', 'movie', 'movieHot_sidebar', 'trailer'));
    }

    public function year($year)
    {
        $category = Category::orderBy('position', 'ASC')->where('status', 1)->get();
        $TheLoai = Genre::orderBy('position', 'ASC')->get();
        $QuocGia = Country::orderBy('position', 'ASC')->get();

        $year = $year;
        $movie = Movie::where('year', $year)->orderBy('NgayCapNhat', 'DESC')->paginate(40);
        $movieHot_sidebar = Movie::where('movie_hot', 1)->where('status', 1)->orderBy('NgayCapNhat', 'DESC')->take('10')->get();
        $trailer = Movie::where('resolution', 5)->where('status', 1)->orderBy('NgayCapNhat', 'DESC')->take('10')->get();

        return view('pages.year', compact('category', 'TheLoai', 'QuocGia', 'year', 'movie', 'movieHot_sidebar', 'trailer'));
    }

    public function tag($tag)
    {
        $category = Category::orderBy('position', 'ASC')->where('status', 1)->get();
        $TheLoai = Genre::orderBy('position', 'ASC')->get();
        $QuocGia = Country::orderBy('position', 'ASC')->get();

        $tag = $tag;
        $movie = Movie::where('tags', 'LIKE', '%' . $tag . '%')->orderBy('NgayCapNhat', 'DESC')->paginate(40);
        $movieHot_sidebar = Movie::where('movie_hot', 1)->where('status', 1)->orderBy('NgayCapNhat', 'DESC')->take('10')->get();
        $trailer = Movie::where('resolution', 5)->where('status', 1)->orderBy('NgayCapNhat', 'DESC')->take('10')->get();

        return view('pages.tag', compact('category', 'TheLoai', 'QuocGia', 'tag', 'movie', 'movieHot_sidebar', 'trailer'));
    }

    public function country($slug)
    {
        $category = Category::orderBy('position', 'ASC')->where('status', 1)->get();
        $TheLoai = Genre::orderBy('position', 'ASC')->get();
        $QuocGia = Country::orderBy('position', 'ASC')->get();

        $country_slug = Country::where('slug', $slug)->first();
        $movie = Movie::where('country_id', $country_slug->id)->orderBy('NgayCapNhat', 'DESC')->paginate(40);
        $movieHot_sidebar = Movie::where('movie_hot', 1)->where('status', 1)->orderBy('NgayCapNhat', 'DESC')->take('10')->get();
        $trailer = Movie::where('resolution', 5)->where('status', 1)->orderBy('NgayCapNhat', 'DESC')->take('10')->get();

        return view('pages.country', compact('category', 'TheLoai', 'QuocGia', 'country_slug', 'movie', 'movieHot_sidebar', 'trailer'));
    }

    public function genre($slug)
    {
        $category = Category::orderBy('position', 'ASC')->where('status', 1)->get();
        $TheLoai = Genre::orderBy('position', 'ASC')->where('status', 1)->get();
        $QuocGia = Country::orderBy('position', 'ASC')->where('status', 1)->get();

        $genre_slug = Genre::where('slug', $slug)->first();
        $movieHot_sidebar = Movie::where('movie_hot', 1)->where('status', 1)->orderBy('NgayCapNhat', 'DESC')->take('10')->get();
        $trailer = Movie::where('resolution', 5)->where('status', 1)->orderBy('NgayCapNhat', 'DESC')->take('10')->get();

        // nhiều thể loại
        $movie_genre = Movie_Genre::where('genre_id', $genre_slug->id)->get();
        $many_genre = [];
        foreach($movie_genre as $key => $movi) {
            $many_genre[] = $movi->movie_id;
        }
        $movie = Movie::whereIn('id', $many_genre)->orderBy('NgayCapNhat', 'DESC')->paginate(40);
        return view('pages.genre', compact('category', 'TheLoai', 'QuocGia', 'genre_slug', 'movie', 'movieHot_sidebar', 'trailer'));
    }

    public function movie($slug)
    {
        $category = Category::orderBy('position', 'ASC')->where('status', 1)->get();
        $TheLoai = Genre::orderBy('position', 'ASC')->where('status', 1)->get();
        $QuocGia = Country::orderBy('position', 'ASC')->where('status', 1)->get();
        $movie = Movie::with('category', 'genre', 'country', 'movie_genre')->where('slug', $slug)->where('status', 1)->first();
        $related = Movie::with('category', 'genre', 'country')->where('category_id', $movie->category->id)->orderBy(DB::raw('RAND()'))->whereNotIn('slug', [$slug])->get();
        $movieHot_sidebar = Movie::where('movie_hot', 1)->where('status', 1)->orderBy('NgayCapNhat', 'DESC')->take('10')->get();
        $trailer = Movie::where('resolution', 5)->where('status', 1)->orderBy('NgayCapNhat', 'DESC')->take('10')->get();
        $episode = Episode::with('movie')->where('movie_id', $movie->id)->orderBy('episode', 'DESC')->take(3)->get();
        $episode_tapdau = Episode::with('movie')->where('movie_id', $movie->id)->orderBy('episode', 'ASC')->take(1)->first();
        return view('pages.movie', compact('category', 'TheLoai', 'QuocGia', 'movie', 'related', 'movieHot_sidebar', 'trailer', 'episode', 'episode_tapdau'));
    }

    public function watch($slug, $tap)
    {
//        $tapphim = substr($tapphim, 4, 1);
        $category = Category::orderBy('position', 'ASC')->where('status', 1)->get();
        $TheLoai = Genre::orderBy('position', 'ASC')->where('status', 1)->get();
        $QuocGia = Country::orderBy('position', 'ASC')->where('status', 1)->get();
        $movie = Movie::with('category', 'genre', 'country', 'movie_genre', 'episode')->where('slug', $slug)->where('status', 1)->first();
        $related = Movie::with('category', 'genre', 'country')->where('category_id', $movie->category->id)->orderBy(DB::raw('RAND()'))->whereNotIn('slug', [$slug])->get();
        $movieHot_sidebar = Movie::where('movie_hot', 1)->where('status', 1)->orderBy('NgayCapNhat', 'DESC')->take('10')->get();
        $trailer = Movie::where('resolution', 5)->where('status', 1)->orderBy('NgayCapNhat', 'DESC')->take('10')->get();

        if (isset($tap)) {
            $tapphim = $tap;
            $tapphim = substr($tap, 4, 1);
            $episode = Episode::where('movie_id', $movie->id)->where('episode', $tapphim)->first();
        } else {
            $tapphim = 1;
            $episode = Episode::where('movie_id', $movie->id)->where('episode', $tapphim)->first();

        }

        return view('pages.watch', compact('category', 'TheLoai', 'QuocGia', 'movie', 'related', 'movieHot_sidebar', 'trailer', 'episode', 'tapphim'));
    }

    public function episode()
    {
        $category = Category::orderBy('position', 'ASC')->where('status', 1)->get();
        $TheLoai = Genre::orderBy('position', 'ASC')->where('status', 1)->get();
        $QuocGia = Country::orderBy('position', 'ASC')->where('status', 1)->get();
        $movie = Movie::with('category', 'genre', 'country', 'movie_genre')->where('slug', $slug)->where('status', 1)->first();
        $related = Movie::with('category', 'genre', 'country')->where('category_id', $movie->category->id)->orderBy(DB::raw('RAND()'))->whereNotIn('slug', [$slug])->get();
        $movieHot_sidebar = Movie::where('movie_hot', 1)->where('status', 1)->orderBy('NgayCapNhat', 'DESC')->take('10')->get();
        $trailer = Movie::where('resolution', 5)->where('status', 1)->orderBy('NgayCapNhat', 'DESC')->take('10')->get();
        return view('pages.episode', compact('category', 'TheLoai', 'QuocGia', 'movie', 'related', 'movieHot_sidebar', 'trailer'));
    }

    public function search()
    {
        if (isset($_GET['search'])) {
            $search = $_GET['search'];
            $category = Category::orderBy('position', 'ASC')->where('status', 1)->get();
            $TheLoai = Genre::orderBy('position', 'ASC')->get();
            $QuocGia = Country::orderBy('position', 'ASC')->get();

            $movie = Movie::where('title', 'LIKE', '%'.$search.'%')->orderBy('NgayCapNhat', 'DESC')->paginate(40);
            $movieHot_sidebar = Movie::where('movie_hot', 1)->where('status', 1)->orderBy('NgayCapNhat', 'DESC')->take('10')->get();
            $trailer = Movie::where('resolution', 5)->where('status', 1)->orderBy('NgayCapNhat', 'DESC')->take('10')->get();

            return view('pages.search', compact('category', 'TheLoai', 'QuocGia', 'search', 'movie', 'movieHot_sidebar', 'trailer'));
        } else {
            return redirect()->to('/');
        }
    }
}
