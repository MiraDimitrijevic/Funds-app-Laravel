<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FundBasicDataResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public static $wrap='fund';

    public function toArray($request)
    {
        return [
            'name'=>$this->resource->name,
            'ISIN'=>$this->resource->ISIN,
            'WKN'=>$this->resource->WKN,

        ];
    }
}
