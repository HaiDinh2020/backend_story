<?php

namespace App\Repositories\TextConfig;

use Illuminate\Http\Request;

interface TextConfigRepositoryInterface
{
    public function all();

    public function findTextConfigById ($id);

    public function create(Request $request);

    public function update(Request $request, $id);

}
