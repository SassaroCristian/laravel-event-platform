<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::all();
        return response()->json($tags);
    }

    public function show($id)
    {
        $tag = Tag::find($id);
        if (!$tag) {
            return response()->json(['message' => 'Tag non trovato'], 404);
        }
        return response()->json($tag);
    }
}
