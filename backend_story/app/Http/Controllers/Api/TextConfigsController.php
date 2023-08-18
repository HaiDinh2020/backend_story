<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\TextConfig\TextConfigRepositoryInterface;
use Illuminate\Http\Request;

class TextConfigsController extends Controller
{
    private $textConfigRepository;
    public function __construct(TextConfigRepositoryInterface $textConfigRepository)
    {
        $this->textConfigRepository = $textConfigRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $textConfigs = $this->textConfigRepository->all();
        return $textConfigs;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rule = [
            'page_id' => 'required|numeric|min:0',
            'text_id' => 'required|numeric|min:0',
            'position' => 'required'
        ];
        $messenger = [
            'required' => 'trường :attribute bắt buộc phải nhập',
            'numeric' => 'trường :attribute phải là số',
            'min' => 'trường :attribute bắt buộc phải lớn hơn :min '
        ];

        $request->validate($rule, $messenger);

        $newTextConfig = $this->textConfigRepository->create($request);
        if($newTextConfig) {
            return 'create new text config successfully';
        } else {
            return 'create have error';
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rule = [
            'page_id' => 'required|numeric|min:0',
            'text_id' => 'required|numeric|min:0',
            'position' => 'required'
        ];
        $messenger = [
            'required' => 'trường :attribute bắt buộc phải nhập',
            'numeric' => 'trường :attribute phải là số',
            'min' => 'trường :attribute bắt buộc phải lớn hơn :min '
        ];

        $request->validate($rule, $messenger);

        $this->textConfigRepository->update($request, $id);

        return 'update text config successfully';
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $textConfig = $this->textConfigRepository->findTextConfigById($id);
        $textConfig->delete();
        return 'delete text config successfully';
    }
}
