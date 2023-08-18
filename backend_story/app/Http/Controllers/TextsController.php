<?php

namespace App\Http\Controllers;

use App\Models\Text;
use App\Http\Controllers\Controller;
use App\Repositories\Text\TextRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function Symfony\Component\Translation\t;

class TextsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $textRepository;
    public function __construct(TextRepositoryInterface $textRepository)
    {
        $this->textRepository = $textRepository;
    }

    public function index()
    {
        $texts = $this->textRepository->all();
        return view('texts.index', [
            'texts' => $texts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('texts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rule = [
            'text' => 'required'
        ];
        $messenger = [
            'required' => 'trường :attribute bắt buộc phải nhập'
        ];

        $request->validate($rule, $messenger);

        $text = $this->textRepository->create($request);

        if ($text) {
            return redirect('/texts')->with('status', 'create new text successfully');
        } else {
            dd("not create");
//            return redirect('/texts')->with('status', 'create new text have error');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Text $text)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $text = $this->textRepository->findTextById($id);
        return view('texts.update', [
            'text' => $text
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $rule = [
            'text' => 'required'
        ];
        $messenger = [
            'required' => 'trường :attribute bắt buộc phải nhập'
        ];

        $request->validate($rule, $messenger);

        $this->textRepository->update($request, $id);

        return redirect('/texts')->with('status', 'update text successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $text = $this->textRepository->findTextById($id);
        $text->delete();
        return redirect('/texts')->with('status', 'delete text successfully');
    }
}
