<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;

class TagsController extends Controller
{
    public function index()
    {
        return view('tags.index')->with('tag', $tag);
    }

    public function create()
    {
        return view('administrator.articles.tags.create');
    }

    public function show()
    {
        return view('administrator.articles.tags.index')->with('tags', Tag::all());
    }

    public function store(Request $request)
    {
        Tag::create([
            'name'=> $request->name
        ]);

        session()->flash('success', 'tag has been created');
        return redirect()->route('tags.index');
    }
    public function edit(Tag $tag)
    {
        return view('administrator.articles.tags.create')->with('tags', $tag);
    }

    public function update(Request $request, Tag $tag)
    {
        $data = request()->all();
        $tag->name = $data['name'];
        $tag->update();
        session()->flash('success', 'tag has been updated');
        return  redirect('/administrator/articles/tags/index');

    }
    public function destroy(Tag $tag)
    {
        $tag->delete();
        session()->flash('success', 'tag has been deleted');
        return redirect()->back();
    }
}
