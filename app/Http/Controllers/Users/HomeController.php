<?php

namespace App\Http\Controllers\Users;

use App\Models\Song;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return view('users.index');
    }
    public function adminIndex()
    {
        return view('admin.index');
    }
    public function guestsIndex()
    {
        $popularSongs = Song::orderBy('view_count', 'desc')->limit(6)->get();
        $newSongs = Song::orderBy('created_at', 'desc')->limit(6)->get();
        $featuredSongs = Song::inRandomOrder()->limit(6)->get();

        return view('guests.index', [
            'popularSongs' => $popularSongs,
            'newSongs' => $newSongs,
            'featuredSongs' => $featuredSongs,
        ]);
    }
}
