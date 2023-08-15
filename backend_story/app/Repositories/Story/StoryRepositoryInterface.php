<?php

namespace App\Repositories\Story;

use App\Models\Story;

class StoryRepository
{
    public function all() {
        return Story::all();
    }

    public function findStoryById ($id) {
        return Story::find($id);
    }


}
