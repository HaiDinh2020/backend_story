<?php

namespace App\Repositories\Touch;

use Illuminate\Http\Request;

interface TouchRepositoryInterface
{
    public function all();

    public function findTouchConfigById ($id);

    public function create(Request $request);

    public function update(Request $request, $id);

}
