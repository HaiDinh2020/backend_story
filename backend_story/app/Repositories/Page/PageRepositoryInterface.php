<?php

namespace App\Repositories\Page;

use Illuminate\Http\Request;

interface PageRepositoryInterface
{
    public function all();

    public function findPageById($id);

    public function create(Request $request);

    public function update(Request $request, $id);
}
