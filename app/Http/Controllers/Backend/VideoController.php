<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\VideoRequest;
use App\Models\Video;
use App\Repo\VideoRepo;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class VideoController extends Controller
{
    /**
     * @var VideoRepo
     */
    private $videoRepo;
    /**
     * @var Video
     */
    private $video;

    /**
     * VideoController constructor.
     */
    public function __construct(VideoRepo $videoRepo, Video $video)
    {
        $this->videoRepo = $videoRepo;
        $this->video = $video;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        $videos = $this->videoRepo->getAll();
        return view('backend.video.index', compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('backend.video.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param VideoRequest $request
     * @return RedirectResponse
     */
    public function store(VideoRequest $request)
    {
        try {
            $data = $request->all();
            $video = $this->video->create($data);
            if ($video) {
                session()->flash('success', 'Video Added Successfully');
                return back();
            } else {
                session()->flash('error', 'Video Cannot be Added!!');
                return back();
            }
        } catch (Exception $e) {
            $exception = $e->getMessage();
            session()->flash('error', 'Exception : ' . $exception);
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View|RedirectResponse
     */
    public function edit($id)
    {
        $id = (int)$id;
        try {
            $edits = $this->videoRepo->findById($id);
            if ($edits) {
                return view('backend.video.edit', compact('edits'));
            } else {
                session()->flash('error', 'Update unsuccessful');
                return back();
            }
        } catch (Exception $e) {
            $exception = $e->getMessage();
            session()->flash('error', 'Exception : ' . $exception);
            return back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param VideoRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(VideoRequest $request, $id)
    {
        try {
            $data = $request->all();
            $videos = $this->videoRepo->findById($id);
            $update = $videos->fill($data)->save();
            if ($update) {
                session()->flash('success', 'Video Successfully updated!');
                return back();
            } else {
                session()->flash('error', 'Video could not be updated!');
                return back();
            }
        } catch (Exception $e) {
            $exception = $e->getMessage();
            session()->flash('error', 'EXCEPTION:' . $exception);
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        try {
            $video = $this->videoRepo->findById($id);

            if ($video) {
                $video->delete();
                session()->flash('success', 'Video removed successfully!!');
                return back();
            } else {
                session()->flash('error', 'Video cannot be removed!!');
                return back();
            }
        } catch (Exception $e) {
            $exception = $e->getMessage();
            session()->flash('error', 'Exception: ' . $exception);
            return back();
        }
    }

    public function changeStatus($id)
    {
        $value = $this->video->findOrFail($id);
        $this->video
            ->where('id', '=', $id)
            ->update(['status' => ($value->status == '1') ? '0' : '1']);
    }

    public function media()
    {
        return view('backend.fileManager');
    }
}
