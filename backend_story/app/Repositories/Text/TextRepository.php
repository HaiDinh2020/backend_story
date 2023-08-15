<?php

namespace App\Repositories\Text;

use App\Models\Text;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TextRepository implements TextRepositoryInterface
{
    public function all() {
        return Text::all();
    }

    public function findTextById ($id) {
        return Text::find($id);
    }

    public function create(Request $request)
    {
        $text = Text::create([
            'text' => $request->text
        ]);
        return $text;
    }

    public function update(Request $request, $id)
    {
        DB::table('texts')
            ->where('id', $id)
            ->update([
                'text' => $request->text
            ]);

    }

}
