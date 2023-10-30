<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\SubCategoryResource;


class FundAllDataResource extends JsonResource
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
            'category'=> new CategoryResource($this->resource->fundCategory),
            'subCategory'=> new SubCategoryResource($this->resource->fundSubCategory),
            'ISIN'=>$this->resource->ISIN,
            'WKN'=>$this->resource->WKN,

        ];
    }
}
