<?php

namespace App\Repositories\TextConfig;

use App\Models\Text_config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TextConfigRepository
{
    public function all() {
        return Text_config::all();
    }

    public function findTextConfigById ($id) {
        return Text_config::find($id);
    }

    public function create(Request $request)
    {

    }

    public function update(Request $request, $id)
    {


    }

}
