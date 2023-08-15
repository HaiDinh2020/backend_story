<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\Text\TextRepositoryInterface;
use Illuminate\Http\Request;

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
        return $texts;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'text' => 'required'
        ]);

        $text = $this->textRepository->create($request);
        if ($text) {
            return 'create new text successfully';
        } else {
            return 'create new text have error';
        }
    }

    public function edit(Request $request) {
        return $request;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'text' => 'required'
        ]);

        $this->textRepository->update($request, $request->id);

        return 'update text successfully';
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $text = $this->textRepository->findTextById($id);
        $text->delete();
        return 'delete successfully';
    }
}
