<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Page/Index', [
            'pages' => Page::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Page/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'cnt'     => 'required|string',
            'description' => 'required|string|max:200',
            'title'       => 'required|string|max:200'
        ]);

        $page = Page::create([
            'title' => $request->title,
            'content' => $request->cnt,
            'description' => $request->description
        ]);

        return Redirect::route('page.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(Page $page)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Page $page)
    {
        return Inertia::render('Page/Edit', [
            'page' => [
                'title' => $page->title,
                'description' => $page->description,
                'content' => $page->content,
                ],
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Page $page)
    {
        $request->validate([
            'cnt'     => 'required|string',
            'description' => 'required|string|max:200',
            'title'       => 'required|string|max:200'
        ]);

        $page->update([
            'title' => $request->title,
            'content' => $request->cnt,
            'description' => $request->description
        ]);

        return Redirect::route('page.edit', $page->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Page $page)
    {
        $page->delete();
        return Redirect::route('page.index');
    }
}
