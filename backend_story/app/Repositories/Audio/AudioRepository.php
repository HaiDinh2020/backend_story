<?php

namespace App\Repositories\Audio;

use App\Models\Audio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AudioRepository implements AudioRepositoryInterface
{
    public function all() {
        return Audio::all();
    }

    public function findAudioById($id) {
        return Audio::find($id);
    }

    public function create(Request $request) {
        $audio = $request->file('audio')->getClientOriginalName();
        $path = $request->file('audio')->storeAs('public/audios', $audio);

        $newAudio = Audio::create([
            'audio' => $audio,
            'text_id' => $request->text_id
        ]);
        return $newAudio;
    }

    public function update(Request $request, $id) {
        $audio = $request->file('audio')->getClientOriginalName();
        $path = $request->file('audio')->storeAs('public/audios', $audio);

        DB::table('audio')
            ->where('id', $id)
            ->update([
                'audio' => $audio,
                'text_id' => $request->text_id
            ]);
    }
}
