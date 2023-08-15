<?php

namespace App\Repositories\Story;
use Illuminate\Http\Request;


interface StoryRepositoryInterface
{
    public function all() ;

    public function findStoryById ($id);

    public function create(Request $request);

    public function update(Request $request);
}
