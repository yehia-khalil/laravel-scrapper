<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'Article title' => $this->title,
            'Article Description' => $this->description,
            'Article DOM' => $this->article_dom,
            'Published at' => $this->published_at,
            'Article Link' => $this->website->link,
            'website name' => $this->website->name
        ];
    }
}
