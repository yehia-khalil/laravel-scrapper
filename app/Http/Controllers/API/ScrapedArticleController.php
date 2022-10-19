<?php

namespace App\Http\Controllers\APi;

use App\Http\Controllers\Controller;
use App\Models\ScrapedArticle;
use App\Http\Requests\StoreScrapedArticleRequest;
use App\Http\Requests\UpdateScrapedArticleRequest;

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
     * @param  \App\Http\Requests\StoreScrapedArticleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreScrapedArticleRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ScrapedArticle  $scrapedArticle
     * @return \Illuminate\Http\Response
     */
    public function show(ScrapedArticle $scrapedArticle)
    {
        //
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
    public function update(UpdateScrapedArticleRequest $request, ScrapedArticle $scrapedArticle)
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
