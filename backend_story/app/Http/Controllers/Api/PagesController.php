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
        $rule = [
            'story_id' => 'required|numeric|min:0',
            'background' => 'required|mimes:jpeg,png|mimetypes:image/jpeg,image/png|max:2024',
        ];
        $messenger = [
            'required' => 'trường :attribute bắt buộc phải nhập',
            'mimes' => 'trường :attribute phải là file ảnh',
            'mimetypes' => 'trường :attribute phải là file ảnh',
            'max' => 'trường :attribute phải là file ảnh bé hơn :max kb',
            'numeric' => 'trường :attribute phải là số',
            'min' => 'trường :attribute bắt buộc phải lớn hơn :min '
        ];

        $request->validate($rule, $messenger);

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
        $rule = [
            'story_id' => 'required|numeric|min:0',
            'background' => 'required|mimes:jpeg,png|mimetypes:image/jpeg,image/png|max:2024',
        ];
        $messenger = [
            'required' => 'trường :attribute bắt buộc phải nhập',
            'mimes' => 'trường :attribute phải là file ảnh',
            'mimetypes' => 'trường :attribute phải là file ảnh',
            'max' => 'trường :attribute phải là file ảnh bé hơn :max kb',
            'numeric' => 'trường :attribute phải là số',
            'min' => 'trường :attribute bắt buộc phải lớn hơn :min '
        ];

        $request->validate($rule, $messenger);
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
