<?php

namespace App\Http\Controllers;

use App\Models\Text_config;
use App\Http\Controllers\Controller;
use App\Repositories\TextConfig\TextConfigRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TextConfigsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $textConfigRepository;
    public function __construct(TextConfigRepositoryInterface $textConfigRepository)
    {
        $this->textConfigRepository = $textConfigRepository;
    }

    public function index()
    {
        $textConfigs = $this->textConfigRepository->all();
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

        $newTextConfig = $this->textConfigRepository->create($request);
        if($newTextConfig) {
            return redirect('/textConfigs')->with('status', 'create new text config successfully');
        } else {
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
        $textConfig = $this->textConfigRepository->findTextConfigById($id);
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

        $this->textConfigRepository->update($request, $id);

        return redirect('/textConfigs')->with('status', 'update text config successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $textConfig = $this->textConfigRepository->findTextConfigById($id);
        $textConfig->delete();
        return redirect('/textConfigs')->with('status', 'delete text config successfully');
    }
}
