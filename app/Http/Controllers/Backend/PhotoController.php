<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\PhotoRequest;
use App\Models\Photo;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $photos = Photo::all();
        return view('backend.photos.index', compact('photos'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('backend.photos.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param PhotoRequest $request
     * @return RedirectResponse
     */
    public function store(PhotoRequest $request)
    {
        try {
            $validateData = $request->all();
            if ($request->image) {
                $validateData['image'] = storeNewImageFile($request);
            }
            Photo::create($validateData);
            return redirect()->route('photo.index')->with('success', 'Photo Feature Created Successfully');
        } catch (\Exception $e) {
            return back()->with('error', 'Photo Feature Cannot Be Create');
        }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('backend.photos.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param Photo $photo
     * @return Renderable
     */
    public function edit(Photo $photo)
    {
        return view('backend.photos.edit', compact('photo'));
    }

    /**
     * Update the specified resource in storage.
     * @param PhotoRequest $request
     * @param Photo $photo
     * @return RedirectResponse
     */
    public function update(PhotoRequest $request, Photo $photo)
    {
        try {
            $validateData = $request->all();
            if ($request->image) {
                $validateData['image'] = updateImageFile($request);
            }
            $photo->update($validateData);
            return redirect()->route('photo.index')->with('success', 'Photo Feature Updated Successfully');
        } catch (\Exception $exception) {
            return back()->with('error', 'Photo Feature Cannot be updated');
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param Photo $photo
     * @return RedirectResponse
     */
    public function destroy(Photo $photo)
    {
        try {
            DB::beginTransaction();
            $photo->delete();
            DB::commit();
            return redirect()->route('photo.index')->with('success', 'Photo Feature Deleted Successfully');
        } catch (\Exception $exception) {
            DB::rollBack();
            return back()->with('error', 'Cannot Delete Photo Feature Something Went Wrong');
        }
    }

    public function changeStatus($id)
    {
        $id = (int)$id;
        $value = Photo::findOrFail($id);
        $value->update(['status' => ($value->status == 'active') ? 'in-active' : 'active']);
    }
}
