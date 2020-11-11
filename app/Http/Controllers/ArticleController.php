<?php
// Controller guests
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $articles = Article::all();
      return view('guest.articles.index', compact('articles'));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $article = Article::where('slug', $slug)->first();
        return view('guest.articles.show', compact('article'));
    }


}
