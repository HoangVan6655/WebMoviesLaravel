<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Country;
use App\Models\Genre;
use App\Models\Movie;
use App\Models\Movie_Genre;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // danh sách quốc gia
        $listCountry = Country::orderBy('position', 'ASC')->get();
        $countMoviesByCountry = [];
        foreach ($listCountry as $country) {
            $count = Movie::whereHas('country', function ($query) use ($country) {
                $query->where('id', $country->id);
            })->count();

            $countMoviesByCountry[$country->id] = $count;
        }

        // danh sách danh mục
        $listCategory = Category::orderBy('position', 'ASC')->get();
        $countMoviesByCategory = [];
        foreach ($listCategory as $cate) {
            $count = Movie::whereHas('category', function ($query) use ($cate) {
                $query->where('id', $cate->id);
            })->count();

            $countMoviesByCategory[$cate->id] = $count;
        }

        // danh sách thể loại
        $listGenre = Genre::orderBy('position', 'ASC')->get();
        $countMoviesByGenre = [];
        foreach ($listGenre as $genre) {
            $count = Movie_Genre::where('genre_id', $genre->id)->count();

            $countMoviesByGenre[$genre->id] = $count;
        }

        // đếm tổng
        $countryCount = Country::all()->count();
        $categoryCount = Category::all()->count();
        $genreCount = Genre::all()->count();
        $movieCount = Movie::all()->count();

        return view('dashboard', compact('listCountry', 'countryCount', 'categoryCount', 'genreCount', 'movieCount', 'listCategory', 'listGenre', 'countMoviesByCountry', 'countMoviesByCategory', 'countMoviesByGenre'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
