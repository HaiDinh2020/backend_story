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
