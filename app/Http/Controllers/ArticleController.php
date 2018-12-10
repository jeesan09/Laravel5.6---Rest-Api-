<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
//use App\Article;
use App\Http\Resources\Article as ArticleResource;
use App\Http\Requests;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        header('Access-Control-Allow-Origin: *');
        
        $article= Article::paginate(10);
        $rr = ArticleResource::collection($article);
        return ArticleResource::collection($article);
        //return response()->json($rr);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
         header('Access-Control-Allow-Origin: *');

        $article = $request->isMethod('put') ? Article::findOrFail($request->article_id) : new Article;
        
        $article->id =$request->input('article_id');
        $article->title =$request->input('title');
        $article->body=$request->input('content');

        if($article->save()){
            return new ArticleResource ($article);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $article=Article::findOrFail($id);
        return new ArticleResource ($article);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $article=Article::findOrFail($id);

       if($article->delete()){
            return new ArticleResource ($article);
       }
        


    }
}
