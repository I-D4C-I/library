<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Style;
use Illuminate\Http\Request;

class StyleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $order = $request->input('order_id') ?? 'asc';
        $limit = ADMIN_LIMIT;

        $styles = Style::query()
            ->select("id", "title", "created_at")
            ->orderBy('id', $order)
            ->paginate($limit);

        return view('admin.styles.index', compact('styles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.styles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:100'],
        ]);

        $title = $validated['title'];

        $style = Style::query()->create([
            'title' => $title,
        ]);

        return redirect()->route('admin.styles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Style $style)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Style $style)
    {
        return view('admin.styles.edit', compact('style'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Style $style)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:100'],
        ]);

        $title = $validated['title'];

        $style->updateOrFail([
            'title' => $title,
        ]);

        return redirect()->route('admin.styles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Style $style)
    {
        $style->deleteOrFail();
        return redirect()->route('admin.styles.index');
    }
}
