<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $user_id = Auth::id();
      $articles = Article::where('user_id', $user_id)->get();
      return view('admin.articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $request->validate([
          "title" => "required|max:255",
          "subtitle" => "required|max:255",
          "content" => "required|max:20000",
          "excerpt" => "required|max:2000",
          // "keywords" => "required|max:200",
          "image" => "image"
        ]);

        $path = Storage::disk('public')->put('images', $data["image"]);


        $newArticle = new Article;
        $newArticle->user_id = Auth::id();
        $newArticle->title = $data["title"];
        $newArticle->subtitle = $data["subtitle"];
        $newArticle->content = $data["content"];
        $newArticle->excerpt = $data["excerpt"];
        // $newArticle->keywords = $data["keywords"];
        $newArticle->slug = Str::of($newArticle->title)->slug('-');
        $newArticle->image = $path;
        $newArticle->save();

        return redirect()->route("articles.show", $newArticle->slug);
      }
    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $article = Article::where("slug", $slug)->first();
        return view('admin.articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $article = Article::where('slug', $slug)->first();
        return view('admin.articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();

        $request->validate([
          // "user_id" => "required|exists:users,id",
          "title" => "required|max:255",
          "subtitle" => "required|max:255",
          "content" => "required|max:20000",
          "excerpt" => "required|max:2000",
          "keywords" => "required|max:200",
          "image" => "image"
        ]);

        // $article = Article::where("slug", $slug)->first();

        $article = Article::find($id);
        $article->title = $data["title"];
        $article->subtitle = $data["subtitle"];
        $article->content = $data["content"];
        $article->excerpt = $data["excerpt"];
        $article->keywords = $data["keywords"];
        // $article->user_id = Rule::unique('articles')->ignore("user_id");
        $article->slug = Str::of($article->title)->slug('-');
        $article->update();

         return redirect()->route("articles.index");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $article = Article::where('slug', $slug)->first();
        $article->delete();
        return redirect()->route("articles.index");

    }
}
