<?php

namespace App\Repositories\Touch;

use App\Models\Touch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TouchRepository implements TouchRepositoryInterface
{
    public function all() {
        return Touch::all();
    }

    public function findTouchConfigById ($id) {
        return Touch::find($id);
    }


    public function create(Request $request) {
        $newTouch = Touch::create([
            'page_id' => $request->page_id,
            'data' => $request->data,
            'text_id' => $request->text_id
        ]);

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
        return $touch;
    }

}

