<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Genre;
use App\Models\Country;
use App\Models\Movie;
use App\Models\Episode;
use App\Models\Movie_Genre;
use App\Models\Rating;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function home()
    {
        $movieHot = Movie::withCount('episode')->where('movie_hot', 1)->where('status', 1)->orderBy('NgayCapNhat', 'DESC')->get();
        $movieHot_sidebar = Movie::where('movie_hot', 1)->where('status', 1)->orderBy('NgayCapNhat', 'DESC')->take('10')->get();
        $trailer = Movie::where('resolution', 5)->where('status', 1)->orderBy('NgayCapNhat', 'DESC')->take('10')->get();
        $category = Category::orderBy('position', 'ASC')->where('status', 1)->get();
        $TheLoai = Genre::orderBy('position', 'ASC')->where('status', 1)->get();
        $QuocGia = Country::orderBy('position', 'ASC')->where('status', 1)->get();
        $category_home = Category::with(['movie' => function ($q) {
            $q->withCount('episode')->where('status', 1);
        }])->orderBy('id', 'ASC')->where('status', 1)->get();
        return view('pages.home', compact('category', 'TheLoai', 'QuocGia', 'category_home', 'movieHot', 'movieHot_sidebar', 'trailer'));
    }

    public function category($slug)
    {
        $category = Category::orderBy('position', 'ASC')->where('status', 1)->get();
        $TheLoai = Genre::orderBy('position', 'ASC')->where('status', 1)->get();
        $QuocGia = Country::orderBy('position', 'ASC')->where('status', 1)->get();

        $cate_slug = Category::where('slug', $slug)->first();
        $movie = Movie::withCount('episode')->where('category_id', $cate_slug->id)->orderBy('NgayCapNhat', 'DESC')->paginate(40);
        $movieHot_sidebar = Movie::withCount('episode')->where('movie_hot', 1)->where('status', 1)->orderBy('NgayCapNhat', 'DESC')->take('10')->get();
        $trailer = Movie::where('resolution', 5)->where('status', 1)->orderBy('NgayCapNhat', 'DESC')->take('10')->get();

        return view('pages.category', compact('category', 'TheLoai', 'QuocGia', 'cate_slug', 'movie', 'movieHot_sidebar', 'trailer'));
    }

    public function year($year)
    {
        $category = Category::orderBy('position', 'ASC')->where('status', 1)->get();
        $TheLoai = Genre::orderBy('position', 'ASC')->where('status', 1)->get();
        $QuocGia = Country::orderBy('position', 'ASC')->where('status', 1)->get();

        $year = $year;
        $movie = Movie::withCount('episode')->where('year', $year)->orderBy('NgayCapNhat', 'DESC')->paginate(40);
        $movieHot_sidebar = Movie::withCount('episode')->where('movie_hot', 1)->where('status', 1)->orderBy('NgayCapNhat', 'DESC')->take('10')->get();
        $trailer = Movie::where('resolution', 5)->where('status', 1)->orderBy('NgayCapNhat', 'DESC')->take('10')->get();

        return view('pages.year', compact('category', 'TheLoai', 'QuocGia', 'year', 'movie', 'movieHot_sidebar', 'trailer'));
    }

    public function tag($tag)
    {
        $category = Category::orderBy('position', 'ASC')->where('status', 1)->get();
        $TheLoai = Genre::orderBy('position', 'ASC')->where('status', 1)->get();
        $QuocGia = Country::orderBy('position', 'ASC')->where('status', 1)->get();

        $tag = $tag;
        $movie = Movie::withCount('episode')->where('tags', 'LIKE', '%' . $tag . '%')->orderBy('NgayCapNhat', 'DESC')->paginate(40);
        $movieHot_sidebar = Movie::withCount('episode')->where('movie_hot', 1)->where('status', 1)->orderBy('NgayCapNhat', 'DESC')->take('10')->get();
        $trailer = Movie::where('resolution', 5)->where('status', 1)->orderBy('NgayCapNhat', 'DESC')->take('10')->get();

        return view('pages.tag', compact('category', 'TheLoai', 'QuocGia', 'tag', 'movie', 'movieHot_sidebar', 'trailer'));
    }

    public function country($slug)
    {
        $category = Category::orderBy('position', 'ASC')->where('status', 1)->get();
        $TheLoai = Genre::orderBy('position', 'ASC')->where('status', 1)->get();
        $QuocGia = Country::orderBy('position', 'ASC')->where('status', 1)->get();

        $country_slug = Country::where('slug', $slug)->first();
        $movie = Movie::withCount('episode')->where('country_id', $country_slug->id)->orderBy('NgayCapNhat', 'DESC')->paginate(40);
        $movieHot_sidebar = Movie::withCount('episode')->where('movie_hot', 1)->where('status', 1)->orderBy('NgayCapNhat', 'DESC')->take('10')->get();
        $trailer = Movie::where('resolution', 5)->where('status', 1)->orderBy('NgayCapNhat', 'DESC')->take('10')->get();

        return view('pages.country', compact('category', 'TheLoai', 'QuocGia', 'country_slug', 'movie', 'movieHot_sidebar', 'trailer'));
    }

    public function genre($slug)
    {
        $category = Category::orderBy('position', 'ASC')->where('status', 1)->get();
        $TheLoai = Genre::orderBy('position', 'ASC')->where('status', 1)->get();
        $QuocGia = Country::orderBy('position', 'ASC')->where('status', 1)->get();

        $genre_slug = Genre::where('slug', $slug)->first();
        $movieHot_sidebar = Movie::withCount('episode')->where('movie_hot', 1)->where('status', 1)->orderBy('NgayCapNhat', 'DESC')->take('10')->get();
        $trailer = Movie::where('resolution', 5)->where('status', 1)->orderBy('NgayCapNhat', 'DESC')->take('10')->get();

        // nhiều thể loại
        $movie_genre = Movie_Genre::where('genre_id', $genre_slug->id)->get();
        $many_genre = [];
        foreach ($movie_genre as $key => $movi) {
            $many_genre[] = $movi->movie_id;
        }
        $movie = Movie::withCount('episode')->whereIn('id', $many_genre)->orderBy('NgayCapNhat', 'DESC')->paginate(40);
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
        //lấy 3 tập gần nhất
        $episode = Episode::with('movie')->where('movie_id', $movie->id)->orderBy('episode', 'DESC')->take(3)->get();

        //lấy tập đầu
        $episode_tapdau = Episode::with('movie')->where('movie_id', $movie->id)->orderBy('episode', 'ASC')->take(1)->first();

        //lấy tổng tập phim đã thêm
        $episode_current_list = Episode::with('movie')->where('movie_id', $movie->id)->get();
        $episode_current_list_count = $episode_current_list->count();

        //rating movie
        $rating = Rating::where('movie_id', $movie->id)->avg('rating');
        $rating = round($rating);

        $count_total = Rating::where('movie_id', $movie->id)->count();

        //increase movie views
        $count_views = $movie->count_views;
        $count_views = $count_views + 1;
        $movie->count_views = $count_views;
        $movie->save();

        return view('pages.movie',
            compact('category', 'TheLoai', 'QuocGia', 'movie', 'related', 'movieHot_sidebar',
                'trailer', 'episode', 'episode_tapdau', 'episode_current_list_count', 'rating', 'count_total'));
    }

    public function add_rating(Request $request)
    {
        $data = $request->all();
        $ip_address = $request->ip();

        $rating_count = Rating::where('movie_id', $data['movie_id'])->where('ip_address', $ip_address)->count();
        if ($rating_count > 0) {
            echo 'exist';
        } else {
            $rating = new Rating ();
            $rating->movie_id = $data['movie_id'];
            $rating->rating = $data['index'];
            $rating->ip_address = $ip_address;
            $rating->save();
            echo 'done';
        }
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

        //lấy tập 1 (tap-1) hoặc tập HD (tap-HD)
        if (isset($tap)) {
            $tapphim = $tap;
            $tapphim = substr($tap, 4, 20);
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
        $movie = Movie::with('category', 'genre', 'country', 'movie_genre')->where('status', 1)->first();
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
            $TheLoai = Genre::orderBy('position', 'ASC')->where('status', 1)->get();
            $QuocGia = Country::orderBy('position', 'ASC')->where('status', 1)->get();

            $movie = Movie::withCount('episode')->where('title', 'LIKE', '%' . $search . '%')->orderBy('NgayCapNhat', 'DESC')->paginate(40);
            $movieHot_sidebar = Movie::where('movie_hot', 1)->where('status', 1)->orderBy('NgayCapNhat', 'DESC')->take('10')->get();
            $trailer = Movie::where('resolution', 5)->where('status', 1)->orderBy('NgayCapNhat', 'DESC')->take('10')->get();

            return view('pages.search', compact('category', 'TheLoai', 'QuocGia', 'search', 'movie', 'movieHot_sidebar', 'trailer'));
        } else {
            return redirect()->to('/');
        }
    }

    public function filter()
    {
        //get
        $sapxep = $_GET['order'];
        $genre_get = $_GET['genre'];
        $country_get = $_GET['country'];
        $year_get = $_GET['year'];

        if ($sapxep == '' && $genre_get == '' && $country_get == '' && $year_get == '') {
            return redirect()->back();
        } else {
            $category = Category::orderBy('position', 'ASC')->where('status', 1)->get();
            $TheLoai = Genre::orderBy('position', 'ASC')->where('status', 1)->get();
            $QuocGia = Country::orderBy('position', 'ASC')->where('status', 1)->get();
            $movieHot_sidebar = Movie::withCount('episode')->where('movie_hot', 1)->where('status', 1)->orderBy('NgayCapNhat', 'ASC')->take('30')->get();
            $trailer = Movie::where('resolution', 5)->where('status', 1)->orderBy('NgayCapNhat', 'ASC')->take('10')->get();

            // lấy dữ liệu
            $movie = Movie::withCount('episode');
            if ($genre_get) {
                $movie = $movie->where('genre_id', $genre_get);
            } else if ($country_get) {
                $movie = $movie->where('country_id', $country_get);
            } else if ($year_get) {
                $movie = $movie->where('year', $year_get);
            } else if ($order) {
                $movie = $movie->orderBy('title', 'ASC');
            }
            $movie = $movie->orderBy('NgayCapNhat', 'ASC')->paginate(40);

            return view('pages.filter',
                compact('category', 'TheLoai', 'QuocGia', 'movie', 'movieHot_sidebar', 'trailer'));

        }
    }
}
