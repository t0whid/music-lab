<?php

namespace App\Http\Controllers\Admin;

use getID3;
use App\Models\Song;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;


class SongController extends Controller
{
    public function index()
    {
        $songs = Song::all(); // You can modify this query as needed (e.g., pagination)
        return view('admin.songs.index', compact('songs'));
    }
    public function create()
    {
        $categories = Category::all();
        return view('admin.songs.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validator = $request->validate([
            'title' => 'required',
            'artist' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'description' => 'nullable',
            'song' => 'required|mimes:mp3', // Assuming audio files are in MP3 format
            'category_id' => 'required',
        ]);

        // Calculate the duration
        $getID3 = new getID3;
        $audioFile = $getID3->analyze($request->file('song'));
        $duration = gmdate("H:i:s", $audioFile['playtime_seconds']);

        // Save the song
        $song = new Song;
        $song->title = $request->input('title');
        $song->artist = $request->input('artist');
        $song->description = $request->input('description');
        $song->file_path = $request->file('song')->store('songs', 'public');
        $song->duration = $duration;
        $song->category_id = $request->input('category_id');

        // Handle optional image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('song_images', 'public');

            $song->image = $imagePath;
        }

        $song->save();

        return redirect()->route('admin.songs.index')->with('success', 'Song uploaded successfully.');
    }

    public function edit(Song $song)
    {
        $categories = Category::all();
        return view('admin.songs.edit', compact('song', 'categories'));
    }

    public function update(Request $request, Song $song)
    {
        $validator = $request->validate([
            'title' => 'required',
            'artist' => 'required',
            'description' => 'nullable',
            'category_id' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'song' => 'nullable|mimes:mp3',
        ]);

        $song->title = $request->input('title');
        $song->artist = $request->input('artist');
        $song->description = $request->input('description');
        $song->category_id = $request->input('category_id');

        if ($request->hasFile('image')) {
            if ($song->image) {
                Storage::disk('public')->delete($song->image);
            }

            $imagePath = $request->file('image')->store('song_images', 'public');
            $song->image = $imagePath;
        }

        if ($request->hasFile('song')) {
            if ($song->file_path) {
                Storage::disk('public')->delete($song->file_path);
            }

            $songPath = $request->file('song')->store('songs', 'public');
            $song->file_path = $songPath;
        }

        $song->save();

        return redirect()->route('admin.songs.index')->with('success', 'Song updated successfully.');
    }


    public function destroy(Song $song)
    {
        if ($song->image) {
            Storage::disk('public')->delete($song->image);
        }
        if ($song->file_path) {
            Storage::disk('public')->delete($song->file_path);
        }

        $song->delete();

        return redirect()->route('admin.songs.index')->with('success', 'Song deleted successfully.');
    }
}
