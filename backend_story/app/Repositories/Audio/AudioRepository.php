<?php

namespace App\Repositories\Audio;

use App\Exceptions\GeneralJsonException;
use App\Models\Audio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AudioRepository implements AudioRepositoryInterface
{
    public function all() {
        $auido = Audio::all();
        throw_if(!$auido, GeneralJsonException::class, 'Failed to get all audio', 442);
        return $auido;
    }

    public function findAudioById($id) {
        $audio = Audio::find($id);
        throw_if(!$audio, GeneralJsonException::class, 'Failed to get audio'. 442);
        return $audio;
    }

    public function create(Request $request) {
        $audio = $request->file('audio')->getClientOriginalName();
        $path = $request->file('audio')->storeAs('public/audios', $audio);

        $newAudio = Audio::create([
            'audio' => $audio,
            'text_id' => $request->text_id
        ]);
        throw_if(!$newAudio, GeneralJsonException::class, 'Failed to create new audio', 442);
        return $newAudio;
    }

    public function update(Request $request, $id) {
        $audio = $request->file('audio')->getClientOriginalName();
        $path = $request->file('audio')->storeAs('public/audios', $audio);

        $audio_update = DB::table('audio')
            ->where('id', $id)
            ->update([
                'audio' => $audio,
                'text_id' => $request->text_id
            ]);
        throw_if(!$audio_update, GeneralJsonException::class, 'Failed to update this audio');
        return $audio_update;
    }
}
