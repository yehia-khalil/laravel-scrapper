<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\ScrapedArticle;
use App\Http\Requests\StoreScrapedArticleRequest;
use App\Http\Requests\UpdateScrapedArticleRequest;
use App\Http\Resources\ArticleResource;
use App\Models\Website;
use Illuminate\Http\Request;

class ScrapedArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreScrapedArticleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ScrapedArticle  $scrapedArticle
     * @return \Illuminate\Http\Response
     */
    public function show(Website $website_id)
    {
        $articles = ScrapedArticle::where('website_id', $website_id->id)->with('website')->get();
        return ArticleResource::collection($articles);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ScrapedArticle  $scrapedArticle
     * @return \Illuminate\Http\Response
     */
    public function edit(ScrapedArticle $scrapedArticle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateScrapedArticleRequest  $request
     * @param  \App\Models\ScrapedArticle  $scrapedArticle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ScrapedArticle $scrapedArticle)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ScrapedArticle  $scrapedArticle
     * @return \Illuminate\Http\Response
     */
    public function destroy(ScrapedArticle $scrapedArticle)
    {
        //
    }
}
