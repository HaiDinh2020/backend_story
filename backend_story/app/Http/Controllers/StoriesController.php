<?php

namespace App\Http\Controllers;

use App\Models\Story;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stories = Story::all();
        return view("stories.index", [
            'stories' => $stories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("stories.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
//        dd("this is store");
        $request->validate([
           'name' => 'required',
            // thumbnail validate
            'author' => 'required'
        ]);

        $thumbnail = $request->file('storyThumbnail')->getClientOriginalName();
        $path = $request->file('storyThumbnail')->storeAs('public/thumbnails', $thumbnail);

        $newStory = Story::create([
            'name' => $request->name,
            'thumbnail' => $thumbnail,
            'author' => $request->author
        ]);
        if($newStory) {
            return redirect('/stories');
        } else {
            return "add not success";
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Story $story)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $story = Story::find($id);
        return view('stories.update', ['story' => $story]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $thumbnail = $request->file('storyThumbnail')->getClientOriginalName();
        $path = $request->file('storyThumbnail')->storeAs('public/thumbnails', $thumbnail);


        DB::table('stories')
            ->where('id', $request->id)
            ->update([
                'name' => $request->name,
                'thumbnail' => $thumbnail,
                'author' => $request->author
            ]);

        return redirect('/stories')->with('status', 'update successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $story = Story::find($id);
        $story->delete();
        return redirect('/stories')->with('status', 'delete successfully');
    }
}
