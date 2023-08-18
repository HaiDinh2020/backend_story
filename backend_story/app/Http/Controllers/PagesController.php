<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Http\Controllers\Controller;
use App\Repositories\Page\PageRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function Symfony\Component\Translation\t;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $pageRepository;
    public function __construct(PageRepositoryInterface $pageRepository)
    {
        $this->pageRepository = $pageRepository;
    }
    public function index()
    {
        $pages = $this->pageRepository->all();
        return view('pages.index', [
            'pages' => $pages
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.create');
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
            return redirect('/pages')->with('status', 'create new page successfully');
        } else {
            return "add new page error";
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Page $page)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $page = $this->pageRepository->findPageById($id);
        return view('pages.update', ['page' => $page]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $rule = [
            'story_id' => 'required|numeric|min:0',
            'background' => 'required|mimes:jpeg,png|mimetypes:image/jpeg,image/png|max:2024',
        ];
        $messenger = [
            'required' => 'trường :attribute bắt buộc phải nhập',
            'mimes' => 'trường :attribute phải là file ảnh',
            'mimetypes' => 'trường :attribute phải là file ảnh',
            'max' => 'trường :attribute phải là file ảnh bé hơn :max kb'
        ];

        $request->validate($rule, $messenger);
        $this->pageRepository->update($request, $id);

        return redirect('/pages')->with('status', 'update page successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $page = $this->pageRepository->findPageById($id);
        $page->delete();
        return redirect('/pages')->with('status', 'delete page successfully');
    }
}
