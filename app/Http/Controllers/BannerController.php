<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Banner/Index', [
            'banners' => Banner::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Banner/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:200',
            'image' => 'required'
        ]);

        $filePath = 'public/banners';
        $storagePath = storage_path($filePath);


        $image_parts = explode(";base64,", $request->image);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);

        $imageName = time() . '.png';

        $imageFullPath = $filePath.$imageName;

        Storage::put($imageFullPath, $image_base64);

        $banner = new Banner();
        $banner->title = $request->title;
        $banner->url = env('APP_URL').Storage::url($imageFullPath);
        $banner->save();
        return Redirect::route('banner.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Banner $banner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Banner $banner)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Banner $banner)
    {
        $banner->delete();
        return Redirect::route('banner.index');
    }

    public function archive(Banner $banner)
    {
        $banner->update([
            'archived' => true
        ]);
        return Redirect::route('banner.index');
    }

    public function restore(Banner $banner)
    {
        $banner->update([
            'archived' => false
        ]);
        return Redirect::route('banner.index');
    }
}
