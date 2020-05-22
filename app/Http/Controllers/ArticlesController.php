<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\createArticleRequest;
use App\Tag;
use App\Article;
use App\Article_Tag;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('administrator.articles.index')->with('articles', Article::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administrator.articles.create')->with('tags', Tag::all())->with('articles', '');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(createArticleRequest $request, Article_Tag $article_tag)
    {       
        // dd($request->tag);
        $image = $request->image->store('article');
          $articles= Article::create([
            'title' => $request->title,
            'content' => $request->content,
            'slug'=>$request->title,
            'tag'=> $request->tag,
            'published_at'=>$request->published_at,
            'user_id'=>auth()->user()->id,
            'image'=>$image

        ]);
        
        $articles->tags()->attach($request->tag);
        // $tags = $request['tag'];
        // foreach($tags as $tag){
        //     $article_tag::create(['article_id'=>$articles->id, 'tag_id'=>$tag]);
        // }
        session()->flash('success','data inserted successully');
        return redirect('administrator/articles/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        // dd($article);
         return view('administrator.articles.create')->with('article', $article)->with('tags',Tag::all());
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $data = request()->all();
        if ($request->hasFile('image')){
            $image = $request->image->store('article');
            Storage::delete($post->image);
            $data['image'] = $image;
        }
            $article->title = $data['title'];
            $article->content = $data['content'];
            $article->slug = $data['title'];
            $article->published_at = $data['published_at'];
            $article->tags()->sync($request->tag);
          
          
            $article->update();
            session()->flash('success','data updated successully');
             return redirect('administrator/articles/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {

        Article::where('id',$article->id)->get()->each(function ($tag) {

            $tag->tags()->detach();
            $tag->delete();
    
        });
        $article->delete();
        Storage::delete($article->image);
        session()->flash('success', 'succesfully deleted');
        return redirect()->back();
    }
}
