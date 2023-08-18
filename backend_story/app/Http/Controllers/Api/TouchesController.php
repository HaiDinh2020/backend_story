<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\Touch\TouchRepositoryInterface;
use Illuminate\Http\Request;

class TouchesController extends Controller
{
    private $touchRepository;
    public function __construct(TouchRepositoryInterface $touchRepository)
    {
        $this->touchRepository = $touchRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $touches = $this->touchRepository->all();
        return $touches;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rule = [
            'page_id' => 'required|numeric|min:0',
            'data' => 'required',
            'text_id' => 'required|numeric|min:0'
        ];
        $messenger = [
            'required' => 'trường :attribute bắt buộc phải nhập',
            'numeric' => 'trường :attribute phải là số',
            'min' => 'trường :attribute bắt buộc phải lớn hơn :min '
        ];

        $request->validate($rule, $messenger);
        $newTouch = $this->touchRepository->create($request);
        if ($newTouch) {
            return 'create new touch successfully';
        } else {
            return 'create new touch have error';
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rule = [
            'page_id' => 'required|numeric|min:0',
            'data' => 'required',
            'text_id' => 'required|numeric|min:0'
        ];
        $messenger = [
            'required' => 'trường :attribute bắt buộc phải nhập',
            'numeric' => 'trường :attribute phải là số',
            'min' => 'trường :attribute bắt buộc phải lớn hơn :min '
        ];

        $request->validate($rule, $messenger);
        $isSuccess = $this->touchRepository->update($request, $id);
        if ($isSuccess) {
            return 'update touches successfully';
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $touch = $this->touchRepository->findTouchConfigById($id);
        $touch->delete();
        return 'delete touch successfully';
    }
}
