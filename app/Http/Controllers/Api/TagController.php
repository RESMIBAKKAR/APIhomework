<?php
namespace App\Http\Controllers\Api;

use App\Models\Tag;
use Illuminate\Http\Request;
use App\http\controllers\controller;


class TagController extends Controller
{
    public function index()
    {
        return Tag::all();
    }

    public function store(Request $request)
    {
        $tag=Tag::create($request->all());
        return response()->json( ['message'=>" ok createed "]);
    }

    public function show(Tag $tag)
    {
        return $tag;
    }

    public function update(Request $request, Tag $tag)
    {
        $request->validate(['name' => 'required|string|max:255']);
        $tag->update($request->all());
        return $tag;
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();
        return response()->json([
            "message"=>"deleted",404]
        );
    }
}