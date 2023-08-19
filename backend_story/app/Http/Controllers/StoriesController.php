<?php

namespace App\Http\Controllers;

use App\Models\Story;
use App\Http\Controllers\Controller;
use App\Repositories\Story\StoryRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        return view("stories.index", [
            'stories' => $stories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("stories.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rule = [
            'name' => 'required',
            'thumbnail' => 'required|mimes:jpeg,png|mimetypes:image/jpeg,image/png|max:2024',
            'author' => 'required'
        ];
        $messenger = [
            'required' => 'trường :attribute bắt buộc phải nhập',
            'mimes' => 'trường :attribute phải là file ảnh',
            'mimetypes' => 'trường :attribute phải là file ảnh',
            'max' => 'trường :attribute phải là file ảnh bé hơn :max kb'
        ];

        $request->validate($rule, $messenger);

        $newStory = $this->storyRepository->create($request);
        if($newStory) {
            return redirect('/stories');
        } else {
            return "add not success";
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Story $story)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $story = $this->storyRepository->findStoryById($id);
        return view('stories.update', ['story' => $story]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $rule = [
            'name' => 'required',
            'thumbnail' => 'required|mimes:jpeg,png|mimetypes:image/jpeg,image/png|max:2024',
            'author' => 'required'
        ];
        $messenger = [
            'required' => 'trường :attribute bắt buộc phải nhập',
            'mimes' => 'trường :attribute phải là file ảnh',
            'mimetypes' => 'trường :attribute phải là file ảnh',
            'max' => 'trường :attribute phải là file ảnh bé hơn :max kb'
        ];

        $request->validate($rule, $messenger);
        $this->storyRepository->update($request, $id);
        return redirect('/stories')->with('status', 'update successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $story = $this->storyRepository->findStoryById($id);
        $story->delete();
        return redirect('/stories')->with('status', 'delete successfully');
    }
}
