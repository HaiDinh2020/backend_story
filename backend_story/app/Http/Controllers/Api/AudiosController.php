<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Audio;
use App\Repositories\Audio\AudioRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function Webmozart\Assert\Tests\StaticAnalysis\numeric;

class AudiosController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    private $audioRepository;
    public function __construct(AudioRepositoryInterface $audioRepository)
    {
        $this->audioRepository = $audioRepository;
    }

    public function index()
    {
        $audios = $this->audioRepository->all();
        return $audios;
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rule = [
            'text_id' => 'required|numeric|min:0',
            'audio' => 'required|mimetypes:audio/mpeg',
        ];
        $messenger = [
            'required' => 'trường :attribute bắt buộc phải nhập',
            'mimetypes' => 'trường :attribute phải là file audio',
            'numeric' => 'trường :attribute phải là số',
            'min' => 'trường :attribute bắt buộc phải lớn hơn :min '
        ];

        $request->validate($rule, $messenger);

        $newAudio = $this->audioRepository->create($request);

        if($newAudio) {
            return "create success";
        } else {
            return "create have error";
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $rule = [
            'text_id' => 'required|numeric|min:0',
            'audio' => 'required|mimetypes:audio/mpeg',
        ];
        $messenger = [
            'required' => 'trường :attribute bắt buộc phải nhập',
            'mimetypes' => 'trường :attribute phải là file audio',
            'numeric' => 'trường :attribute phải là số',
            'min' => 'trường :attribute bắt buộc phải lớn hơn :min '
        ];

        $request->validate($rule, $messenger);

        $this->audioRepository->update($request, $id);
        return 'update audio successfully';
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $audio = $this->audioRepository->findAudioById($id);
        $audio->delete();
        return 'delete audio successfully';
    }
}
