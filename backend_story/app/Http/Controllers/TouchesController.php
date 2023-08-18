<?php

namespace App\Http\Controllers;

use App\Models\Touch;
use App\Http\Controllers\Controller;
use App\Repositories\Touch\TouchRepositoryInterface;
use Illuminate\Http\Request;

class TouchesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $touchRepository;
    public function __construct(TouchRepositoryInterface $touchRepository)
    {
        $this->touchRepository = $touchRepository;
    }

    public function index()
    {
        $touches = $this->touchRepository->all();
        return view('touches.index', [
            'touches'=> $touches
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('touches.create');
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
            return redirect('/touches')->with('status', 'create new touch successfully');
        } else {
            return redirect('/touches')->with('status', 'create new touch have error');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Touch $touch)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $touch = $this->touchRepository->findTouchConfigById($id);
        return view('touches.update', ['touch' => $touch]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
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
            return redirect('/touches')->with('status', 'update touches successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $touch = $this->touchRepository->findTouchConfigById($id);
        $touch->delete();
        return redirect('/touches')->with('status', 'delete touch successfully');
    }
}
