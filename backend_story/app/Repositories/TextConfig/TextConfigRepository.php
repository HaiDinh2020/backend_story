<?php

namespace App\Repositories\TextConfig;

use App\Exceptions\GeneralJsonException;
use App\Models\Text_config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TextConfigRepository implements TextConfigRepositoryInterface
{
    public function all() {
        $text_configs = Text_config::all();
        throw_if(!$text_configs, GeneralJsonException::class, 'Failed to get all text_config', 442);
        return $text_configs;
    }

    public function findTextConfigById ($id) {
        $text_config = Text_config::find($id);
        throw_if(!$text_config, GeneralJsonException::class, 'Failed to get text_config', 442);
        return $text_config;
    }

    public function create(Request $request)
    {
        $newTextConfig = Text_config::create([
            'page_id' => $request->page_id,
            'text_id' => $request->text_id,
            'position' => $request->position
        ]);
        throw_if(!$newTextConfig, GeneralJsonException::class, 'Failed to create new text_config', 442);
        return $newTextConfig;
    }

    public function update(Request $request, $id)
    {
        $text_config_update = DB::table('text_configs')
            ->where('id', $id)
            ->update([
                'page_id' => $request->page_id,
                'text_id' => $request->text_id,
                'position' => $request->position
            ]);
        throw_if(!$text_config_update, GeneralJsonException::class, 'Failed to update this text_config', 442);
        return $text_config_update;
    }
}
