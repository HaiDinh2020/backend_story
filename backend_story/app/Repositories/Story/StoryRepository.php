<?php

namespace App\Repositories\Story;

use App\Models\Story;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StoryRepository implements StoryRepositoryInterface
{
    public function all() {

        return Story::all();
    }

    public function findStoryById ($id) {
        return Story::find($id);
    }

    public function create(Request $request)
    {
        $thumbnail = $request->file('storyThumbnail')->getClientOriginalName();
        $path = $request->file('storyThumbnail')->storeAs('public/thumbnails', $thumbnail);

        $newStory = Story::create([
            'name' => $request->name,
            'thumbnail' => $thumbnail,
            'author' => $request->author
        ]);
        return $newStory;
    }

    public function update(Request $request, $id)
    {
        $thumbnail = $request->file('storyThumbnail')->getClientOriginalName();
        $path = $request->file('storyThumbnail')->storeAs('public/thumbnails', $thumbnail);


        DB::table('stories')
            ->where('id', $id)
            ->update([
                'name' => $request->name,
                'thumbnail' => $thumbnail,
                'author' => $request->author
            ]);

    }

}
