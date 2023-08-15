<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\Page\PageRepositoryInterface;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    private $pageRepository;
    public function __construct(PageRepositoryInterface $pageRepository)
    {
        $this->pageRepository = $pageRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pages = $this->pageRepository->all();
        return  $pages;
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'story_id' => 'required',
            'background' => 'required'
        ]);

        $newPage = $this->pageRepository->create($request);

        if($newPage) {
            return 'create new page successfully';
        } else {
            return "add new page error";
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->pageRepository->update($request, $id);

        return 'update page successfully';
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $page = $this->pageRepository->findPageById($id);
        $page->delete();
        return 'delete page successfully';
    }
}
