<?php

namespace App\Repositories\Page;

use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageRepository implements PageRepositoryInterface
{
    public function all() {
        return Page::all();
    }

    public function findPageById ($id) {
        return Page::find($id);
    }

    public function create(Request $request)
    {
        $background = $request->file('background')->getClientOriginalName();
        $path = $request->file('background')->storeAs('public/backgrounds', $background);

        $newPage = Page::create([
            'story_id' => (int)$request->story_id,
            'background' => $background
        ]);
        return $newPage;
    }

    public function update(Request $request, $id)
    {
        $background = $request->file('background')->getClientOriginalName();
        $path = $request->file('background')->storeAs('public/backgrounds', $background);


        DB::table('pages')
            ->where('id', $id)
            ->update([
                'story_id' => $request->story_id,
                'background' => $background,
            ]);

    }

}
