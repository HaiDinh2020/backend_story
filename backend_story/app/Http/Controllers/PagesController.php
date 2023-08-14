<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sound = storage_path("storage/Don't forget to add some cheese!.mp3");
        $file = basename($sound, ".mp3");
        $words = explode(' ', $file);
        return view('pages.index', [
            'file' => $file,
            'words' => $words
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'story_id' => 'required',
            'background' => 'required'
        ]);
//        dd(gettype((int)$request->story_id));
        $newPage = Page::create([
            'story_id' => (int)$request->story_id,
            'background' => $request->background
        ]);

        if($newPage) {
            return redirect('/pages');
        } else {
            return "add new page error";
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Page $page)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Page $page)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Page $page)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Page $page)
    {
        //
    }
}
