<?php

namespace App\Http\Controllers;

use App\Models\Audio;
use App\Http\Controllers\Controller;
use App\Repositories\Audio\AudioRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AudiosController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    private $audioRepository;
    public function __construct(AudioRepositoryInterface $audioRepository)
    {
        $this->audioRepository = $audioRepository;
    }

    public function index()
    {
        $audios = $this->audioRepository->all();
        return view('audios.index',[
            'audios' => $audios
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('audios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'audio' => 'required',
            'text_id' => 'required'
        ]);

        $newAudio = $this->audioRepository->create($request);

        if($newAudio) {
            return redirect('/audios')->with('status', 'create new audio successfully');
        } else {
            return redirect('/audios')->with('status', 'create new audio have error');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Audio $audio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $audio =  $this->audioRepository->findAudioById($id);
        return view('audios.update', [
            'audio' => $audio
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'audio' => 'required',
            'text_id' => 'required'
        ]);

        $this->audioRepository->update($request, $id);
        return redirect('/audios')->with('status', 'update audio successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $audio = $this->audioRepository->findAudioById($id);
        $audio->delete();
        return redirect('/audios')->with('status', 'delete audio successfully');
    }
}
