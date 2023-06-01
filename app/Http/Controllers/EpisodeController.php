<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Episode;
use Carbon\Carbon;

class EpisodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list_episode = Episode::with('movie')->orderBy('movie_id', 'ASC')->get();
        return view('admincp.episode.index', compact('list_episode'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $list_movie = Movie::orderBy('id', 'DESC')->pluck('title', 'id');
        return view('admincp.episode.form', compact('list_movie'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $ep = new Episode();
        $ep->movie_id = $data['movie_id'];
        $ep->linkphim = $data['link'];
        $ep->episode = $data['episode'];
        $ep->created_at = Carbon::now('Asia/Ho_Chi_Minh');
        $ep->updated_at = Carbon::now('Asia/Ho_Chi_Minh');
        $ep->save();
        return redirect()->to('episode');
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
        $list_movie = Movie::orderBy('id', 'DESC')->pluck('title', 'id');
        $episode = Episode::find($id);
        return view('admincp.episode.form', compact('episode', 'list_movie'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();
        $ep = Episode::find($id);
        $ep->movie_id = $data['movie_id'];
        $ep->linkphim = $data['link'];
        $ep->episode = $data['episode'];
        $ep->created_at = Carbon::now('Asia/Ho_Chi_Minh');
        $ep->updated_at = Carbon::now('Asia/Ho_Chi_Minh');
        $ep->save();
        return redirect()->to('episode');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $episode = Episode::find($id)->delete();
        return redirect()->to('episode');
    }

    public function select_movie()
    {
        $id = $_GET['id'];
        $movie = Movie::find($id);
        $output = '<option>Chọn Tập Phim</option>';

        if ($movie->ThuocPhim == 'phimbo') {
            for ($i = 1; $i <= $movie->SoTap; $i++) {
                $output .= '<option value = "' . $i . '" > ' . $i . '</option >';
            }
        } else {
            $output .= '<option value = "HD" >HD</option >
                        <option value = "FullHD" >FullHD</option >';
        }

        echo $output;
    }
}
