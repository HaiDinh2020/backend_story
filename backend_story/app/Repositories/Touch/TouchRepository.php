<?php

namespace App\Repositories\Touch;

use App\Models\Touch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TouchRepository implements TouchRepositoryInterface
{
    public function all() {
        $touches = Touch::all();
        throw_if(!$touches, GeneralJsonException::class, 'Failed to get all touch', 442);
        return $touches;
    }

    public function findTouchConfigById ($id) {
        $touch = Touch::find($id);
        throw_if(!$touch, GeneralJsonException::class, 'Failed to get touch', 442);
        return $touch;
    }


    public function create(Request $request) {
        $newTouch = Touch::create([
            'page_id' => $request->page_id,
            'data' => $request->data,
            'text_id' => $request->text_id
        ]);
        throw_if(!$newTouch, GeneralJsonException::class, 'Failed to create new touch', 442);
        return $newTouch;
    }

    public function update(Request $request, $id){
        $touch = DB::table('touches')
            ->where('id', $id)
            ->update([
                'page_id' => $request->page_id,
                'data' => $request->data,
                'text_id' => $request->text_id
            ]);
        throw_if(!$touch, GeneralJsonException::class, 'Failed to update this touch', 442);
        return $touch;
    }

}

