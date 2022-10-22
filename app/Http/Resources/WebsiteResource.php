<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WebsiteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $collection = collect([
            'name' => $this->name,
            'link' => $this->link,
            'created at' => $this->created_at
        ]);
        $collection = $collection->when($this->scrapedBy, function ($collection) {
            return $collection->merge([
                'last scraped by' => $this->scrapedBy->name
            ]);
        });
        $collection = $collection->when($this->last_scraped_at, function ($collection) {
            return $collection->merge([
                'last scraped at' => $this->last_scraped_at
            ]);
        });
        return $collection;
    }
}
