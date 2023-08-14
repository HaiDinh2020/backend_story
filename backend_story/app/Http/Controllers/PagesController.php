<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pages = Page::all();
        return view('pages.index', [
            'pages' => $pages
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

        $background = $request->file('background')->getClientOriginalName();
        $path = $request->file('background')->storeAs('public/backgrounds', $background);
//        dd(gettype((int)$request->story_id));
        $newPage = Page::create([
            'story_id' => (int)$request->story_id,
            'background' => $background
        ]);

        if($newPage) {
            return redirect('/pages')->with('status', 'create new page successfully');
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
    public function edit($id)
    {
        $page = Page::find($id);
        return view('pages.update', ['page' => $page]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $background = $request->file('background')->getClientOriginalName();
        $path = $request->file('background')->storeAs('public/backgrounds', $background);


        DB::table('pages')
            ->where('id', $id)
            ->update([
                'story_id' => $request->story_id,
                'background' => $background,
            ]);

        return redirect('/pages')->with('status', 'update page successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $page = Page::find($id);
        $page->delete();
        return redirect('/pages')->with('status', 'delete page successfully');
    }
}
