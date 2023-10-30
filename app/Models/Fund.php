<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fund extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'fundCategoryID',
        'fundSubCategoryID',
        'ISIN',
        'WKN',
     ];
 
     public function fundCategory(){
        return $this->belongsTo(FundCategories::class, 'fundCategoryID' );
    }

    public function fundSubCategory(){
        return $this->belongsTo(FundSubCategories::class, 'fundSubCategoryID' );
    }
     public function userFunds(){
         return $this->hasMany(UserFunds::class);
 
     }
}
