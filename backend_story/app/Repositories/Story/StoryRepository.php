<?php

namespace App\Repositories\Story;

use App\Exceptions\GeneralJsonException;
use App\Models\Story;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StoryRepository implements StoryRepositoryInterface
{
    public function all() {
        $stories = Story::all();
        throw_if(!$stories, GeneralJsonException::class, 'Failed to get all stories', 442);
        return $stories;
    }

    public function findStoryById ($id) {
        $story = Story::find($id);
        throw_if(!$story, GeneralJsonException::class, 'Failed to get story', 442);
        return $story;
    }

    public function create(Request $request)
    {
        $thumbnail = $request->file('thumbnail')->getClientOriginalName();
        $path = $request->file('thumbnail')->storeAs('public/thumbnails', $thumbnail);

        $newStory = Story::create([
            'name' => $request->name,
            'thumbnail' => $thumbnail,
            'author' => $request->author
        ]);
        throw_if(!$newStory, GeneralJsonException::class, 'Failed to create new story',442);
        return $newStory;
    }

    public function update(Request $request, $id)
    {
        $thumbnail = $request->file('thumbnail')->getClientOriginalName();
        $path = $request->file('thumbnail')->storeAs('public/thumbnails', $thumbnail);


        $story_update = DB::table('stories')
            ->where('id', $id)
            ->update([
                'name' => $request->name,
                'thumbnail' => $thumbnail,
                'author' => $request->author
            ]);
        throw_if(!$story_update, GeneralJsonException::class, 'Failed to update story',442);
        return $story_update;
    }

    public function getAllDataOFStoryId() {
        $allData = Story::with(['hasPage', 'hasPage.hasTouch', 'hasPage.hasTouch.belongText', 'hasPage.hasTouch.belongText.hasAudio', 'hasPage.hasText_config','hasPage.hasText_config.belongText','hasPage.hasText_config.belongText.hasAudio'])->get();
        return $allData;
    }

}
