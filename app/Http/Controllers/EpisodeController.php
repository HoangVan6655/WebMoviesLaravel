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
        $list_episode = Episode::with('movie')->orderBy('episode', 'ASC')->get();
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
        $episode_check = Episode::where('episode', $data['episode'])->where('movie_id', $data['movie_id'])->count();
        if ($episode_check > 0) {
            return redirect()->back();
        } else {
            $ep = new Episode();
            $ep->movie_id = $data['movie_id'];
            $ep->linkphim = $data['link'];
            $ep->episode = $data['episode'];
            $ep->created_at = Carbon::now('Asia/Ho_Chi_Minh');
            $ep->updated_at = Carbon::now('Asia/Ho_Chi_Minh');
            $ep->save();
        }
        toastr()->success('Thêm Mới Tập Phim Thành Công!', 'Thông Báo', ['timeOut' => 5000]);
        return redirect()->route('episode.index');
    }

    public function add_episode($id)
    {
        $movie = Movie::find($id);
        $list_episode = Episode::with('movie')->where('movie_id', $id)->orderBy('episode', 'DESC')->get();
        return view('admincp.episode.add_episode', compact('list_episode', 'movie'));
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
        toastr()->success('Cập Nhật Tập Phim Thành Công!', 'Thông Báo', ['timeOut' => 5000]);
        return redirect()->route('episode.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $episode = Episode::find($id)->delete();
        toastr()->success('Xoá Tập Phim Thành Công!', 'Thông Báo', ['timeOut' => 5000]);
        return redirect()->route('episode.index');
    }

    public function select_movie()
    {
        $id = $_GET['id'];
        $movie = Movie::find($id);
        $output = '<option value = "" >Chọn Tập Phim</option>';
//        $output = '';

        if ($movie->ThuocPhim == 'phimbo') {
            for ($i = 1; $i <= $movie->SoTap; $i++) {
                $output .= '<option value = "' . $i . '" > ' . $i . '</option >';
            }
        } else {
            $output .= '<option value = "HD" >HD</option >
                        <option value = "FullHD" >FullHD</option >
                        <option value = "Cam" >Cam</option >
                        <option value = "HDCam" >HDCam</option >';
        }
        echo $output;
    }
}
