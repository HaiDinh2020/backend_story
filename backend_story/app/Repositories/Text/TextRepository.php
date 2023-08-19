<?php

namespace App\Repositories\Text;

use App\Exceptions\GeneralJsonException;
use App\Models\Text;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TextRepository implements TextRepositoryInterface
{
    public function all() {
        $texts = Text::all();
        throw_if(!$texts, GeneralJsonException::class, 'Failed to get all text', 442);
        return $texts;
    }

    public function findTextById ($id) {
        $text = Text::find($id);
        throw_if(!$text, GeneralJsonException::class, 'Failed to get text', 442);
        return $text;
    }

    public function create(Request $request)
    {
        $newText = Text::create([
            'text' => $request->text
        ]);
        throw_if(!$newText, GeneralJsonException::class, 'Failed to create new text', 442);
        return $newText;
    }

    public function update(Request $request, $id)
    {
        $text_update = DB::table('texts')
            ->where('id', $id)
            ->update([
                'text' => $request->text
            ]);
        throw_if(!$text_update, GeneralJsonException::class, 'Failed to update this text', 442);
        return $text_update;
    }

}
