<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FundCategories extends Model
{
    use HasFactory;

    protected $fillable = [
       'name',
    ];

    public function fundSubCategories(){
        return $this->hasMany(FundSubCategories::class);

    }
    public function funds(){
        return $this->hasMany(Fund::class);

    }

}
