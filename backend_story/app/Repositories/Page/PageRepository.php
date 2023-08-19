<?php

namespace App\Repositories\Page;

use App\Exceptions\GeneralJsonException;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageRepository implements PageRepositoryInterface
{
    public function all() {
        $pages = Page::all();
        throw_if(!$pages, GeneralJsonException::class, 'Failed to get all page', 442);
        return $pages;
    }

    public function findPageById ($id) {
        $page = Page::find($id);
        throw_if(!$page, GeneralJsonException::class, 'Failed to get page', 442);
        return $page;
    }

    public function create(Request $request)
    {
        $background = $request->file('background')->getClientOriginalName();
        $path = $request->file('background')->storeAs('public/backgrounds', $background);

        $newPage = Page::create([
            'story_id' => (int)$request->story_id,
            'background' => $background
        ]);
        throw_if(!$newPage, GeneralJsonException::class, 'Failed to create new page', 442);
        return $newPage;
    }

    public function update(Request $request, $id)
    {
        $background = $request->file('background')->getClientOriginalName();
        $path = $request->file('background')->storeAs('public/backgrounds', $background);


        $page_update = DB::table('pages')
            ->where('id', $id)
            ->update([
                'story_id' => $request->story_id,
                'background' => $background,
            ]);

        throw_if(!$page_update, GeneralJsonException::class, 'Failed to update this page', 442);
        return $page_update;
    }

}
