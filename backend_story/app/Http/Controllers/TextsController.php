<?php

namespace App\Http\Controllers;

use App\Models\Text;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TextsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $texts = Text::all();
        return $texts;
//        return view('texts.index', [
//            'texts' => $texts
//        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('texts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
           'text' => 'required'
        ]);

        $text = Text::create([
            'text' => $request->text
        ]);
//        return response()->json('add success');
        if ($text) {
            return redirect('/texts')->with('status', 'create new text successfully');
        } else {
            return redirect('/texts')->with('status', 'create new text have error');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Text $text)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $text = Text::find($id);
        return view('texts.update', [
            'text' => $text
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'text' => 'required'
        ]);

        DB::table('texts')
            ->where('id', $id)
            ->update([
                'text' => $request->text
            ]);

        return redirect('/texts')->with('status', 'update text successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $text = Text::find($id);
        $text->delete();
        return redirect('/texts')->with('status', 'delete text successfully');
    }
}
