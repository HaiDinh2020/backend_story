<?php

namespace App\Repositories\Audio;

use Illuminate\Http\Request;

interface AudioRepositoryInterface
{
    public function all();

    public function findAudioById($id);

    public function create(Request $request);

    public function update(Request $request, $id);
}
