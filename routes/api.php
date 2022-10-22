<?php

use App\Http\Controllers\APi\HistoryController;
use App\Http\Controllers\API\LoginController;
use App\Http\Controllers\APi\ScrapedArticleController;
use App\Http\Controllers\API\WebsiteController;
use App\Models\Website;
use Carbon\Carbon;
use Goutte\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', [LoginController::class, 'register']);
Route::post('/login', [LoginController::class, 'authenticate']);
Route::middleware('auth:sanctum')->group(function () {
    Route::get('websites', [WebsiteController::class, 'index']);
    Route::post('website', [WebsiteController::class, 'store']);
    Route::get('articles/{website_id}', [ScrapedArticleController::class, 'show']);
    Route::get('history', [HistoryController::class, 'index']);
});

Route::get("scrape", function () {
    $client = new Client();
    $crawler = $client->request('GET', 'https://www.mklat.com/category/technology/computer-internet/');
    $crawler->filter('li.post-item')->each(function ($item) {
        $article_dom = $item->html();
        dd($article_dom);
        $title = $item->filter('h2.post-title')->text();
        $description = $item->filter('p.post-excerpt')->text();
        $published_at = Carbon::now();
        $website_id = Website::whereLink('https://www.mklat.com/category/technology/computer-internet/')->first()->articles()->create(
            compact(['article_dom', 'title', 'description', 'published_at'])
        );
        return $website_id;
    });
});
