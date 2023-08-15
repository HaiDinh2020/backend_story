<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\Story\StoryRepositoryInterface;
use Illuminate\Http\Request;

class StoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $storyRepository;
    public function __construct(StoryRepositoryInterface $storyRepository)
    {
        $this->storyRepository = $storyRepository;
    }

    public function index()
    {
        $stories = $this->storyRepository->all();
        return  $stories;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            // thumbnail validate
            'author' => 'required'
        ]);

        $newStory = $this->storyRepository->create($request);
        if($newStory) {
            return 'create story success';
        } else {
            return "add not success";
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->storyRepository->update($request, $id);
        return 'update story successfully';
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $story = $this->storyRepository->findStoryById($id);
        $story->delete();
        return 'delete story successfully';
    }
}
