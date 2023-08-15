<?php

namespace App\Repositories\TextConfig;

use App\Models\Text_config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TextConfigRepository implements TextConfigRepositoryInterface
{
    public function all() {
        return Text_config::all();
    }

    public function findTextConfigById ($id) {
        return Text_config::find($id);
    }

    public function create(Request $request)
    {
        $newTextConfig = Text_config::create([
            'page_id' => $request->page_id,
            'text_id' => $request->text_id,
            'position' => $request->position
        ]);

        return $newTextConfig;
    }

    public function update(Request $request, $id)
    {
        DB::table('text_configs')
            ->where('id', $id)
            ->update([
                'page_id' => $request->page_id,
                'text_id' => $request->text_id,
                'position' => $request->position
            ]);


    }

}
