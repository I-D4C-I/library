<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\StyleResource;
use App\Models\Style;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class StyleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = StyleResource::collection(Style::all());
        $headers = ['Content-Type' => 'application/json; charset=utf-8'];
        return response()->json($data, 200, $headers, JSON_UNESCAPED_UNICODE);
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

        $headers = ['Content-Type' => 'application/json; charset=utf-8'];
        return response()->json($style, 200, $headers, JSON_UNESCAPED_UNICODE);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = new StyleResource(Style::findOrFail($id));
        $headers = ['Content-Type' => 'application/json; charset=utf-8'];
        return response()->json($data, 200, $headers, JSON_UNESCAPED_UNICODE);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $style = Style::findOrFail($id);

        $validated = $request->validate([
            'title' => ['required', 'string', 'max:100'],
        ]);

        $title = $validated['title'];

        $style->update([
            'title' => $title,
        ]);

        $headers = ['Content-Type' => 'application/json; charset=utf-8'];
        return response()->json($style, 200, $headers, JSON_UNESCAPED_UNICODE);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Style::findOrFail($id)->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
