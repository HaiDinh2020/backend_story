<?php

namespace App\Repositories\Text;

use Illuminate\Http\Request;

interface TextRepositoryInterface
{
    public function all();

    public function findTextById ($id);

    public function create(Request $request);

    public function update(Request $request, $id);


}
