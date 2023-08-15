<?php

namespace App\Http\Controllers;

use App\Models\Text_config;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TextConfigsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $textConfigs = Text_config::all();
        return view('textConfigs.index', ['textConfigs' => $textConfigs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('textConfigs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'page_id' => 'required',
            'text_id' => 'required',
            'position' => 'required'
        ]);

        $newTextConfig = Text_config::create([
           'page_id' => $request->page_id,
           'text_id' => $request->text_id,
           'position' => $request->position
        ]);
        if($newTextConfig) {
//            return "create success";
            return redirect('/textConfigs')->with('status', 'create new text config successfully');
        } else {
//            return "create error";
            return redirect('/textConfigs')->with('status', 'create have error');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Text_config $text_config)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $textConfig = Text_config::find($id);
        return view('textConfigs.update', [
            'textConfig' => $textConfig
        ] );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'page_id' => 'required',
            'text_id' => 'required',
            'position' => 'required'
        ]);

        DB::table('text_configs')
            ->where('id', $id)
            ->update([
                'page_id' => $request->page_id,
                'text_id' => $request->text_id,
                'position' => $request->position
            ]);

        return redirect('/textConfigs')->with('status', 'update text config successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $textConfig = Text_config::find($id);
        $textConfig->delete();
        return redirect('/textConfigs')->with('status', 'delete text config successfully');
    }
}
