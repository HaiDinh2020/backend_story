<?php

namespace App\Http\Controllers;

use App\Models\Text_config;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TextConfigsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('textConfigs.index');
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
    public function show(Text_config $text_config)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Text_config $text_config)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Text_config $text_config)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Text_config $text_config)
    {
        //
    }
}
